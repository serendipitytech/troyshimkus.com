import { projects } from '../../data/projects'
import { projectDetails } from '../../data/projectDetails'
import fs from 'fs'
import path from 'path'

function mdToHtml(md: string) {
  const escape = (s: string) => s.replace(/[&<>]/g, (c) => ({ '&': '&amp;', '<': '&lt;', '>': '&gt;' }[c] as string));
  let html = escape(md);
  html = html.replace(/^### (.+)$/gm, '<h4 class="font-semibold text-slate-900">$1</h4>');
  html = html.replace(/^## (.+)$/gm, '<h3 class="font-semibold text-slate-900">$1</h3>');
  html = html.replace(/^# (.+)$/gm, '<h2 class="font-bold text-slate-900">$1</h2>');
  html = html.replace(/^- (.+)$/gm, '<li class="pl-1">$1');
  const lines = html.split('\n');
  let out = '';
  let inList = false;
  for (const ln of lines) {
    if (/^<h[2-4]/.test(ln)) {
      if (inList) { out += '</ul>'; inList = false; }
      out += ln;
    } else if (/^<li /.test(ln)) {
      if (!inList) { out += '<ul class="mt-3 list-disc pl-5 text-slate-700 text-sm space-y-1">'; inList = true; }
      out += ln + '</li>';
    } else if (ln.trim() === '') {
      if (inList) { out += '</ul>'; inList = false; }
      out += '<div class="h-2"></div>';
    } else {
      if (inList) { out += '</ul>'; inList = false; }
      out += '<p class="text-slate-700 text-sm">' + ln + '</p>';
    }
  }
  if (inList) out += '</ul>';
  return out;
}

export default function ProjectsPage() {
  return (
    <main className="mx-auto max-w-6xl px-4 py-12 sm:py-16">
      <style>{`details[open] .chev{transform:rotate(180deg);}`}</style>
      <h1 className="text-3xl sm:text-4xl font-extrabold tracking-tight">Projects</h1>
      <p className="mt-2 text-slate-600">
        I lead cross‑functional teams through planning, alignment, and delivery — focusing on clarity, useful outcomes, and
        sustainable practices. Below are representative initiatives; I’m happy to dive deeper on any of them.
      </p>

      <section className="mt-8 rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <h2 className="text-xl font-bold">AI In The Work</h2>
        <p className="mt-2 text-slate-700">Pragmatic use of AI to accelerate outcomes while maintaining quality and privacy.</p>
        <ul className="mt-3 list-disc pl-5 text-slate-700 text-sm space-y-1">
          <li>Speech → text: Whisper for meetings/interviews with structured outputs (PDF/JSON) and optional summaries.</li>
          <li>Computer vision: YOLOv8 for crowd estimation with annotated evidence and CSV stats.</li>
          <li>LLM‑assisted workflows: design exploration, code generation, and review with human‑in‑the‑loop guardrails.</li>
        </ul>
      </section>

      <section id="projects-grid" className="mt-10 grid gap-6 sm:grid-cols-2">
        {projects.map((p, idx) => {
          // Look for optional markdown in public/assets/projects/<slug>.md
          const mdPath = path.join(process.cwd(), 'public', 'assets', 'projects', `${p.slug}.md`);
          let mdHtml: string | null = null;
          if (fs.existsSync(mdPath)) {
            try { mdHtml = mdToHtml(fs.readFileSync(mdPath, 'utf8')); } catch {}
          }
          const pair = Math.floor(idx/2);
          return (
          <article
            key={p.slug}
            id={p.slug}
            data-pair={pair}
            className={
              'rounded-lg border bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5 ' +
              (idx % 2 === 0 ? 'border-[var(--primary)]' : 'border-[var(--accent)]')
            }
          >
            <h2 className="text-xl font-semibold">{p.title}</h2>
            <p className="mt-2 text-slate-700">{p.summary}</p>
            {p.tags?.length ? (
              <div className="mt-4 flex flex-wrap gap-2">
                {p.tags.map((t) => (
                  <span key={t} className="text-xs bg-slate-100 text-slate-700 rounded-full px-2 py-1 ring-1 ring-inset ring-slate-200">
                    {t}
                  </span>
                ))}
              </div>
            ) : null}
            {mdHtml ? (
              <details className="mt-4 proj-details">
                <summary className="cursor-pointer font-semibold text-slate-900 select-none flex items-center gap-1">
                  <svg className="chev h-4 w-4 text-slate-600 transition-transform" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fillRule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.085l3.71-3.855a.75.75 0 111.08 1.04l-4.24 4.4a.75.75 0 01-1.08 0l-4.24-4.4a.75.75 0 01.02-1.06z" clipRule="evenodd"/></svg>
                  Details
                </summary>
                <div className="mt-3 border-t border-slate-200 pt-4">
                  <div className="mt-3 prose prose-slate max-w-none" dangerouslySetInnerHTML={{ __html: mdHtml }} />
                </div>
              </details>
            ) : projectDetails[p.slug]?.length ? (
              <details className="mt-4 proj-details">
                <summary className="cursor-pointer font-semibold text-slate-900 select-none flex items-center gap-1">
                  <svg className="chev h-4 w-4 text-slate-600 transition-transform" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fillRule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.085l3.71-3.855a.75.75 0 111.08 1.04l-4.24 4.4a.75.75 0 01-1.08 0l-4.24-4.4a.75.75 0 01.02-1.06z" clipRule="evenodd"/></svg>
                  Details
                </summary>
                <div className="mt-3 border-t border-slate-200 pt-4">
                  <ul className="mt-3 list-disc pl-5 text-slate-700 text-sm space-y-1">
                    {projectDetails[p.slug].map((d) => (
                      <li key={d}>{d}</li>
                    ))}
                  </ul>
                </div>
              </details>
            ) : null}
          </article>
        );})}
      </section>
      <script dangerouslySetInnerHTML={{__html:`
        (function(){
          var grid = document.getElementById('projects-grid');
          if(!grid) return;
          var details = grid.querySelectorAll('article .proj-details');
          details.forEach(function(det){
            det.addEventListener('toggle', function(){
              var art = det.closest('article');
              if(!art) return;
              var pair = art.getAttribute('data-pair');
              if(!pair) return;
              var open = det.open;
              grid.querySelectorAll('article[data-pair="'+pair+'"] .proj-details').forEach(function(d){ if(d !== det) d.open = open; });
            });
          });
        })();
      `}} />
    </main>
  )
}
