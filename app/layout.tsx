export const metadata = {
  title: 'Troy Shimkus — Portfolio & Resume',
  description:
    'Technology leader, builder, and product-minded engineer. Portfolio, resume highlights, projects, and contact.',
};

export default function RootLayout({ children }: { children: React.ReactNode }) {
  return (
    <html lang="en">
      <head>
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        {/* Tailwind via CDN for quick scaffold */}
        <script src="https://cdn.tailwindcss.com"></script>
      </head>
      <body className="bg-slate-50 text-slate-900">
        <header className="sticky top-0 z-50 bg-white/80 backdrop-blur border-b border-slate-200">
          <div className="mx-auto max-w-6xl px-4 py-4 flex items-center justify-between">
            <a href="/" className="text-lg font-semibold tracking-tight">
              Troy Shimkus
            </a>
            <nav className="hidden sm:flex items-center gap-6 text-sm">
              <a href="/#about" className="hover:text-slate-700">About</a>
              <a href="/#highlights" className="hover:text-slate-700">Highlights</a>
              <a href="/#projects" className="hover:text-slate-700">Projects</a>
              <a href="/contact" className="hover:text-slate-700">Contact</a>
              <a href="/resume" className="hover:text-slate-700">Resume</a>
              <a
                href="/assets/Troy_Shimkus_Resume.pdf"
                target="_blank"
                className="inline-flex items-center rounded-md bg-slate-900 px-3 py-1.5 text-white hover:bg-slate-800"
              >
                Download Resume
              </a>
            </nav>
          </div>
        </header>
        {children}
        <footer className="border-t border-slate-200 bg-white">
          <div className="mx-auto max-w-6xl px-4 py-10 text-sm text-slate-600 flex flex-wrap items-center justify-between gap-4">
            <span>© {new Date().getFullYear()} Troy Shimkus</span>
            <div className="flex items-center gap-4">
              <a href="/resume" className="hover:text-slate-800">Resume</a>
              <a href="/assets/Troy_Shimkus_Resume.pdf" target="_blank" className="hover:text-slate-800">Download PDF</a>
            </div>
          </div>
        </footer>
      </body>
    </html>
  );
}

