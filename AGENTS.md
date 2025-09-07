# Repository Guidelines

## Project Structure & Module Organization

- PHP version (branch `php-version`)
  - `index.php`, `projects.php`, `resume.php`, `contact.php`, `cover-letter.php`
  - `includes/` shared `head.php`, `header.php`, `footer.php`
  - `data/projects.php` (+ optional `data/details/*.php`)
  - `public/images/` (photos), `assets/` (resume PDF)
  - `docs/` (TODO, mail setup), `colors.html` (palette preview)
- Next.js version (branch `nextjs-version`)
  - `app/` routes (`page.tsx`, `projects/page.tsx`, etc.)
  - `data/projects.ts`, `public/images/`

## Build, Test, and Development Commands

- PHP: no build needed. Serve via Apache/PHP.
- Next.js: `npm install`, `npm run dev`, `npm run build`, `npm start`.
- Backlog: `docs/TODO.md` (also dev-only `/todo.php` in PHP).

## Contact & Notifications

- PHP contact supports Text / Email / Both.
  - SMS via Twilio HTTP API (owner notification)
  - Email via PHPMailer SMTP (Gmail App Password); `vendor/` committed; `composer.lock` included
  - Dev (localhost): preview page, no send
- Config: `config/env.php` (ignored) holds SMTP/Twilio; never commit secrets.

## Theming & Content

- Tailwind via CDN; palette through CSS variables (`--primary`, `--accent`, etc.).
- Palette chooser: `/colors.html` sets `localStorage.palette`; pages hydrate vars at load.
- Projects catalog is data-driven (`data/projects.*`); homepage shows a responsive auto-scrolling carousel (1/2/3-up, swipe on mobile).

## Coding Style & Conventions

- 2-space indentation; descriptive names; avoid secrets in code.
- Keep shared UI in includes (PHP) or layout (Next). Prefer data-driven sections.
- Conventional Commits (`feat:`, `fix:`, `chore:`, `refactor:`…).

## Security & Operational Notes

- Do not commit `config/env.php` or prototype files; folders ignored: `prototypes/`, `private/`, `scratch/`, `tmp/`.
- HostGator deploys: `vendor/` is tracked to avoid server-side Composer. `composer.lock` ensures reproducible installs.
- Push protection: address any secret-scan blocks by removing credentials from history before pushing.

