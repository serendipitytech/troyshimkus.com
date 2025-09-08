"use client";

import { useState } from "react";

type Notify = "sms" | "email" | "both";

export default function ContactPage() {
  const [status, setStatus] = useState<
    null | { ok: boolean; message: string; variant: "success" | "error" }
  >(null);
  const [loading, setLoading] = useState(false);

  return (
    <main className="mx-auto max-w-3xl px-4 py-12 sm:py-16">
      {status && (
        <div
          className={
            "mb-6 rounded-lg border p-4 " +
            (status.variant === "success"
              ? "border-emerald-200 bg-emerald-50 text-emerald-900"
              : "border-red-200 bg-red-50 text-red-800")
          }
        >
          <div className="font-semibold">{status.variant === "success" ? "Success" : "Error"}</div>
          <div className="mt-1 text-sm opacity-90">{status.message}</div>
        </div>
      )}

      <section className="rounded-lg border border-slate-200 bg-white p-6">
        <h1 className="text-xl font-bold">Contact</h1>
        <p className="mt-2 text-slate-600">Send a note and I’ll get back soon.</p>

        <form
          className="mt-6 grid gap-4"
          onSubmit={async (e) => {
            e.preventDefault();
            setStatus(null);
            setLoading(true);
            const data = new FormData(e.currentTarget as HTMLFormElement);
            const payload = {
              notify: String(data.get("notify") || "sms") as Notify,
              name: String(data.get("name") || ""),
              email: String(data.get("email") || ""),
              phone: String(data.get("phone") || ""),
              message: String(data.get("message") || ""),
            };
            try {
              const res = await fetch("/api/contact", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(payload),
              });
              const json = await res.json();
              if (!res.ok || !json.ok) throw new Error(json.error || json.errors?.join(", ") || "Send failed");
              setStatus({ ok: true, message: json.preview ? "Preview only (dev): No messages sent." : "Thanks! I’ll get back soon.", variant: "success" });
              (e.currentTarget as HTMLFormElement).reset();
            } catch (err: any) {
              setStatus({ ok: false, message: err?.message || "Something went wrong.", variant: "error" });
            } finally {
              setLoading(false);
            }
          }}
        >
          <div>
            <label htmlFor="notify" className="block text-sm font-medium">
              How should I contact you? <span className="text-slate-500 font-normal">I prefer texting.</span>
            </label>
            <select
              id="notify"
              name="notify"
              className="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500"
              defaultValue="sms"
            >
              <option value="sms">Text</option>
              <option value="email">Email</option>
              <option value="both">Both</option>
            </select>
          </div>
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
              className="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500"
            />
          </div>
          <div>
            <label htmlFor="phone" className="block text-sm font-medium">
              Phone (for text)
            </label>
            <input
              id="phone"
              name="phone"
              type="tel"
              placeholder="(555) 555-5555"
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
              disabled={loading}
              className="inline-flex items-center rounded-md bg-[var(--primary)] px-5 py-2.5 text-[var(--on-primary)] hover:bg-[var(--primary-hover)] shadow disabled:opacity-60"
            >
              {loading ? "Sending…" : "Send"}
            </button>
            <a href="mailto:hello@troyshimkus.com" className="text-sm text-slate-600 hover:text-slate-800">
              Or email directly
            </a>
          </div>
        </form>

        <p className="mt-6 text-xs text-slate-500">
          Dev mode: API returns a preview and does not send. Set environment variables and deploy to enable sending.
        </p>
      </section>
    </main>
  );
}
