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
      <section class="mt-10 grid gap-6 sm:grid-cols-2">
        <?php foreach ($projects as $proj): ?>
          <article id="<?php echo htmlspecialchars($proj['slug']); ?>" class="rounded-lg border border-slate-200 border-t-4 <?php echo 'border-[' . (rand(0,1)?'var(--primary)':'var(--accent)') . ']'; ?> bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
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
              if (file_exists($detailsPath)) { echo '<div class="mt-4 border-t border-slate-200 pt-4">'; include $detailsPath; echo '</div>'; }
            ?>
          </article>
        <?php endforeach; ?>
      </section>
    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>
