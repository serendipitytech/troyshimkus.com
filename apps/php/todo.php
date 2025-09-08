<?php
// Dev-only TODO viewer: renders root docs/TODO.md nicely
$host = $_SERVER['HTTP_HOST'] ?? '';
$isDev = (strpos($host, 'localhost') !== false) || (strpos($host, '127.0.0.1') !== false);

$pageTitle = 'Backlog — TODO';
$pageDescription = 'Development backlog viewer.';
include __DIR__ . '/includes/head.php';
?>
  <body class="bg-[var(--neutral-bg)] text-[var(--neutral-text)] font-sans antialiased">
    <?php include __DIR__ . '/includes/header.php'; ?>

    <main class="mx-auto max-w-3xl px-4 py-10 sm:py-14">
      <h1 class="text-2xl font-bold tracking-tight">Project Backlog</h1>
      <?php if (!$isDev): ?>
        <p class="mt-2 text-slate-600">This page is only available in development.</p>
      <?php else: ?>
        <?php
          $rootTodo = realpath(__DIR__ . '/../../docs/TODO.md');
          $appTodo  = realpath(__DIR__ . '/docs/TODO.md');
          $srcFile  = $rootTodo && file_exists($rootTodo) ? $rootTodo : ($appTodo && file_exists($appTodo) ? $appTodo : null);
          $content  = $srcFile ? file_get_contents($srcFile) : '';

          if ($content === '') {
            echo '<section class="mt-4 rounded-lg border border-amber-200 bg-amber-50 p-6 shadow-sm">'
               . '<div class="font-semibold text-amber-900">No TODO content found.</div>'
               . '<p class="mt-2 text-amber-900/80 text-sm">Expected at docs/TODO.md or apps/php/docs/TODO.md.</p>'
               . '</section>';
          } else {
            // Very light Markdown to HTML; fallback to <pre> if parsing yields nothing
            $html = htmlspecialchars($content, ENT_QUOTES, 'UTF-8');
            $html = preg_replace('/^# (.+)$/m', '<h2 class="mt-6 text-xl font-bold">$1</h2>', $html);
            $html = preg_replace('/^## (.+)$/m', '<h3 class="mt-4 text-lg font-semibold">$1</h3>', $html);
            $html = preg_replace('/- \[ \] /', '<li class="pl-1">☐ ', $html);
            $html = preg_replace('/- \[x\] /i', '<li class="pl-1">☑ ', $html);
            $html = preg_replace('/^- (?!\[)/m', '<li class="pl-1">• ', $html);

            $lines = explode("\n", $html);
            $out = '';
            $inList = false;
            foreach ($lines as $ln) {
              if (preg_match('/^<h[23]/', $ln)) {
                if ($inList) { $out .= "</ul>"; $inList = false; }
                $out .= $ln;
              } elseif (preg_match('/^<li /', $ln)) {
                if (!$inList) { $out .= '<ul class="mt-2 grid gap-1">'; $inList = true; }
                $out .= $ln . '</li>';
              } elseif (trim($ln) === '') {
                if ($inList) { $out .= "</ul>"; $inList = false; }
                $out .= '<div class="h-3"></div>';
              } else {
                if ($inList) { $out .= "</ul>"; $inList = false; }
                $out .= '<p class="text-slate-700">' . $ln . '</p>';
              }
            }
            if ($inList) { $out .= "</ul>"; }

            if (trim($out) === '') {
              echo '<section class="mt-4 rounded-lg border border-slate-200 bg-white p-6 shadow-sm"><pre>'
                 . htmlspecialchars($content, ENT_QUOTES, 'UTF-8')
                 . '</pre></section>';
            } else {
              echo '<section class="mt-4 rounded-lg border border-slate-200 bg-white p-6 shadow-sm prose prose-slate max-w-none">' . $out . '</section>';
            }
          }
        ?>
        <div class="mt-4 text-sm text-slate-500">Source: <code>docs/TODO.md</code></div>
        <div class="mt-6"><a class="text-sm text-slate-600 hover:text-slate-800" href="/colors.html">Open Palette Chooser →</a></div>
      <?php endif; ?>
    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>
