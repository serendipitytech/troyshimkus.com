<?php
// Cover letter template page using values provided via form inputs.
// Defaults to placeholders when fields are empty.

function h($v) { return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8'); }

$host = $_SERVER['HTTP_HOST'] ?? '';
$isDev = (strpos($host, 'localhost') !== false) || (strpos($host, '127.0.0.1') !== false);

$today = date('F j, Y');
$isPost = ($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST';

$date = $isPost ? trim($_POST['date'] ?? '') : $today;
$manager = $isPost ? trim($_POST['manager'] ?? '') : '';
$org = $isPost ? trim($_POST['org'] ?? '') : '';
$address = $isPost ? trim($_POST['address'] ?? '') : '';
$role = $isPost ? trim($_POST['role'] ?? '') : '';

// Fallback placeholders for readability
$p_date = $date ?: '[Date]';
$p_manager = $manager ?: '[Hiring Manager]';
$p_org = $org ?: '[Organization Name]';
$p_address = $address ?: '[Address]';
$p_role = $role ?: '[Role Title]';
?>
<?php
  $pageTitle = 'Cover Letter — Troy Shimkus';
  $pageDescription = 'Public sector data programs cover letter template for Troy Shimkus.';
  include __DIR__ . '/includes/head.php';
?>
  <body class="bg-[var(--neutral-bg)] text-[var(--neutral-text)] font-sans antialiased">
    <?php include __DIR__ . '/includes/header.php'; ?>

    <main class="mx-auto max-w-4xl px-4 py-10 sm:py-14">
      <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Cover Letter</h1>
      <?php if ($isDev): ?>
      <p class="mt-2 text-slate-600">Dev-only: tailor fields and preview the generated letter.</p>

      <form action="/cover-letter.php" method="post" class="mt-6 grid gap-4 bg-white border border-slate-200 rounded-lg p-6 shadow-sm">
        <div class="grid sm:grid-cols-2 gap-4">
          <div>
            <label for="date" class="block text-sm font-medium">Date</label>
            <input id="date" name="date" type="text" value="<?php echo h($date ?: $today); ?>" class="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500" />
          </div>
          <div>
            <label for="role" class="block text-sm font-medium">Role Title</label>
            <input id="role" name="role" type="text" value="<?php echo h($role); ?>" placeholder="Public Sector Data Programs Manager" class="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500" />
          </div>
        </div>
        <div class="grid sm:grid-cols-2 gap-4">
          <div>
            <label for="manager" class="block text-sm font-medium">Hiring Manager’s Name</label>
            <input id="manager" name="manager" type="text" value="<?php echo h($manager); ?>" placeholder="Alex Johnson" class="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500" />
          </div>
          <div>
            <label for="org" class="block text-sm font-medium">Organization Name</label>
            <input id="org" name="org" type="text" value="<?php echo h($org); ?>" placeholder="City of Example" class="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500" />
          </div>
        </div>
        <div>
          <label for="address" class="block text-sm font-medium">Address</label>
          <textarea id="address" name="address" rows="2" placeholder="123 Main St, Example, ST 00000" class="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500"><?php echo h($address); ?></textarea>
        </div>
        <div class="flex items-center gap-3">
          <button type="submit" class="inline-flex items-center rounded-md bg-[var(--primary)] px-5 py-2.5 text-[var(--on-primary)] hover:bg-[var(--primary-hover)] shadow">Update Letter</button>
          <a href="/assets/TroyShimkus_Resume_CoverLetter_Package.docx" target="_blank" class="text-sm text-slate-600 hover:text-slate-800">Download DOCX template</a>
        </div>
      </form>
      <?php else: ?>
      <p class="mt-2 text-slate-600">General cover letter used for leadership roles in Public Sector Data Programs.</p>
      <?php endif; ?>

      <div class="mt-4 flex justify-end">
        <button onclick="window.print()" class="inline-flex items-center rounded-md bg-[var(--primary)] px-4 py-2 text-[var(--on-primary)] hover:bg-[var(--primary-hover)] shadow print:hidden">
          Print as PDF
        </button>
      </div>

      <section id="letter" class="mt-8 bg-white border border-slate-200 rounded-lg p-6 shadow-sm leading-8 text-slate-800">
        <div class="text-sm text-slate-500">Deltona, FL | 407.443.6844 | Contact@TroyShimkus.com</div>
        <div class="mt-2"><?php echo h($isDev ? $p_date : date('F j, Y')); ?></div>
        <?php if ($isDev): ?>
          <div class="mt-6">
            <div><?php echo h($p_manager); ?></div>
            <div><?php echo h($p_org); ?></div>
            <div class="whitespace-pre-line"><?php echo h($p_address); ?></div>
          </div>
        <?php else: ?>
          <!-- In production, omit organization/address block for a clean, generic letter. -->
        <?php endif; ?>
        <p class="mt-6">Dear <?php echo h($isDev ? $p_manager : 'Hiring Manager'); ?>,</p>
        <p class="mt-4">I am excited to apply for the <?php echo h($isDev ? $p_role : 'Public Sector Data Programs Manager'); ?> position at <?php echo h($isDev ? $p_org : 'your organization'); ?>. With more than 15 years of experience in education technology, public service, and nonprofit leadership, I bring a unique blend of strategic vision and hands‑on technical expertise that equips me to lead teams, deliver impact, and build long‑term stakeholder trust.</p>
        <p class="mt-4">In my current role as Manager of Professional Services at PowerSchool, I lead a team customizing SaaS dashboards for more than 150 school districts serving over 100,000 students. My focus is always on driving adoption and renewals by ensuring technology serves real‑world needs. By standardizing processes, coaching cross‑functional teams, and bridging technical and non‑technical stakeholders, I’ve helped districts maximize their investment in technology while keeping the focus on student outcomes.</p>
        <p class="mt-4">Beyond my work in education technology, I have a deep record of public service and nonprofit leadership. As a City Commissioner for Deltona, I advocated for data‑driven decision making and successfully led the launch of public‑facing dashboards to improve transparency and civic trust. As founder of Deltona Strong, a nonprofit dedicated to community resilience, I built partnerships to launch a community garden, establish an emergency hotline, and raise more than $40,000 in support of local families. These experiences have honed my ability to align diverse stakeholders and move initiatives from vision to reality.</p>
        <p class="mt-4">I am particularly drawn to <?php echo h($p_org); ?>’s mission in education/public service/nonprofit work, because I have seen first‑hand how access to the right tools and transparent processes can transform communities. My career has consistently been about helping organizations bridge the gap between technical possibilities and human outcomes — whether by designing data systems, guiding city operations, or leading volunteer efforts.</p>
        <p class="mt-4">I would welcome the opportunity to bring this mix of leadership, technical insight, and community commitment to your team.</p>
        <p class="mt-4">Thank you for considering my application. I look forward to the chance to discuss how my background can contribute to your goals.</p>
        <p class="mt-6">Sincerely,</p>
        <p class="mt-2">Troy Shimkus</p>
      </section>

      <!-- Print-only signature block branding -->
      <div class="hidden print:block mt-6">
        <div class="h-px bg-slate-200"></div>
        <div class="mt-3 text-sm">
          <div class="font-semibold">Troy Shimkus</div>
          <div class="text-slate-600">Public Sector Data Programs</div>
          <div class="mt-1 text-slate-600">Contact@TroyShimkus.com • 407.443.6844 • troyshimkus.com</div>
        </div>
      </div>

      <div class="mt-6 text-sm text-slate-600">Tip: Print to PDF from your browser to generate a tailored PDF.</div>
    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>
