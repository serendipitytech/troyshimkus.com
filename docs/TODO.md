# Project TODOs (Backlog)

## Palette Picker & Theming
- [ ] Add success toast on colors.html: “Applied to site ✓”.
- [ ] Add “Reset to default” action (clears localStorage).
- [ ] Optional: Force-apply selected palette to site (write to localStorage on load).
- [ ] DRY palette variable loader into a small shared script to reduce duplication across pages.
- [ ] Audit color contrast for each palette (WCAG AA), adjust tones if needed.

## PHP Layout & DX
- [ ] Extract header/footer/head into PHP includes to avoid repetition. (Done)
- [ ] Centralize palette variable block (Done in includes/head.php).

## Contact Form (PHP)
- [ ] Integrate email delivery (SES/Mailgun/SMTP) with server-side validation. (Done with PHPMailer + SMTP)
- [ ] Add basic spam protection (honeypot/timeout) and CSRF token. (Honeypot done)
- [ ] Provide success/thank-you state and error handling UX. (Done)

## Next.js Parity
- [ ] Contact API routes: `/api/contact` for SMS (Twilio) + Email (Nodemailer/SMTP). Mirror Text / Email / Both UI and banners.
- [ ] Resume page parity (AI & Automation entry) and header photo alignment.
- [ ] Cover letter page parity (dev-only generator vs prod read-only).
- [ ] Verify projects page anchors and expand details as needed.

## Mobile Optimization
- [ ] Review layouts on small screens; ensure hero, projects carousel, forms, and cards have optimal spacing and readable type.
- [ ] Add touch/swipe to projects carousel; test 1/2/3-up breakpoints. (Done on both)
- [ ] Validate tap targets and focus order across all interactive elements.

## Performance & SEO
- [ ] Optimize Inter font loading (preload/swap) and consider self-hosting.
- [ ] Add meta/OG tags and sitemap/robots.
- [ ] Tighten caching/compression headers in .htaccess for assets.

