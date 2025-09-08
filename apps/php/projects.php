<?php
  $host = $_SERVER['HTTP_HOST'] ?? '';
  $isDev = (strpos($host, 'localhost') !== false) || (strpos($host, '127.0.0.1') !== false);
  $pageTitle = 'Projects — Troy Shimkus';
  $pageDescription = 'Selected projects with brief overviews and impact.';
  include __DIR__ . '/includes/head.php';
?>
  <body class="bg-[var(--neutral-bg)] text-[var(--neutral-text)] font-sans antialiased">
    <?php include __DIR__ . '/includes/header.php'; ?>

    <main class="mx-auto max-w-6xl px-4 py-12 sm:py-16">
      <style>
        details[open] .chev{ transform: rotate(180deg); }
      </style>
      <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Projects</h1>
      <p class="mt-2 text-slate-600">I lead cross‑functional teams through planning, alignment, and delivery — focusing on clarity, useful outcomes, and sustainable practices. Below are representative initiatives with brief summaries; I’m happy to dive deeper on any of them.</p>
      <?php $projects = include __DIR__ . '/data/projects.php'; ?>

      <section class="mt-8 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <h2 class="text-xl font-bold">AI In The Work</h2>
        <p class="mt-2 text-slate-700">Pragmatic use of AI to accelerate outcomes while maintaining quality and privacy.</p>
        <ul class="mt-3 list-disc pl-5 text-slate-700 text-sm space-y-1">
          <li>Speech → text: Whisper for meetings/interviews with structured outputs (PDF/JSON) and optional summaries.</li>
          <li>Computer vision: YOLOv8 for crowd estimation with annotated evidence and CSV stats.</li>
          <li>LLM‑assisted workflows: design exploration, code generation, and review with human‑in‑the‑loop guardrails.</li>
        </ul>
      </section>
      <?php
        function ts_md_to_html($md) {
          $html = htmlspecialchars($md, ENT_QUOTES, 'UTF-8');
          $html = preg_replace('/^### (.+)$/m', '<h4 class="font-semibold text-slate-900">$1</h4>', $html);
          $html = preg_replace('/^## (.+)$/m', '<h3 class="font-semibold text-slate-900">$1</h3>', $html);
          $html = preg_replace('/^# (.+)$/m', '<h2 class="font-bold text-slate-900">$1</h2>', $html);
          $html = preg_replace('/^- (.+)$/m', '<li class="pl-1">$1', $html);
          $lines = explode("\n", $html);
          $out = '';
          $inList = false;
          foreach ($lines as $ln) {
            if (preg_match('/^<h[2-4]/', $ln)) {
              if ($inList) { $out .= '</ul>'; $inList = false; }
              $out .= $ln;
            } elseif (preg_match('/^<li /', $ln)) {
              if (!$inList) { $out .= '<ul class="mt-3 list-disc pl-5 text-slate-700 text-sm space-y-1">'; $inList = true; }
              $out .= $ln . '</li>';
            } elseif (trim($ln) === '') {
              if ($inList) { $out .= '</ul>'; $inList = false; }
              $out .= '<div class="h-2"></div>';
            } else {
              if ($inList) { $out .= '</ul>'; $inList = false; }
              $out .= '<p class="text-slate-700 text-sm">' . $ln . '</p>';
            }
          }
          if ($inList) { $out .= '</ul>'; }
          return $out;
        }
      ?>
      <section id="projects-grid" class="mt-10 grid gap-6 sm:grid-cols-2">
        <?php $i = 0; foreach ($projects as $proj): $i++; $alt = ($i % 2 === 1) ? 'var(--primary)' : 'var(--accent)'; $pair = intdiv($i-1, 2); ?>
          <article data-pair="<?php echo $pair; ?>" id="<?php echo htmlspecialchars($proj['slug']); ?>" class="rounded-lg border <?php echo 'border-[' . $alt . ']'; ?> bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
            <h2 class="text-xl font-semibold"><?php echo htmlspecialchars($proj['title']); ?></h2>
            <p class="mt-2 text-slate-700"><?php echo htmlspecialchars($proj['summary']); ?></p>
            <?php if (!empty($proj['tags'])): ?>
            <div class="mt-4 flex flex-wrap gap-2">
              <?php foreach ($proj['tags'] as $tag): ?>
                <span class="text-xs bg-slate-100 text-slate-700 rounded-full px-2 py-1 ring-1 ring-inset ring-slate-200"><?php echo htmlspecialchars($tag); ?></span>
              <?php endforeach; ?>
            </div>
            <?php endif; ?>
            <?php 
              $detailsPath = __DIR__ . '/data/details/' . $proj['slug'] . '.php';
              $mdPath = __DIR__ . '/assets/projects/' . $proj['slug'] . '.md';
              if (file_exists($mdPath)) {
                $md = file_get_contents($mdPath);
                echo '<details class="mt-4 proj-details">';
                echo '  <summary class="cursor-pointer font-semibold text-slate-900 select-none flex items-center gap-1">';
                echo '    <svg class="chev h-4 w-4 text-slate-600 transition-transform" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.085l3.71-3.855a.75.75 0 111.08 1.04l-4.24 4.4a.75.75 0 01-1.08 0l-4.24-4.4a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>';
                echo '    Details';
                echo '  </summary>';
                echo '  <div class="mt-3 border-t border-slate-200 pt-4">';
                echo        ts_md_to_html($md);
                echo '  </div>';
                echo '</details>';
              } elseif (file_exists($detailsPath)) {
                echo '<details class="mt-4 proj-details">';
                echo '  <summary class="cursor-pointer font-semibold text-slate-900 select-none flex items-center gap-1">';
                echo '    <svg class="chev h-4 w-4 text-slate-600 transition-transform" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.085l3.71-3.855a.75.75 0 111.08 1.04l-4.24 4.4a.75.75 0 01-1.08 0l-4.24-4.4a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>';
                echo '    Details';
                echo '  </summary>';
                echo '  <div class="mt-3 border-t border-slate-200 pt-4">';
                include $detailsPath;
                echo '  </div>';
                echo '</details>';
              }
          ?>
          </article>
        <?php endforeach; ?>
      </section>
      <script>
        (function(){
          const grid = document.getElementById('projects-grid');
          if(!grid) return;
          grid.querySelectorAll('article .proj-details').forEach((det)=>{
            det.addEventListener('toggle', function(){
              const art = det.closest('article');
              if(!art) return;
              const pair = art.getAttribute('data-pair');
              if(!pair) return;
              const open = det.open;
              grid.querySelectorAll('article[data-pair="'+pair+'"] .proj-details').forEach((d)=>{
                if(d !== det) d.open = open;
              });
            });
          });
        })();
      </script>
    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>
