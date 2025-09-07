<?php
if (!isset($isDev)) {
  $host = $_SERVER['HTTP_HOST'] ?? '';
  $isDev = (strpos($host, 'localhost') !== false) || (strpos($host, '127.0.0.1') !== false);
}
?>
<header class="sticky top-0 z-50 bg-white/80 backdrop-blur border-b border-slate-200/80">
  <div class="mx-auto max-w-6xl px-4 py-4 flex items-center justify-between">
    <a href="/" class="text-lg font-semibold tracking-tight">Troy Shimkus</a>
    <nav class="hidden sm:flex items-center gap-6 text-sm">
      <?php if (!empty($isHome)): ?>
        <a href="#about" class="hover:text-slate-700">About</a>
        <a href="#highlights" class="hover:text-slate-700">Highlights</a>
        <a href="#projects" class="hover:text-slate-700">Projects</a>
        <a href="#contact" class="hover:text-slate-700">Contact</a>
      <?php else: ?>
        <a href="/" class="hover:text-slate-700">Home</a>
        <a href="/projects.php" class="hover:text-slate-700">Projects</a>
        <a href="/resume.php" class="hover:text-slate-700">Resume</a>
        <a href="/cover-letter.php" class="hover:text-slate-700">Cover Letter</a>
        <a href="/contact.php" class="hover:text-slate-700">Contact</a>
      <?php endif; ?>
      <?php if ($isDev): ?>
        <a href="/todo.php" class="text-xs px-2 py-1 rounded border border-yellow-200 bg-yellow-100 text-yellow-800 hover:bg-yellow-200">Backlog</a>
      <?php endif; ?>
      <a href="/assets/ShimkusResume-2025.pdf" target="_blank" class="inline-flex items-center rounded-md bg-[var(--accent)] px-3 py-1.5 text-[var(--on-accent)] hover:bg-[var(--accent-hover)] shadow-sm">Download Resume</a>
    </nav>
  </div>
</header>
