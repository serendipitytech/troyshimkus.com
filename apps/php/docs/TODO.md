# Project TODOs (Backlog)

Short list of potential enhancements to revisit after core content is finalized.

## Palette Picker & Theming
- [ ] Add success toast on colors.html: “Applied to site ✓”.
- [ ] Add “Reset to default” action (clears localStorage).
- [ ] Optional: Force-apply selected palette to site (write to localStorage on load).
- [ ] DRY palette variable loader into a small shared script to reduce duplication across pages.
- [ ] Audit color contrast for each palette (WCAG AA), adjust tones if needed.
- [ ] Explore palette-aligned border rings around profile images (hero/resume) for subtle emphasis.

## PHP Layout & DX
- [ ] Extract header/footer/head into PHP includes to avoid repetition.
- [ ] Centralize palette variable block in a single include and load across pages.

## Contact Form
- [ ] Integrate email delivery (SES/Mailgun/SMTP) with server-side validation.
- [ ] Add basic spam protection (honeypot/timeout) and CSRF token.
- [ ] Provide success/thank-you state and error handling UX.

## Next.js Parity
- [ ] Port finalized content and palette system to nextjs-version with CSS variables.
- [ ] Use shared layout and a minimal theme switcher for preview.

## Performance & SEO
- [ ] Optimize Inter font loading (preload/swap) and consider self-hosting.
- [ ] Add meta/OG tags and sitemap/robots.
- [ ] Tighten caching/compression headers in .htaccess for assets.

## Accessibility
- [ ] Add screen-reader announcements (aria-live) for form inline errors and success banners.
- [ ] Plan full a11y review: keyboard nav, focus order/visible focus, color contrast, motion preferences, semantic headings, link names, alt text.

## Mobile Optimization
- [ ] Review layouts on small screens; ensure hero, projects carousel, forms, and cards have optimal spacing and readable type.
- [ ] Add touch/swipe to projects carousel; test 1/2/3-up breakpoints.
- [ ] Validate tap targets and focus order across all interactive elements.
