export default function ResumePage() {
  return (
    <main className="mx-auto max-w-4xl px-4 py-10 sm:py-14">
      <section>
        <h1 className="text-3xl sm:text-4xl font-extrabold tracking-tight">Resume</h1>
        <p className="mt-2 text-slate-600">Tailored highlights with full experience, skills, and education below.</p>
      </section>

      <section className="mt-10">
        <h2 className="text-xl font-bold">Experience</h2>
        <div className="mt-6 space-y-6">
          <article className="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <div className="flex items-center justify-between">
              <h3 className="font-semibold">Role / Company</h3>
              <span className="text-sm text-slate-600">2022 — Present</span>
            </div>
            <p className="mt-2 text-sm text-slate-700">One‑line impact statement. What changed because of your work.</p>
            <ul className="mt-3 list-disc pl-5 text-sm text-slate-700 space-y-1">
              <li>Led X to achieve Y, resulting in Z metric</li>
              <li>Designed and delivered N feature/service at scale</li>
              <li>Improved reliability/latency/costs by %</li>
            </ul>
          </article>
          <article className="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <div className="flex items-center justify-between">
              <h3 className="font-semibold">Earlier Role / Company</h3>
              <span className="text-sm text-slate-600">2019 — 2022</span>
            </div>
            <ul className="mt-3 list-disc pl-5 text-sm text-slate-700 space-y-1">
              <li>Shipped features with measurable business outcomes</li>
              <li>Mentored engineers and improved team practices</li>
            </ul>
          </article>
        </div>
      </section>

      <section className="mt-10 grid gap-6 sm:grid-cols-2">
        <div>
          <h2 className="text-xl font-bold">Skills</h2>
          <div className="mt-4 rounded-lg border border-slate-200 bg-white p-6 shadow-sm text-sm text-slate-700">
            <p>
              <span className="font-semibold">Languages:</span> TypeScript/JavaScript, PHP, SQL
            </p>
            <p className="mt-2">
              <span className="font-semibold">Frameworks:</span> Next.js/Laravel/Express
            </p>
            <p className="mt-2">
              <span className="font-semibold">Cloud/DevOps:</span> AWS, Docker, CI/CD
            </p>
          </div>
        </div>
        <div>
          <h2 className="text-xl font-bold">Education</h2>
          <div className="mt-4 rounded-lg border border-slate-200 bg-white p-6 shadow-sm text-sm text-slate-700">
            <p>BS, Field of Study — University</p>
            <p className="mt-2 text-slate-600">Certifications or notable coursework if applicable.</p>
          </div>
        </div>
      </section>

      <section className="mt-10">
        <h2 className="text-xl font-bold">Links</h2>
        <div className="mt-4 flex flex-wrap gap-3">
          <a
            href="/assets/Troy_Shimkus_Resume.pdf"
            target="_blank"
            className="inline-flex items-center rounded-md bg-slate-900 px-4 py-2 text-white hover:bg-slate-800"
          >
            Download PDF
          </a>
          <a
            href="/assets/Troy_Shimkus_Resume.docx"
            target="_blank"
            className="inline-flex items-center rounded-md border border-slate-300 bg-white px-4 py-2 hover:bg-slate-50"
          >
            Download Word
          </a>
        </div>
      </section>
    </main>
  );
}

