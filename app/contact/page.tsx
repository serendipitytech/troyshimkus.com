'use client';

import { useState } from 'react';

export default function ContactPage() {
  const [submitted, setSubmitted] = useState<null | { name: string; email: string; message: string }>(null);

  return (
    <main className="mx-auto max-w-3xl px-4 py-12 sm:py-16">
      {!submitted ? (
        <section className="rounded-lg border border-slate-200 bg-white p-6">
          <h1 className="text-xl font-bold">Contact</h1>
          <p className="mt-2 text-slate-600">Send a note and I’ll get back soon.</p>
          <form
            className="mt-6 grid gap-4"
            onSubmit={(e) => {
              e.preventDefault();
              const data = new FormData(e.currentTarget as HTMLFormElement);
              setSubmitted({
                name: String(data.get('name') || ''),
                email: String(data.get('email') || ''),
                message: String(data.get('message') || ''),
              });
            }}
          >
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
              <button type="submit" className="inline-flex items-center rounded-md bg-slate-900 px-5 py-2.5 text-white hover:bg-slate-800">
                Send
              </button>
              <a href="mailto:hello@troyshimkus.com" className="text-sm text-slate-600 hover:text-slate-800">
                Or email directly
              </a>
            </div>
          </form>
          <p className="mt-6 text-xs text-slate-500">
            Note: This placeholder does not send emails. Hook up an API route and a mail service (e.g., SES, Mailgun) before going live.
          </p>
        </section>
      ) : (
        <section className="rounded-lg border border-emerald-200 bg-emerald-50 p-6">
          <h1 className="text-xl font-bold text-emerald-900">Thanks for reaching out!</h1>
          <p className="mt-2 text-emerald-900/80">Your (unsent) message preview is below:</p>
          <div className="mt-4 grid gap-2 text-sm">
            <div>
              <span className="font-medium">Name:</span> {submitted.name}
            </div>
            <div>
              <span className="font-medium">Email:</span> {submitted.email}
            </div>
            <div>
              <span className="font-medium">Message:</span>
              <pre className="mt-1 whitespace-pre-wrap break-words rounded-md bg-white p-3 border border-emerald-200">
                {submitted.message}
              </pre>
            </div>
          </div>
          <div className="mt-6 flex items-center gap-3">
            <a href="/" className="inline-flex items-center rounded-md bg-slate-900 px-4 py-2 text-white hover:bg-slate-800">
              Back to Home
            </a>
            <a href="mailto:hello@troyshimkus.com" className="text-sm text-emerald-900/80 hover:text-emerald-900">
              Email me directly
            </a>
          </div>
        </section>
      )}
    </main>
  );
}

