<?php
// Simple placeholder handler for contact form submissions.
// In production, integrate with an email service or ticketing system.

function h($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }
require_once __DIR__ . '/lib/mailer.php';
require_once __DIR__ . '/lib/sms.php';

$host = $_SERVER['HTTP_HOST'] ?? '';
$isDev = (strpos($host, 'localhost') !== false) || (strpos($host, '127.0.0.1') !== false);

$isPost = ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';
$name = $isPost ? trim($_POST['name'] ?? '') : '';
$email = $isPost ? trim($_POST['email'] ?? '') : '';
$message = $isPost ? trim($_POST['message'] ?? '') : '';
$phone   = $isPost ? trim($_POST['phone'] ?? '') : '';
$notify  = $isPost ? trim($_POST['notify'] ?? 'sms') : 'sms';
$hp = $isPost ? trim($_POST['website'] ?? '') : '';
$errors = [];
if ($isPost) {
  if ($hp === '') {
    if ($name === '' || mb_strlen($name) < 2) { $errors['name'] = 'Please enter your name.'; }
    if ($notify === 'email' || $notify === 'both') {
      if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors['email'] = 'Please enter a valid email.'; }
    } elseif ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = 'Please enter a valid email.';
    }
    if ($message === '' || mb_strlen($message) < 10) { $errors['message'] = 'Please enter a message (10+ characters).'; }
    if ($notify === 'sms' || $notify === 'both') {
      // Require phone when SMS is selected
      $digits = preg_replace('/\D+/', '', $phone);
      if (strlen($digits) < 10) { $errors['phone'] = 'Please provide a valid phone for text.'; }
    }
  }
}
// If posting and valid on production, redirect back with success banner
if ($isPost && ($hp === '') && !$isDev) {
  if (empty($errors)) {
    $sent = false; $errs = [];
    if ($notify === 'sms') {
      $smsErr = '';
      $sent = ts_notify_owner_sms($name, $email, $phone, $message, $smsErr);
      if (!$sent) { $errs[] = 'sms:' . $smsErr; }
    } elseif ($notify === 'email') {
      $mailErr = '';
      $sent = ts_send_mail($name, $email, $message, $mailErr);
      if (!$sent) { $errs[] = 'email:' . $mailErr; }
    } elseif ($notify === 'both') {
      $smsErr = '';
      $mailErr = '';
      $smsOk = ts_notify_owner_sms($name, $email, $phone, $message, $smsErr);
      $mailOk = ts_send_mail($name, $email, $message, $mailErr);
      $sent = ($smsOk || $mailOk);
      if (!$smsOk) { $errs[] = 'sms:' . $smsErr; }
      if (!$mailOk) { $errs[] = 'email:' . $mailErr; }
    }
    if ($sent) {
      header('Location: /index.php?contact=success#contact');
      exit;
    }
    header('Location: /index.php?contact=error#contact');
    error_log('[contact] notify failed: ' . (empty($errs) ? 'unknown' : implode('; ', $errs)));
    exit;
  }
}
?>
<?php
  $pageTitle = 'Contact — Troy Shimkus';
  $pageDescription = 'Contact Troy Shimkus.';
  include __DIR__ . '/includes/head.php';
