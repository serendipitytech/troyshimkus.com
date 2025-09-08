<?php
  $host = $_SERVER['HTTP_HOST'] ?? '';
  $isDev = (strpos($host, 'localhost') !== false) || (strpos($host, '127.0.0.1') !== false);
  $pageTitle = 'Troy Shimkus — Detailed Resume';
  $pageDescription = 'Detailed resume for Troy Shimkus: experience, skills, and education.';
  include __DIR__ . '/includes/head.php';
?>
  <body class="bg-[var(--neutral-bg)] text-[var(--neutral-text)] font-sans antialiased">
    <?php include __DIR__ . '/includes/header.php'; ?>

    <main class="mx-auto max-w-4xl px-4 py-10 sm:py-14">
      <section>
        <div class="md:flex items-center gap-6">
          <img src="/public/images/photo1_circle.png" alt="Troy Shimkus profile" class="mt-4 md:mt-0 rounded-full shadow-md w-28 h-28 md:w-32 md:h-32" loading="lazy" decoding="async" width="200" height="200" />
          <div class="mt-4 md:mt-0">
            <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Resume</h1>
            <p class="mt-2 text-slate-600">Targeting leadership roles in Public Sector Data Programs across education, municipalities, and nonprofits.</p>
          </div>
        </div>
      </section>

      <section class="mt-10">
        <h2 class="text-xl font-bold">Experience</h2>
        <span class="mt-2 block h-1 w-10 bg-[var(--primary)]"></span>
        <div class="mt-6 space-y-6">
          <article class="rounded-lg border border-[var(--primary)] bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
              <h3 class="font-semibold">Manager, Professional Services — PowerSchool</h3>
              <span class="text-sm text-slate-600">Jan 2022 – Present</span>
            </div>
            <ul class="mt-3 list-disc pl-5 text-sm text-slate-700 space-y-1">
              <li>Led customization of SaaS dashboards for 150+ school districts (100k+ students).</li>
              <li>Standardized deployment and documentation, reducing onboarding time.</li>
              <li>Aligned technical and non‑technical stakeholders to district outcomes and renewals.</li>
            </ul>
          </article>
          <article class="rounded-lg border border-[var(--accent)] bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
              <h3 class="font-semibold">Consultant (Independent) — Software Integration & Solutions</h3>
              <span class="text-sm text-slate-600">Jan 2008 – Present</span>
            </div>
            <ul class="mt-3 list-disc pl-5 text-sm text-slate-700 space-y-1">
              <li>Delivered 20+ solutions for small businesses and nonprofits.</li>
              <li>Built web apps, Dockerized infrastructure, API integrations, and AI‑powered tools.</li>
              <li>Implemented marketing automation pipelines (Mautic, RabbitMQ, MySQL).</li>
            </ul>
          </article>
          <article class="rounded-lg border border-[var(--primary)] bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
              <h3 class="font-semibold">City Commissioner — Deltona, FL</h3>
              <span class="text-sm text-slate-600">Jan 2024 – Nov 2024</span>
            </div>
            <ul class="mt-3 list-disc pl-5 text-sm text-slate-700 space-y-1">
              <li>Guided leadership transition; led City Manager recruitment and compensation strategy.</li>
              <li>Launched public dashboards to improve transparency and civic trust.</li>
            </ul>
          </article>
          <article class="rounded-lg border border-[var(--accent)] bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
              <h3 class="font-semibold">President — Deltona Strong, LLC (Nonprofit)</h3>
              <span class="text-sm text-slate-600">Aug 2018 – Present</span>
            </div>
            <ul class="mt-3 list-disc pl-5 text-sm text-slate-700 space-y-1">
              <li>Founded community resilience nonprofit; raised $40k+ for families in need.</li>
              <li>Launched community garden and emergency hotline with local partners.</li>
            </ul>
          </article>
          <article class="rounded-lg border border-[var(--primary)] bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
              <h3 class="font-semibold">Implementation Manager — PowerSchool</h3>
              <span class="text-sm text-slate-600">Jan 2014 – Dec 2022</span>
            </div>
            <ul class="mt-3 list-disc pl-5 text-sm text-slate-700 space-y-1">
              <li>Partnered with district leadership on adoption strategies and product improvements.</li>
              <li>Strengthened retention and trust through hands‑on issue resolution.</li>
            </ul>
          </article>
          <article class="rounded-lg border border-[var(--accent)] bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
            <div class="flex items-center justify-between">
              <h3 class="font-semibold">Innovative Learning Specialist — Lake County Schools, FL</h3>
              <span class="text-sm text-slate-600">Jul 2003 – Jun 2007</span>
            </div>
            <ul class="mt-3 list-disc pl-5 text-sm text-slate-700 space-y-1">
              <li>Rolled out district‑wide software/hardware with tailored educator training.</li>
            </ul>
          </article>
        </div>
      </section>

      <section class="mt-10 grid gap-6 sm:grid-cols-2">
        <div>
          <h2 class="text-xl font-bold">Skills</h2>
          <span class="mt-2 block h-1 w-10 bg-[var(--accent)]"></span>
          <div class="mt-4 rounded-lg border border-[var(--accent)] bg-white p-6 shadow-sm text-sm text-slate-700 transition hover:shadow-md hover:-translate-y-0.5">
            <p><span class="font-semibold">Leadership & Strategy:</span> Product roadmaps, stakeholder alignment, Agile/Scrum, coaching, change management</p>
            <p class="mt-2"><span class="font-semibold">Data & Analytics:</span> SQL, Snowflake, MySQL (Dockerized), ETL (Alteryx, Knime, Talend), DWH optimization</p>
            <p class="mt-2"><span class="font-semibold">Development & Integration:</span> PHP, JavaScript/React, Flask, API integrations, LMS systems, Supabase</p>
            <p class="mt-2"><span class="font-semibold">AI & Automation:</span> LLM‑assisted workflows (prompting, codegen, evaluation), Whisper (speech‑to‑text), YOLOv8 (vision), data prep/labeling, pragmatic guardrails</p>
            <p class="mt-2"><span class="font-semibold">DevOps & Infrastructure:</span> Docker, AWS/Azure, CI/CD, backup & disaster recovery, secrets management</p>
            <p class="mt-2"><span class="font-semibold">Tools & Platforms:</span> Salesforce, JIRA, Adobe/Apple Creative Suite, Git/GitHub</p>
          </div>
        </div>
        <div>
          <h2 class="text-xl font-bold">Education</h2>
          <span class="mt-2 block h-1 w-10 bg-[var(--primary)]"></span>
          <div class="mt-4 rounded-lg border border-[var(--primary)] bg-white p-6 shadow-sm text-sm text-slate-700 transition hover:shadow-md hover:-translate-y-0.5">
            <p>Master, Music Education — Florida State University</p>
            <p class="mt-2">Bachelor, Music Education — University of Central Florida</p>
          </div>
        </div>
      </section>

      <section class="mt-10">
        <h2 class="text-xl font-bold">Links</h2>
        <div class="mt-4 flex flex-wrap gap-3">
          <a href="/assets/ShimkusResume-2025.pdf" target="_blank" class="inline-flex items-center rounded-md bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">Download PDF</a>
        </div>
      </section>
    </main>

    <?php include __DIR__ . '/includes/footer.php'; ?>
