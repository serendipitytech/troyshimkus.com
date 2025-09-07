export default function HomePage() {
  return (
    <main>
      {/* Hero */}
      <section className="relative overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-b from-slate-100 to-transparent" />
        <div className="relative mx-auto max-w-6xl px-4 py-24 sm:py-28">
          <div className="max-w-3xl">
            <h1 className="text-4xl sm:text-6xl font-extrabold tracking-tight text-slate-900">
              Builder, Operator, Product‑minded Engineer
            </h1>
            <p className="mt-5 text-lg text-slate-600">
              I design and deliver reliable systems and delightful experiences. I thrive at the
              intersection of engineering, product, and business outcomes.
            </p>
            <div className="mt-8 flex flex-wrap gap-3">
              <a
                href="/resume"
                className="inline-flex items-center rounded-md bg-slate-900 px-5 py-2.5 text-white hover:bg-slate-800"
              >
                View Resume
              </a>
              <a
                href="#contact"
                className="inline-flex items-center rounded-md border border-slate-300 bg-white px-5 py-2.5 hover:bg-slate-50"
              >
                Get in Touch
              </a>
              <a
                href="/assets/Troy_Shimkus_Resume.pdf"
                target="_blank"
                className="inline-flex items-center rounded-md border border-slate-300 bg-white px-5 py-2.5 hover:bg-slate-50"
              >
                Download PDF
              </a>
            </div>
          </div>
        </div>
      </section>

      {/* About */}
      <section id="about" className="mx-auto max-w-6xl px-4 py-16 sm:py-20">
        <div className="grid gap-10 sm:grid-cols-3">
          <div>
            <h2 className="text-2xl font-bold">About</h2>
          </div>
          <div className="sm:col-span-2 text-slate-700 leading-relaxed">
            <p>
              I’m Troy Shimkus, a technology leader and hands‑on engineer focused on shipping high‑impact
              products. I enjoy building teams, simplifying systems, and turning ideas into scalable
              solutions.
            </p>
            <p className="mt-4">
              Domains include web platforms, data products, and cloud infrastructure. I value clarity,
              momentum, and measurable outcomes.
            </p>
          </div>
        </div>
      </section>

      {/* Resume Highlights */}
      <section id="highlights" className="bg-white border-y border-slate-200">
        <div className="mx-auto max-w-6xl px-4 py-16 sm:py-20">
          <h2 className="text-2xl font-bold">Resume Highlights</h2>
          <div className="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div className="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
              <h3 className="font-semibold">Leadership & Delivery</h3>
              <ul className="mt-3 list-disc pl-5 text-slate-700 text-sm space-y-1">
                <li>Led multi‑disciplinary teams from concept to scale</li>
                <li>Shipped features driving revenue and retention</li>
              </ul>
            </div>
            <div className="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
              <h3 className="font-semibold">Systems & Reliability</h3>
              <ul className="mt-3 list-disc pl-5 text-slate-700 text-sm space-y-1">
                <li>Designed resilient, observable, cost‑aware services</li>
                <li>Hands‑on with AWS, Docker, CI/CD</li>
              </ul>
            </div>
            <div className="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
              <h3 className="font-semibold">Product Mindset</h3>
              <ul className="mt-3 list-disc pl-5 text-slate-700 text-sm space-y-1">
                <li>Data‑informed prioritization and rapid iteration</li>
                <li>Customer‑centric UX and content strategy</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      {/* Projects */}
      <section id="projects" className="mx-auto max-w-6xl px-4 py-16 sm:py-20">
        <div className="flex items-end justify-between">
          <h2 className="text-2xl font-bold">Projects</h2>
          <a href="#contact" className="text-sm text-slate-600 hover:text-slate-800">
            Need something like this? Let’s chat →
          </a>
        </div>
        <div className="mt-8 grid gap-6 sm:grid-cols-2">
          <article className="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <h3 className="font-semibold">Project One</h3>
            <p className="mt-2 text-sm text-slate-700">
              Brief description of a notable project, the problem it solved, and the impact achieved.
            </p>
            <div className="mt-4 text-sm text-slate-600">Stack: Next.js, Tailwind, Vercel</div>
          </article>
          <article className="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <h3 className="font-semibold">Project Two</h3>
            <p className="mt-2 text-sm text-slate-700">A second example showcasing architecture decisions, velocity, or results.</p>
            <div className="mt-4 text-sm text-slate-600">Stack: Node, React, Postgres</div>
          </article>
        </div>
      </section>

      {/* Contact */}
      <section id="contact" className="bg-white border-t border-slate-200">
        <div className="mx-auto max-w-6xl px-4 py-16 sm:py-20">
          <h2 className="text-2xl font-bold">Contact</h2>
          <p className="mt-3 text-slate-600">Send a note and I’ll get back soon.</p>
          <form action="/contact" method="post" className="mt-8 grid gap-4 max-w-xl">
            <div>
              <label htmlFor="name" className="block text-sm font-medium">
                Name
              </label>
              <input
                id="name"
                name="name"
                type="text"
                required
                className="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500"
              />
            </div>
            <div>
              <label htmlFor="email" className="block text-sm font-medium">
                Email
              </label>
              <input
                id="email"
                name="email"
                type="email"
                required
                className="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500"
              />
            </div>
            <div>
              <label htmlFor="message" className="block text-sm font-medium">
                Message
              </label>
              <textarea
                id="message"
                name="message"
                rows={5}
                required
                className="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500"
              />
            </div>
            <div className="flex items-center gap-3">
              <button
                type="submit"
                className="inline-flex items-center rounded-md bg-slate-900 px-5 py-2.5 text-white hover:bg-slate-800"
              >
                Send
              </button>
              <a href="mailto:hello@troyshimkus.com" className="text-sm text-slate-600 hover:text-slate-800">
                Or email directly
              </a>
            </div>
          </form>
        </div>
      </section>
    </main>
  );
}

