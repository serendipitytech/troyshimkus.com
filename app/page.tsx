import Image from 'next/image'
import { projects } from '../data/projects'
import ProjectsCarousel from './components/ProjectsCarousel'

export default function HomePage() {
  return (
    <main>
      {/* Hero */}
      <section className="relative overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-b from-slate-100 to-transparent" />
        <div className="relative mx-auto max-w-6xl px-4 py-20 sm:py-28">
          <div className="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div className="flex justify-center md:justify-start">
              <Image src="/images/photo7_circle.png" alt="Troy Shimkus portrait" width={320} height={320} className="rounded-full shadow-lg mx-auto md:mx-0 max-w-xs sm:max-w-sm h-auto" priority />
            </div>
            <div>
              <h1 className="text-4xl sm:text-6xl font-extrabold tracking-tight text-slate-900">Public Sector Product & Data Leader</h1>
              <p className="mt-5 text-lg text-slate-600">I lead cross‑functional teams to plan, deliver, and scale mission‑aligned products and data programs—turning policy goals into transparent systems, actionable insights, and measurable outcomes.</p>
              <div className="mt-8 flex flex-wrap gap-3">
                <a href="/resume" className="inline-flex items-center rounded-md bg-[var(--accent)] px-5 py-2.5 text-[var(--on-accent)] hover:bg-[var(--accent-hover)] shadow">View Resume</a>
                <a href="#contact" className="inline-flex items-center rounded-md bg-[var(--primary)] px-5 py-2.5 text-[var(--on-primary)] hover:bg-[var(--primary-hover)] shadow">Get in Touch</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* About */}
      <section id="about" className="mx-auto max-w-6xl px-4 py-16 sm:py-20">
        <div className="grid gap-8 md:grid-cols-2 items-center">
          <div>
            <h2 className="text-2xl font-bold">About</h2>
            <span className="mt-2 block h-1 w-10 bg-[var(--accent)]"></span>
            <p className="mt-4 text-slate-700 leading-relaxed">I’m Troy Shimkus, a team‑first leader focused on Public Sector Data Programs—aligning stakeholders, shaping roadmaps, and coaching teams to deliver useful, human‑centered solutions.</p>
            <p className="mt-3 text-slate-700">Recent work: leading services delivery at PowerSchool (dashboards for 150+ districts), building a membership platform for a civic organization, and serving as City Commissioner to advance transparency and trust.</p>
          </div>
          <div className="flex md:justify-end">
            <Image src="/images/photo9.jpg" alt="Troy Shimkus seated, hands together" width={640} height={480} className="rounded-lg shadow-md w-full max-w-md object-cover object-center h-64 sm:h-80 md:h-96" />
          </div>
        </div>
      </section>

      {/* Resume Highlights */}
      <section id="highlights" className="bg-white border-y border-slate-200">
        <div className="mx-auto max-w-6xl px-4 py-16 sm:py-20">
          <h2 className="text-2xl font-bold">Resume Highlights</h2>
          <span className="mt-2 block h-1 w-10 bg-[var(--primary)]"></span>
          <div className="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <div className="rounded-lg border border-slate-200 border-t-4 border-[var(--accent)] bg-white p-6 shadow-sm">
              <h3 className="font-semibold">Leadership & Product Delivery</h3>
              <ul className="mt-3 list-disc pl-5 text-slate-700 text-sm space-y-1">
                <li>Align stakeholders, shape roadmaps, coach cross‑functional teams</li>
                <li>Plan → execute → scale with standard delivery and clear outcomes</li>
                <li>Bridge technical/non‑technical to ship the right thing</li>
              </ul>
            </div>
            <div className="rounded-lg border border-slate-200 border-t-4 border-[var(--primary)] bg-white p-6 shadow-sm">
              <h3 className="font-semibold">AI Practices & Automation</h3>
              <ul className="mt-3 list-disc pl-5 text-slate-700 text-sm space-y-1">
                <li>LLM‑assisted workflow: design, prompting, codegen, evaluation</li>
                <li>Model use: Whisper, YOLOv8; data prep/labeling for ETL</li>
                <li>Guardrails/privacy mindset; pragmatic, outcome‑driven adoption</li>
              </ul>
            </div>
            <div className="rounded-lg border border-slate-200 border-t-4 border-[var(--accent)] bg-white p-6 shadow-sm">
              <h3 className="font-semibold">Data Programs & Systems</h3>
              <ul className="mt-3 list-disc pl-5 text-slate-700 text-sm space-y-1">
                <li>Dashboards and secure data flows; integrations (APIs, ETL)</li>
                <li>Cloud practices: observability, CI/CD, reliability</li>
                <li>K‑12 and civic data experience; stakeholder‑ready reporting</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      {/* Projects carousel */}
      <section id="projects" className="mx-auto max-w-6xl px-4 py-16 sm:py-20">
        <div className="flex items-end justify-between">
          <div>
            <h2 className="text-2xl font-bold">Projects</h2>
            <span className="mt-2 block h-1 w-10 bg-[var(--accent)]"></span>
          </div>
          <a href="#contact" className="text-sm text-slate-600 hover:text-slate-800">Need something like this? Let’s chat →</a>
        </div>
        <div className="mt-8">
          <ProjectsCarousel projects={projects} />
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
