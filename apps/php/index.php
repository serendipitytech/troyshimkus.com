<?php
  $host = $_SERVER['HTTP_HOST'] ?? '';
  $isDev = (strpos($host, 'localhost') !== false) || (strpos($host, '127.0.0.1') !== false);
  $contactStatus = $_GET['contact'] ?? '';
  $pageTitle = 'Troy Shimkus — Portfolio & Resume';
  $pageDescription = 'Public Sector Data Programs — portfolio, resume highlights, projects, and contact.';
  include __DIR__ . '/includes/head.php';
  $isHome = true;
?>
  <body class="bg-[var(--neutral-bg)] text-[var(--neutral-text)] font-sans antialiased">
    <?php include __DIR__ . '/includes/header.php'; ?>

    <!-- Hero -->
    <section class="relative overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-b from-slate-100 to-transparent"></div>
      <div aria-hidden="true" class="pointer-events-none absolute -top-24 -right-24 h-72 w-72 rounded-full bg-[var(--orb1)] blur-3xl opacity-60"></div>
      <div aria-hidden="true" class="pointer-events-none absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-[var(--orb2)] blur-3xl opacity-60"></div>
      <div class="relative mx-auto max-w-6xl px-4 py-20 sm:py-28">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
          <div class="flex justify-center md:justify-start">
            <!-- Hero image: Photo 7 (circle) on the left -->
            <img
              src="/public/images/photo7_circle.png"
              alt="Troy Shimkus portrait"
              class="rounded-full shadow-lg mx-auto md:mx-0 max-w-xs sm:max-w-sm"
              loading="eager"
              decoding="async"
              width="320"
              height="320"
            />
          </div>
          <div>
            <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-slate-900">Public Sector Product & Data Leader</h1>
            <p class="mt-6 text-lg text-slate-600">I lead cross‑functional teams to plan, deliver, and scale mission‑aligned products and data programs—turning policy goals into transparent systems, actionable insights, and measurable outcomes.</p>
            <div class="mt-8 flex flex-wrap gap-3">
            <a href="/resume.php" class="inline-flex items-center rounded-md bg-[var(--accent)] px-5 py-2.5 text-[var(--on-accent)] hover:bg-[var(--accent-hover)] shadow w-full sm:w-auto">View Resume</a>
              <a href="#contact" class="inline-flex items-center rounded-md bg-[var(--primary)] px-5 py-2.5 text-[var(--on-primary)] hover:bg-[var(--primary-hover)] shadow w-full sm:w-auto">Get in Touch</a>
            </div>
            <div class="mt-6 flex flex-wrap gap-2">
              <span class="inline-flex items-center rounded-full bg-[var(--chip-bg)] px-3 py-1 text-sm font-medium text-[var(--chip-text)] ring-1 ring-inset ring-[var(--chip-ring)]">Open to: Public Sector Data Programs</span>
              <span class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-sm text-slate-700 ring-1 ring-inset ring-slate-200">Education • Municipal • Nonprofit</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- About (two-column layout, large image) -->
    <section id="about" class="bg-white border-t border-slate-200">
      <div class="mx-auto max-w-6xl px-4 py-16 sm:py-20">
        <div class="grid gap-8 md:grid-cols-2 items-center">
          <div>
            <h2 class="text-2xl font-bold">About</h2>
            <span class="mt-2 block h-1 w-10 bg-[var(--accent)]"></span>
            <p class="mt-4 text-slate-700 leading-relaxed">
              I’m Troy Shimkus, focused on Public Sector Data Programs—leading cross‑functional teams to deliver transparent,
              human‑centered systems for education, local government, and nonprofits.
            </p>
            <p class="mt-3 text-slate-700">Recent work: PowerSchool (dashboards for 150+ districts), City Commissioner (public transparency dashboards), and Deltona Strong (community resilience initiatives, $40k+ raised).</p>
          </div>
          <div class="flex md:justify-end">
            <!-- About image (large): photo 9 with brick background for visual contrast -->
            <img
              src="/public/images/photo9.jpg"
              alt="Troy Shimkus seated, hands together"
              class="rounded-lg shadow-md w-full max-w-md object-cover object-center h-64 sm:h-80 md:h-96"
              loading="lazy"
              decoding="async"
              width="640"
              height="480"
            />
          </div>
        </div>
      </div>
    </section>

    <!-- Mission (simple block with circle image under heading) -->
    <section id="mission" class="mx-auto max-w-6xl px-4 py-16 sm:py-20">
      <div class="grid gap-10 sm:grid-cols-3">
        <div>
          <h2 class="text-2xl font-bold">Mission</h2>
          <span class="mt-2 block h-1 w-10 bg-[var(--primary)]"></span>
          <img
            src="/public/images/photo8_circle.png"
            alt="Side profile portrait"
            class="mt-4 w-28 h-28 rounded-full shadow-md"
            loading="lazy"
            decoding="async"
            width="160"
            height="160"
          />
        </div>
        <div class="sm:col-span-2 text-slate-700 leading-relaxed">
          <p>
            Advance public sector outcomes by building transparent, human‑centered data programs that connect policy goals to measurable results.
            I focus on clarity, adoption, and collaboration across technical and non‑technical stakeholders.
          </p>
          <p class="mt-4">Areas of emphasis include district analytics, civic transparency dashboards, and reliable data pipelines.</p>
        </div>
      </div>
    </section>

    <!-- Resume Highlights -->
    <section id="highlights" class="bg-white border-y border-slate-200">
      <div class="mx-auto max-w-6xl px-4 py-16 sm:py-20">
        <h2 class="text-2xl font-bold">Resume Highlights</h2>
        <span class="mt-2 block h-1 w-10 bg-[var(--primary)]"></span>
        <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          <div class="rounded-lg border border-slate-200 border-t-4 border-[var(--accent)] bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
            <h3 class="font-semibold">Leadership & Product Delivery</h3>
            <ul class="mt-3 list-disc pl-5 text-slate-700 text-sm space-y-1">
              <li>Align stakeholders, shape roadmaps, coach cross‑functional teams</li>
              <li>Plan → execute → scale with standard delivery and clear outcomes</li>
              <li>Bridge technical/non‑technical to ship the right thing</li>
            </ul>
          </div>
          <div class="rounded-lg border border-slate-200 border-t-4 border-[var(--primary)] bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
            <h3 class="font-semibold">AI Practices & Automation</h3>
            <ul class="mt-3 list-disc pl-5 text-slate-700 text-sm space-y-1">
              <li>LLM‑assisted workflow: design, prompting, codegen, evaluation</li>
              <li>Model use: Whisper, YOLOv8; data prep/labeling for ETL</li>
              <li>Guardrails/privacy mindset; pragmatic, outcome‑driven adoption</li>
            </ul>
          </div>
          <div class="rounded-lg border border-slate-200 border-t-4 border-[var(--accent)] bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
            <h3 class="font-semibold">Data Programs & Systems</h3>
            <ul class="mt-3 list-disc pl-5 text-slate-700 text-sm space-y-1">
              <li>Dashboards and secure data flows; integrations (APIs, ETL)</li>
              <li>Cloud practices: observability, CI/CD, reliability</li>
              <li>K‑12 and civic data experience; stakeholder‑ready reporting</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Projects -->
    <section id="projects" class="mx-auto max-w-6xl px-4 py-16 sm:py-20">
      <div class="flex items-end justify-between">
        <div>
          <h2 class="text-2xl font-bold">Projects</h2>
          <span class="mt-2 block h-1 w-10 bg-[var(--accent)]"></span>
        </div>
        <a href="#contact" class="text-sm text-slate-600 hover:text-slate-800">Need something like this? Let’s chat →</a>
      </div>
      <?php $projects = include __DIR__ . '/data/projects.php'; ?>
      <div class="mt-8">
        <div id="proj-carousel" class="relative overflow-hidden">
          <div class="flex transition-transform duration-500 ease-out" data-track>
            <?php foreach ($projects as $proj): ?>
              <div class="px-1" data-slide>
                <article class="rounded-lg border border-slate-200 border-t-4 <?php echo 'border-[' . (rand(0,1)?'var(--primary)':'var(--accent)') . ']'; ?> bg-white p-6 shadow-sm h-full">
                  <h3 class="font-semibold"><?php echo htmlspecialchars($proj['title']); ?></h3>
                  <p class="mt-2 text-sm text-slate-700"><?php echo htmlspecialchars($proj['summary']); ?></p>
                  <?php if (!empty($proj['tags'])): ?>
                  <div class="mt-4 flex flex-wrap gap-2">
                    <?php foreach ($proj['tags'] as $tag): ?>
                      <span class="text-xs bg-slate-100 text-slate-700 rounded-full px-2 py-1 ring-1 ring-inset ring-slate-200"><?php echo htmlspecialchars($tag); ?></span>
                    <?php endforeach; ?>
                  </div>
                  <?php endif; ?>
                  <div class="mt-4">
                    <a href="/projects.php#<?php echo htmlspecialchars($proj['slug']); ?>" class="text-sm text-slate-600 hover:text-slate-800">Read more →</a>
                  </div>
                </article>
              </div>
            <?php endforeach; ?>
          </div>
          <div class="mt-4 flex justify-center gap-2" data-dots>
            <?php for ($i=0;$i<count($projects);$i++): ?>
              <button class="h-2 w-2 rounded-full bg-slate-300" aria-label="Go to slide <?php echo $i+1; ?>" data-dot></button>
            <?php endfor; ?>
          </div>
        </div>
      </div>
      <script>
        (function(){
          const root = document.getElementById('proj-carousel');
          if (!root) return;
          const track = root.querySelector('[data-track]');
          const slides = Array.from(root.querySelectorAll('[data-slide]'));
          const dots = Array.from(root.querySelectorAll('[data-dot]'));
          let idx = 0;
          let visible = 1;
          let positions = 1;
          let startX = 0, currentX = 0, dragging = false;
          function computeVisible(){
            const w = window.innerWidth;
            if (w >= 1024) return 3;
            if (w >= 640) return 2;
            return 1;
          }
          function layout(){
            visible = computeVisible();
            positions = Math.max(1, slides.length - visible + 1);
            const cardW = root.clientWidth / visible;
            slides.forEach(sl => { sl.style.minWidth = cardW + 'px'; sl.style.maxWidth = cardW + 'px'; });
            if (idx >= positions) idx = 0;
            dots.forEach((d,i)=>{ d.style.display = (i<positions)?'inline-block':'none'; });
            update();
          }
          function update(){
            const cardW = root.clientWidth / visible;
            const offset = -idx * cardW;
            track.style.transform = `translateX(${offset}px)`;
            dots.forEach((d,i)=> d.style.background = i===idx ? 'var(--accent)' : '#cbd5e1');
          }
          function next(){ idx = (idx+1) % positions; update(); }
          let timer = setInterval(next, 5000);
          root.addEventListener('mouseenter', ()=> clearInterval(timer));
          root.addEventListener('mouseleave', ()=> timer = setInterval(next, 5000));
          dots.forEach((d,i)=> d.addEventListener('click', ()=> { if (i<positions){ idx=i; update(); } }));
          window.addEventListener('resize', layout);

          // touch/swipe support
          track.addEventListener('touchstart', (e)=>{
            if (!e.touches || !e.touches.length) return;
            clearInterval(timer);
            dragging = true;
            startX = e.touches[0].clientX;
            currentX = startX;
          }, {passive:true});
          track.addEventListener('touchmove', (e)=>{
            if (!dragging || !e.touches || !e.touches.length) return;
            currentX = e.touches[0].clientX;
          }, {passive:true});
          track.addEventListener('touchend', ()=>{
            if (!dragging) return;
            const delta = currentX - startX;
            const threshold = 40; // px
            if (Math.abs(delta) > threshold) {
              if (delta < 0) { idx = Math.min(idx+1, positions-1); }
              else { idx = Math.max(idx-1, 0); }
              update();
            }
            dragging = false;
            timer = setInterval(next, 5000);
          });
          layout();
        })();
      </script>
    </section>

    <!-- Contact -->
    <section id="contact" class="bg-white border-t border-slate-200">
      <div class="mx-auto max-w-6xl px-4 py-16 sm:py-20">
        <h2 class="text-2xl font-bold">Contact</h2>
        <p class="mt-3 text-slate-600">Send a note and I’ll get back soon.</p>
        <?php if ($contactStatus === 'success'): ?>
          <div class="mt-4 rounded-md border border-emerald-200 bg-emerald-50 p-4 text-sm text-emerald-900">
            Thanks! Your message was submitted. I’ll be in touch soon.
          </div>
        <?php elseif ($contactStatus === 'error'): ?>
          <div class="mt-4 rounded-md border border-red-200 bg-red-50 p-4 text-sm text-red-800">
            Sorry, something went wrong. Please try again or email directly.
          </div>
        <?php endif; ?>
        <form id="home-contact" action="/contact.php" method="post" class="mt-8 grid gap-4 max-w-xl bg-white border border-slate-200 rounded-lg p-6 shadow-sm">
          <!-- Honeypot field (hidden) -->
          <div class="hidden" aria-hidden="true">
            <label for="website">Website</label>
            <input id="website" name="website" type="text" tabindex="-1" autocomplete="off" />
          </div>
          <!-- Notify preference -->
          <div>
            <span class="block text-sm font-medium">How should I contact you? <span class="text-slate-500 font-normal">I prefer texting.</span></span>
            <div class="mt-2 inline-flex rounded-md ring-1 ring-inset ring-slate-300 overflow-hidden">
              <input type="hidden" name="notify" id="notify" value="sms" />
              <button type="button" data-notify="sms" class="px-3 py-1.5 text-sm bg-[var(--accent)] text-[var(--on-accent)]">Text</button>
              <button type="button" data-notify="email" class="px-3 py-1.5 text-sm bg-white text-slate-700">Email</button>
              <button type="button" data-notify="both" class="px-3 py-1.5 text-sm bg-white text-slate-700">Both</button>
            </div>
          </div>
          <div>
            <label for="name" class="block text-sm font-medium">Name</label>
            <input id="name" name="name" type="text" required minlength="2" autocomplete="name" class="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500" />
            <p class="mt-1 text-xs text-red-600 hidden" data-error="name">Please enter your name.</p>
          </div>
          <div>
            <label for="email" class="block text-sm font-medium">Email</label>
            <input id="email" name="email" type="email" autocomplete="email" inputmode="email" class="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500" />
            <p class="mt-1 text-xs text-red-600 hidden" data-error="email">Please enter a valid email.</p>
          </div>
          <div>
            <label for="phone" class="block text-sm font-medium">Phone (for text)</label>
            <input id="phone" name="phone" type="tel" autocomplete="tel" placeholder="(555) 555-5555" class="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500" />
            <p class="mt-1 text-xs text-red-600 hidden" data-error="phone">Please enter a valid phone when selecting Text.</p>
          </div>
          <div>
            <label for="message" class="block text-sm font-medium">Message</label>
            <textarea id="message" name="message" rows="5" required minlength="10" class="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500"></textarea>
            <p class="mt-1 text-xs text-red-600 hidden" data-error="message">Please enter at least 10 characters.</p>
          </div>
          <div class="flex flex-col sm:flex-row items-start sm:items-center gap-3">
            <button type="submit" class="inline-flex items-center rounded-md bg-[var(--primary)] px-5 py-2.5 text-[var(--on-primary)] hover:bg-[var(--primary-hover)] shadow w-full sm:w-auto">Send</button>
            <a href="mailto:hello@troyshimkus.com" class="text-sm text-slate-600 hover:text-slate-800">Or email directly</a>
          </div>
        </form>
        <script>
          (function(){
            const form = document.getElementById('home-contact');
            if(!form) return;
            const fields = {
              name: form.querySelector('#name'),
              email: form.querySelector('#email'),
              message: form.querySelector('#message')
            };
            const errors = {
              name: form.querySelector('[data-error="name"]'),
              email: form.querySelector('[data-error="email"]'),
              message: form.querySelector('[data-error="message"]')
            };
            function showError(key, show){
              if(!errors[key] || !fields[key]) return;
              errors[key].classList.toggle('hidden', !show);
              fields[key].classList.toggle('border-red-400', show);
              fields[key].setAttribute('aria-invalid', show ? 'true' : 'false');
            }
            function validate(){
              let ok = true;
              const nameOk = fields.name.value.trim().length >= 2;
              showError('name', !nameOk); ok = ok && nameOk;
              const emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(fields.email.value.trim());
              showError('email', !emailOk); ok = ok && emailOk;
              const msgOk = fields.message.value.trim().length >= 10;
              showError('message', !msgOk); ok = ok && msgOk;
              return ok;
            }
            const notifyInput = document.getElementById('notify');
            const emailEl = document.getElementById('email');
            const phoneEl = document.getElementById('phone');
            function setNotify(val){
              if(!notifyInput) return;
              notifyInput.value = val;
              document.querySelectorAll('[data-notify]').forEach(btn=>{
                const active = btn.getAttribute('data-notify') === val;
                btn.classList.toggle('bg-[var(--accent)]', active);
                btn.classList.toggle('text-[var(--on-accent)]', active);
                btn.classList.toggle('bg-white', !active);
                btn.classList.toggle('text-slate-700', !active);
              });
              // Toggle required attributes
              if (emailEl) emailEl.toggleAttribute('required', val === 'email' || val === 'both');
              if (phoneEl) phoneEl.toggleAttribute('required', val === 'sms' || val === 'both');
            }
            document.querySelectorAll('[data-notify]').forEach(btn=>{
              btn.addEventListener('click', ()=> setNotify(btn.getAttribute('data-notify')));
            });
            setNotify(notifyInput?.value || 'sms');

            function phoneValid(){
              const raw = (document.getElementById('phone')?.value || '').replace(/[^0-9+]/g,'');
              // minimal check: at least 10 digits
              const digits = raw.replace(/\D/g,'');
              return digits.length >= 10;
            }
            function validate(){
              let ok = true;
              const nameOk = fields.name.value.trim().length >= 2;
              showError('name', !nameOk); ok = ok && nameOk;
              const notifyVal = notifyInput?.value || 'sms';
              const emailVal = fields.email.value.trim();
              const emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailVal);
              if (notifyVal === 'email') {
                showError('email', !emailOk); ok = ok && emailOk;
              } else {
                // If SMS preferred, email is optional; hide error unless provided and invalid
                showError('email', !(emailVal === '' || emailOk));
              }
              const msgOk = fields.message.value.trim().length >= 10;
              showError('message', !msgOk); ok = ok && msgOk;
              if (notifyVal === 'sms' || notifyVal === 'both') {
                const pOk = phoneValid();
                const phoneErr = document.querySelector('[data-error="phone"]');
                if (phoneErr) phoneErr.classList.toggle('hidden', pOk);
                if (phoneEl) phoneEl.classList.toggle('border-red-400', !pOk);
                ok = ok && pOk;
              }
              if (notifyVal === 'both') {
                // Require email as well
                showError('email', !emailOk); ok = ok && emailOk;
              }
              return ok;
            }
            form.addEventListener('submit', (e)=>{ if(!validate()){ e.preventDefault(); } });
            ['input','blur','keyup'].forEach(evt=>{
              Object.values(fields).forEach(el=> el.addEventListener(evt, validate));
            });
            // If coming back with a contact status, ensure the contact section is in view
            try {
              const params = new URLSearchParams(window.location.search);
              if (params.has('contact') && window.location.hash !== '#contact') {
                document.getElementById('contact')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
              }
            } catch(e) {}
          })();
        </script>
      </div>
    </section>

    <?php include __DIR__ . '/includes/footer.php'; ?>
