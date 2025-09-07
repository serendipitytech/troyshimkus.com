import { projects } from '../../data/projects'

export default function ProjectsPage() {
  return (
    <main className="mx-auto max-w-6xl px-4 py-12 sm:py-16">
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

      <section className="mt-10 grid gap-6 sm:grid-cols-2">
        {projects.map((p) => (
          <article key={p.slug} id={p.slug} className="rounded-lg border border-slate-200 border-t-4 border-[var(--accent)] bg-white p-6 shadow-sm transition hover:shadow-md hover:-translate-y-0.5">
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
          </article>
        ))}
      </section>
    </main>
  )
}

