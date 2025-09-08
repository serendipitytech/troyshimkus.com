<?php
// SMS sending via Twilio HTTP API

function ts_notify_owner_sms(string $name, string $email, string $phone, string $message, string &$error = ''): bool {
  // Load env config if present
  $configPath = __DIR__ . '/../config/env.php';
  if (file_exists($configPath)) {
    require $configPath; // expected to define $TWILIO_ACCOUNT_SID, $TWILIO_AUTH_TOKEN, $TWILIO_FROM_NUMBER, $TWILIO_TO_NUMBER
  }

  $host = $_SERVER['HTTP_HOST'] ?? '';
  $isDev = (strpos($host, 'localhost') !== false) || (strpos($host, '127.0.0.1') !== false);

  // In dev, do not send; pretend success
  if ($isDev && (!isset($TWILIO_ACCOUNT_SID) || !$TWILIO_ACCOUNT_SID)) {
    return true;
  }

  $sid = $TWILIO_ACCOUNT_SID ?? '';
  $token = $TWILIO_AUTH_TOKEN ?? '';
  $from = $TWILIO_FROM_NUMBER ?? '';
  $to = $TWILIO_TO_NUMBER ?? '';
  if (!$sid || !$token || !$from || !$to) {
    $error = 'Twilio config missing';
    return false;
  }

  $body = 'New inquiry from ' . ($name ?: 'Someone');
  if (!empty($email)) { $body .= ' <' . $email . '>'; }
  if (!empty($phone)) { $body .= ' (' . $phone . ')'; }
  $body .= "\n\n" . $message;

  $post = http_build_query([
    'From' => $from,
    'To' => $to,
    'Body' => $body,
  ]);
  $url = 'https://api.twilio.com/2010-04-01/Accounts/' . rawurlencode($sid) . '/Messages.json';

  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_USERPWD, $sid . ':' . $token);
  $resp = curl_exec($ch);
  $http = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  if ($resp === false || $http >= 400) {
    $error = 'Twilio error ' . $http . ': ' . ($resp ?: curl_error($ch));
    curl_close($ch);
    return false;
  }
  curl_close($ch);
  return true;
}

