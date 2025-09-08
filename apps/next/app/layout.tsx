import Script from 'next/script'

export const metadata = {
  title: 'Troy Shimkus — Portfolio & Resume',
  description:
    'Public Sector Product & Data Leader. Portfolio, resume highlights, projects, and contact.',
};

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="en">
      <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <Script
          id="tw-config"
          strategy="beforeInteractive"
          dangerouslySetInnerHTML={{
            __html:
              "window.tailwind = window.tailwind || {}; window.tailwind.config = { theme: { extend: { fontFamily: { sans: ['Inter','ui-sans-serif','system-ui','Segoe UI','Roboto','Helvetica','Arial','sans-serif'] } } } };",
          }}
        />
        <Script src="https://cdn.tailwindcss.com" strategy="beforeInteractive" />
        <style>{` :root{ --primary:#27AAE1; --primary-hover:#199bd4; --on-primary:#ffffff; --accent:#FAAE5E; --accent-hover:#e39d54; --on-accent:#1f2937; --orb1:#CDEFFC; --orb2:#E6F9FF; --chip-bg:#EBF9FF; --chip-ring:#5CCBF0; --chip-text:#063247; --neutral-bg:#F7FAFC; --neutral-text:#334155; } `}</style>
        <Script src="/palette.js" strategy="beforeInteractive" />
      </head>
      <body className="bg-[var(--neutral-bg)] text-[var(--neutral-text)] font-sans antialiased">
        <header className="sticky top-0 z-50 bg-white/80 backdrop-blur border-b border-slate-200">
          <div className="mx-auto max-w-6xl px-4 py-4 flex items-center justify-between">
            <a href="/" className="text-lg font-semibold tracking-tight">Troy Shimkus</a>
            <nav className="hidden sm:flex items-center gap-6 text-sm">
              <a href="/projects" className="hover:text-slate-700">Projects</a>
              <a href="/resume" className="hover:text-slate-700">Resume</a>
              <a href="/cover-letter" className="hover:text-slate-700">Cover Letter</a>
              <a href="/contact" className="hover:text-slate-700">Contact</a>
              <a href="/assets/ShimkusResume-2025.pdf" target="_blank" className="inline-flex items-center rounded-md bg-[var(--accent)] px-3 py-1.5 text-[var(--on-accent)] hover:bg-[var(--accent-hover)] shadow-sm">Download Resume</a>
            </nav>
          </div>
        </header>
        {children}
        <footer className="border-t border-slate-200 bg-white">
          <div className="mx-auto max-w-6xl px-4 py-10 text-sm text-slate-600 flex flex-wrap items-center justify-between gap-4">
            <span>© {new Date().getFullYear()} Troy Shimkus</span>
            <div className="flex items-center gap-4">
              <a href="/resume" className="hover:text-slate-800">Resume</a>
              <a href="/assets/ShimkusResume-2025.pdf" target="_blank" className="hover:text-slate-800">Download PDF</a>
            </div>
          </div>
        </footer>
      </body>
    </html>
  );
}
