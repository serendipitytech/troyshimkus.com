<?php
// Email sending via PHPMailer SMTP

require_once __DIR__ . '/../vendor/autoload.php';

function ts_send_mail(string $name, string $email, string $message, string &$error = ''): bool {
  // Load env config if present
  $configPath = __DIR__ . '/../config/env.php';
  if (file_exists($configPath)) {
    require $configPath; // expected to define $SMTP_HOST, $SMTP_PORT, $SMTP_USER, $SMTP_PASS, $SMTP_FROM, $SMTP_TO
  }

  $host = $_SERVER['HTTP_HOST'] ?? '';
  $isDev = (strpos($host, 'localhost') !== false) || (strpos($host, '127.0.0.1') !== false);

  // In dev, do not send; pretend success
  if ($isDev && (!isset($SMTP_HOST) || !$SMTP_HOST)) {
    return true;
  }

  try {
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $SMTP_HOST ?? '';
    $mail->Port = isset($SMTP_PORT) ? (int)$SMTP_PORT : 587;
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = ($mail->Port === 465) ? PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS : PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Username = $SMTP_USER ?? '';
    $mail->Password = $SMTP_PASS ?? '';

    $from = $SMTP_FROM ?? ($SMTP_USER ?? 'no-reply@example.com');
    $to = $SMTP_TO ?? ($CONTACT_TO_EMAIL ?? 'owner@example.com');

    $mail->setFrom($from, 'Portfolio Website');
    $mail->addAddress($to);
    if (!empty($email)) {
      $mail->addReplyTo($email, $name ?: $email);
    }
    $mail->Subject = 'New contact from ' . ($name ?: 'Website');
    $mail->Body = $message;

    return $mail->send();
  } catch (Throwable $e) {
    $error = $e->getMessage();
    return false;
  }
}