?>
  <body class="bg-[var(--neutral-bg)] text-[var(--neutral-text)] font-sans antialiased">
    <?php include __DIR__ . '/includes/header.php'; ?>

    <main class="mx-auto max-w-3xl px-4 py-12 sm:py-16">
      <?php if ($isPost && empty($errors)): ?>
        <section class="rounded-lg border border-emerald-200 bg-emerald-50 p-6 shadow-sm">
          <h1 class="text-xl font-bold text-emerald-900">Thanks for reaching out!</h1>
          <p class="mt-2 text-emerald-900/80">This is a preview. The form does not send email yet.</p>
          <?php if ($hp === ''): ?>
            <div class="mt-4 grid gap-2 text-sm">
              <div><span class="font-medium">Name:</span> <?php echo h($name); ?></div>
              <div><span class="font-medium">Email:</span> <?php echo h($email); ?></div>
              <div>
                <span class="font-medium">Message:</span>
                <pre class="mt-1 whitespace-pre-wrap break-words rounded-md bg-white p-3 border border-emerald-200"><?php echo h($message); ?></pre>
              </div>
            </div>
          <?php endif; ?>
          <div class="mt-6 flex items-center gap-3">
            <a href="/" class="inline-flex items-center rounded-md bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Back to Home</a>
            <a href="mailto:hello@troyshimkus.com" class="text-sm text-emerald-900/80 hover:text-emerald-900">Email me directly</a>
          </div>
        </section>
        <p class="mt-6 text-sm text-slate-600">To enable sending, wire this endpoint to an email service (SES/Mailgun) and keep validation + spam protection.</p>
      <?php else: ?>
        <section class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
          <h1 class="text-xl font-bold">Contact</h1>
          <p class="mt-2 text-slate-600">Send a note and I’ll get back soon.</p>
          <?php if (!empty($errors)): ?>
            <div class="mt-4 rounded-md border border-red-200 bg-red-50 p-4 text-sm text-red-800">
              <div class="font-semibold">Please fix the following:</div>
              <ul class="mt-2 list-disc pl-5">
                <?php foreach ($errors as $e): ?><li><?php echo h($e); ?></li><?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
          <form action="/contact.php" method="post" class="mt-6 grid gap-4">
            <div>
              <label for="notify" class="block text-sm font-medium">How should I contact you? <span class="text-slate-500 font-normal">I prefer texting.</span></label>
              <select id="notify" name="notify" class="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500">
                <option value="sms" <?php echo $notify==='sms'?'selected':''; ?>>Text</option>
                <option value="email" <?php echo $notify==='email'?'selected':''; ?>>Email</option>
                <option value="both" <?php echo $notify==='both'?'selected':''; ?>>Both</option>
              </select>
            </div>
            <!-- Honeypot field (hidden) -->
            <div class="hidden" aria-hidden="true">
              <label for="website">Website</label>
              <input id="website" name="website" type="text" tabindex="-1" autocomplete="off" />
            </div>
            <div>
              <label for="name" class="block text-sm font-medium">Name</label>
              <input id="name" name="name" type="text" required minlength="2" autocomplete="name" value="<?php echo h($name); ?>" class="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 <?php echo isset($errors['name']) ? 'border-red-400' : ''; ?>" />
            </div>
            <div>
              <label for="email" class="block text-sm font-medium">Email</label>
              <input id="email" name="email" type="email" autocomplete="email" inputmode="email" value="<?php echo h($email); ?>" class="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 <?php echo isset($errors['email']) ? 'border-red-400' : ''; ?>" />
            </div>
            <div>
              <label for="phone" class="block text-sm font-medium">Phone (for text)</label>
              <input id="phone" name="phone" type="tel" autocomplete="tel" value="<?php echo h($phone); ?>" placeholder="(555) 555-5555" class="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 <?php echo isset($errors['phone']) ? 'border-red-400' : ''; ?>" />
            </div>
            <div>
              <label for="message" class="block text-sm font-medium">Message</label>
              <textarea id="message" name="message" rows="5" required minlength="10" class="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500 <?php echo isset($errors['message']) ? 'border-red-400' : ''; ?>"><?php echo h($message); ?></textarea>
            </div>
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
              <button type="submit" class="inline-flex items-center rounded-md bg-[var(--primary)] px-5 py-2.5 text-[var(--on-primary)] hover:bg-[var(--primary-hover)] shadow w-full sm:w-auto">Send</button>
              <a href="mailto:hello@troyshimkus.com" class="text-sm text-slate-600 hover:text-slate-800">Or email directly</a>
            </div>
          </form>
        </section>
      <?php endif; ?>
    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>
