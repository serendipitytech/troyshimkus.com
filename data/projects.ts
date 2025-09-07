export type Project = {
  slug: string;
  title: string;
  summary: string;
  tags: string[];
};

export const projects: Project[] = [
  {
    slug: 'membership-database',
    title: 'Membership Database & Engagement Platform',
    summary:
      'Comprehensive membership platform: registration, profiles, households, volunteer hours, events, payments, admin tools, and email list sync.',
    tags: ['React/TS', 'Supabase (RLS)', 'APIs', 'Tailwind'],
  },
  {
    slug: 'district-analytics',
    title: 'District Analytics Dashboards',
    summary:
      'Custom dashboards for 150+ K‑12 districts to improve insight and renewals; standardized delivery accelerated onboarding.',
    tags: ['SaaS', 'SQL', 'ETL', 'AWS'],
  },
  {
    slug: 'videotranscribe',
    title: 'VideoTranscribe',
    summary:
      'Automated video/audio transcription and summarization using Whisper; batching, timestamp handling, and PDF/JSON output.',
    tags: ['Python', 'Whisper', 'FFmpeg'],
  },
  {
    slug: 'crowd-counter',
    title: 'Crowd Counter',
    summary:
      'Computer vision tool using YOLOv8 to estimate crowd sizes from photos/videos; annotated outputs and CSV reports.',
    tags: ['Python', 'YOLOv8', 'OpenCV'],
  },
  {
    slug: 'voter-mapping-utility',
    title: 'Voter Mapping Utility',
    summary:
      'Radius-based voter lookup and mapping; Leaflet.js UI with MySQL spatial indexing.',
    tags: ['PHP', 'MySQL Spatial', 'Leaflet'],
  },
  {
    slug: 'embroidery-tools',
    title: 'Embroidery Design Tools',
    summary:
      'Python utilities for PES/DST embroidery patterns, patch borders, and geometric designs.',
    tags: ['Python', 'PES/DST'],
  },
  {
    slug: 'concierge-site',
    title: 'Concierge Site',
    summary:
      'Directus-based headless CMS deployed with Docker for service-oriented content management.',
    tags: ['Directus', 'Docker', 'CMS'],
  },
  {
    slug: 'email-management',
    title: 'Email Management',
    summary:
      'Automation and list management; campaign tooling and ESP integrations.',
    tags: ['Automation', 'ESP', 'Data'],
  },
];

