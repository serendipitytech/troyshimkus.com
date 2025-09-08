// Contact API route (App Router, JavaScript to avoid TS deps)
// Supports notify: 'sms' | 'email' | 'both'
// In development (non-production) returns a preview without sending.

export async function POST(req) {
  try {
    const body = await req.json();
    const { notify = 'sms', name = '', email = '', phone = '', message = '' } = body || {};

    const isProd = process.env.NODE_ENV === 'production';
    const previewOnly = process.env.CONTACT_PREVIEW === '1' || !isProd;

    const results = { sms: null, email: null };
    const errors = [];

    if (previewOnly) {
      return Response.json({ ok: true, preview: true, results, received: { notify, name, email, phone, message } });
    }

    // SMS via Twilio REST API (direct fetch, no SDK)
    async function sendSMS() {
      const sid = process.env.TWILIO_ACCOUNT_SID;
      const token = process.env.TWILIO_AUTH_TOKEN;
      const from = process.env.TWILIO_FROM_NUMBER; // e.g., '+1...'
      const to = process.env.TWILIO_TO_NUMBER; // owner notification number
      if (!sid || !token || !from || !to) throw new Error('Missing Twilio env');

      const bodyParams = new URLSearchParams();
      bodyParams.set('From', from);
      bodyParams.set('To', to);
      bodyParams.set('Body', `New inquiry from ${name || 'Someone'}${email ? ' <' + email + '>' : ''}${phone ? ' (' + phone + ')' : ''}:\n\n${message}`);

      const resp = await fetch(`https://api.twilio.com/2010-04-01/Accounts/${sid}/Messages.json`, {
        method: 'POST',
        headers: { Authorization: 'Basic ' + Buffer.from(`${sid}:${token}`).toString('base64') },
        body: bodyParams,
      });
      if (!resp.ok) {
        const t = await resp.text();
        throw new Error(`Twilio error ${resp.status}: ${t}`);
      }
      return await resp.json();
    }

    // Email via Nodemailer SMTP (optional; only if dependency installed and env present)
    async function sendEmail() {
      const host = process.env.SMTP_HOST;
      const port = process.env.SMTP_PORT ? parseInt(process.env.SMTP_PORT, 10) : 587;
      const user = process.env.SMTP_USER;
      const pass = process.env.SMTP_PASS;
      const to = process.env.SMTP_TO || process.env.CONTACT_TO_EMAIL;
      const from = process.env.SMTP_FROM || user;
      if (!host || !user || !pass || !to || !from) throw new Error('Missing SMTP env');

      let nodemailer;
      try {
        // Dynamically import so the project can run without the dep in dev
        nodemailer = await import('nodemailer');
      } catch (e) {
        throw new Error('Nodemailer not installed');
      }
      const transporter = nodemailer.createTransport({
        host,
        port,
        secure: port === 465,
        auth: { user, pass },
      });
      const info = await transporter.sendMail({
        from,
        to,
        subject: `New contact from ${name || 'Website'}`,
        replyTo: email || from,
        text: message,
      });
      return { messageId: info.messageId };
    }

    if (notify === 'sms' || notify === 'both') {
      try { results.sms = await sendSMS(); } catch (e) { errors.push('sms:' + String(e?.message || e)); }
    }
    if (notify === 'email' || notify === 'both') {
      try { results.email = await sendEmail(); } catch (e) { errors.push('email:' + String(e?.message || e)); }
    }

    if (errors.length && !(results.sms || results.email)) {
      return Response.json({ ok: false, results, errors }, { status: 500 });
    }
    return Response.json({ ok: true, results, errors: errors.length ? errors : undefined });
  } catch (err) {
    return Response.json({ ok: false, error: String(err?.message || err) }, { status: 400 });
  }
}

