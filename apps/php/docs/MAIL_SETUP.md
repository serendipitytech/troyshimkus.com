# Mail Setup (HostGator SMTP via Gmail/Workspace)

This site uses PHPMailer + SMTP to send contact form emails. You can use your Google Workspace (Gmail) account safely via an App Password.

## Steps
1) Create Gmail App Password
   - Ensure 2‑Step Verification is enabled on your Google account.
   - Visit Google Account → Security → App passwords → Create new.
   - Choose “Mail” + “Other”, copy the 16‑char app password.

2) Configure SMTP
   - Copy `config/env.php.dist` to `config/env.php` and fill values:
     - `host`: `smtp.gmail.com`
     - `port`: `587` (TLS) or `465` (SSL)
     - `secure`: `tls` or `ssl`
     - `username`: your full Gmail/Workspace address
     - `password`: the 16‑char app password
     - `from_email`: same as `username` (recommended)
     - `from_name`: your display name
     - `to_email`: where to receive messages

3) Install PHPMailer
   - From project root: `composer require phpmailer/phpmailer`
   - This creates `/vendor` (ignored by git). On HostGator, upload `/vendor` with the site.
   - If you can’t run composer locally, download a release of PHPMailer and place it into `/vendor` with an `autoload.php`.

4) Deploy
   - Ensure `config/env.php` and `/vendor` are present on the server.
   - Submit the contact form in production; it should redirect to `/?contact=success`.

## Notes
- Deliverability: Consider adding/confirming SPF/DKIM for your domain.
- Limits: Gmail standard limits apply (e.g., ~500/day). For higher volume, switch to Amazon SES or Mailgun later.
- Security: Never commit `config/env.php` to git. Keep `/vendor` up to date if you update PHPMailer.

