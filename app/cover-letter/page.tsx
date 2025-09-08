"use client";

import { useMemo, useState } from "react";

function isLocalhost() {
  if (typeof window === "undefined") return false;
  const h = window.location.hostname;
  return h === "localhost" || h === "127.0.0.1";
}

export default function CoverLetterPage() {
  const dev = useMemo(() => isLocalhost(), []);
  const today = useMemo(() => new Date().toLocaleDateString(undefined, { month: "long", day: "numeric", year: "numeric" }), []);
  const [date, setDate] = useState(today);
  const [role, setRole] = useState("");
  const [manager, setManager] = useState("");
  const [org, setOrg] = useState("");
  const [address, setAddress] = useState("");

  const p_date = date || "[Date]";
  const p_role = role || "[Role Title]";
  const p_manager = manager || "[Hiring Manager]";
  const p_org = org || "[Organization Name]";
  const p_address = address || "[Address]";

  return (
    <main className="mx-auto max-w-4xl px-4 py-10 sm:py-14">
      <h1 className="text-3xl sm:text-4xl font-extrabold tracking-tight">Cover Letter</h1>
      {dev ? (
        <>
          <p className="mt-2 text-slate-600">Dev-only: tailor fields and preview the generated letter.</p>
          <form className="mt-6 grid gap-4 bg-white border border-slate-200 rounded-lg p-6 shadow-sm" onSubmit={(e)=>e.preventDefault()}>
            <div className="grid sm:grid-cols-2 gap-4">
              <div>
                <label htmlFor="date" className="block text-sm font-medium">Date</label>
                <input id="date" value={date} onChange={(e)=>setDate(e.target.value)} className="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500" />
              </div>
              <div>
                <label htmlFor="role" className="block text-sm font-medium">Role Title</label>
                <input id="role" value={role} onChange={(e)=>setRole(e.target.value)} placeholder="Public Sector Data Programs Manager" className="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500" />
              </div>
            </div>
            <div className="grid sm:grid-cols-2 gap-4">
              <div>
                <label htmlFor="manager" className="block text-sm font-medium">Hiring Manager’s Name</label>
                <input id="manager" value={manager} onChange={(e)=>setManager(e.target.value)} placeholder="Alex Johnson" className="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500" />
              </div>
              <div>
                <label htmlFor="org" className="block text-sm font-medium">Organization Name</label>
                <input id="org" value={org} onChange={(e)=>setOrg(e.target.value)} placeholder="City of Example" className="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500" />
              </div>
            </div>
            <div>
              <label htmlFor="address" className="block text-sm font-medium">Address</label>
              <textarea id="address" rows={2} value={address} onChange={(e)=>setAddress(e.target.value)} placeholder="123 Main St, Example, ST 00000" className="mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-slate-500 focus:ring-slate-500" />
            </div>
          </form>
        </>
      ) : (
        <p className="mt-2 text-slate-600">General cover letter used for leadership roles in Public Sector Data Programs.</p>
      )}

      <div className="mt-4 flex justify-end print:hidden">
        <button onClick={()=>window.print()} className="inline-flex items-center rounded-md bg-[var(--primary)] px-4 py-2 text-[var(--on-primary)] hover:bg-[var(--primary-hover)] shadow">
          Print as PDF
        </button>
      </div>

      <section id="letter" className="mt-8 bg-white border border-slate-200 rounded-lg p-6 shadow-sm leading-8 text-slate-800">
        <div className="text-sm text-slate-500">Deltona, FL | 407.443.6844 | Contact@TroyShimkus.com</div>
        <div className="mt-2">{dev ? p_date : today}</div>
        {dev ? (
          <div className="mt-6">
            <div>{p_manager}</div>
            <div>{p_org}</div>
            <div className="whitespace-pre-line">{p_address}</div>
          </div>
        ) : null}
        <p className="mt-6">Dear {dev ? p_manager : "Hiring Manager"},</p>
        <p className="mt-4">I am excited to apply for the {dev ? p_role : "Public Sector Data Programs Manager"} position at {dev ? p_org : "your organization"}. With more than 15 years of experience in education technology, public service, and nonprofit leadership, I bring a unique blend of strategic vision and hands‑on technical expertise that equips me to lead teams, deliver impact, and build long‑term stakeholder trust.</p>
        <p className="mt-4">In my current role as Manager of Professional Services at PowerSchool, I lead a team customizing SaaS dashboards for more than 150 school districts serving over 100,000 students. My focus is always on driving adoption and renewals by ensuring technology serves real‑world needs. By standardizing processes, coaching cross‑functional teams, and bridging technical and non‑technical stakeholders, I’ve helped districts maximize their investment in technology while keeping the focus on student outcomes.</p>
        <p className="mt-4">Beyond my work in education technology, I have a deep record of public service and nonprofit leadership. As a City Commissioner for Deltona, I advocated for data‑driven decision making and successfully led the launch of public‑facing dashboards to improve transparency and civic trust. As founder of Deltona Strong, a nonprofit dedicated to community resilience, I built partnerships to launch a community garden, establish an emergency hotline, and raise more than $40,000 in support of local families. These experiences have honed my ability to align diverse stakeholders and move initiatives from vision to reality.</p>
        <p className="mt-4">I am particularly drawn to {dev ? p_org : "your organization"}’s mission in education/public service/nonprofit work, because I have seen first‑hand how access to the right tools and transparent processes can transform communities. My career has consistently been about helping organizations bridge the gap between technical possibilities and human outcomes — whether by designing data systems, guiding city operations, or leading volunteer efforts.</p>
        <p className="mt-4">I would welcome the opportunity to bring this mix of leadership, technical insight, and community commitment to your team.</p>
        <p className="mt-4">Thank you for considering my application. I look forward to the chance to discuss how my background can contribute to your goals.</p>
        <p className="mt-6">Sincerely,</p>
        <p className="mt-2">Troy Shimkus</p>
      </section>

      <div className="hidden print:block mt-6">
        <div className="h-px bg-slate-200"></div>
        <div className="mt-3 text-sm">
          <div className="font-semibold">Troy Shimkus</div>
          <div className="text-slate-600">Public Sector Data Programs</div>
          <div className="mt-1 text-slate-600">Contact@TroyShimkus.com • 407.443.6844 • troyshimkus.com</div>
        </div>
      </div>
      <div className="mt-6 text-sm text-slate-600">Tip: Print to PDF from your browser to generate a tailored PDF.</div>
    </main>
  );
}

