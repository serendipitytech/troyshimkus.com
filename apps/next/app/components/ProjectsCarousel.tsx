'use client'

import { useEffect, useRef, useState } from 'react'
import type { Project } from '../../data/projects'

export default function ProjectsCarousel({ projects }: { projects: Project[] }) {
  const rootRef = useRef<HTMLDivElement>(null)
  const trackRef = useRef<HTMLDivElement>(null)
  const [idx, setIdx] = useState(0)
  const [visible, setVisible] = useState(1)
  const [positions, setPositions] = useState(1)
  const timerRef = useRef<NodeJS.Timeout | null>(null)
  const startX = useRef(0)
  const curX = useRef(0)
  const dragging = useRef(false)

  const computeVisible = () => {
    const w = typeof window !== 'undefined' ? window.innerWidth : 0
    if (w >= 1024) return 3
    if (w >= 640) return 2
    return 1
  }

  const layout = () => {
    const root = rootRef.current
    if (!root) return
    const vis = computeVisible()
    setVisible(vis)
    const pos = Math.max(1, projects.length - vis + 1)
    setPositions(pos)
    const cardW = root.clientWidth / vis
    const slides = root.querySelectorAll('[data-slide]') as NodeListOf<HTMLElement>
    slides.forEach((sl) => {
      sl.style.minWidth = cardW + 'px'
      sl.style.maxWidth = cardW + 'px'
    })
    if (idx >= pos) setIdx(0)
    update(cardW)
  }

  const update = (cardWParam?: number) => {
    const root = rootRef.current
    const track = trackRef.current
    if (!root || !track) return
    const cardW = cardWParam ?? root.clientWidth / visible
    track.style.transform = `translateX(${-idx * cardW}px)`
    const dots = root.querySelectorAll('[data-dot]') as NodeListOf<HTMLElement>
    dots.forEach((d, i) => (d.style.background = i === idx ? 'var(--accent)' : '#cbd5e1'))
  }

  const next = () => setIdx((i) => (i + 1) % positions)
  const play = () => {
    stop()
    timerRef.current = setInterval(next, 5000)
  }
  const stop = () => {
    if (timerRef.current) clearInterval(timerRef.current)
    timerRef.current = null
  }

  useEffect(() => {
    layout()
    play()
    const onResize = () => layout()
    window.addEventListener('resize', onResize)
    const root = rootRef.current
    if (root) {
      root.addEventListener('mouseenter', stop)
      root.addEventListener('mouseleave', play)
      const track = trackRef.current
      if (track) {
        track.addEventListener('touchstart', (e: TouchEvent) => {
          if (!e.touches?.length) return
          stop()
          dragging.current = true
          startX.current = e.touches[0].clientX
          curX.current = startX.current
        }, { passive: true })
        track.addEventListener('touchmove', (e: TouchEvent) => {
          if (!dragging.current || !e.touches?.length) return
          curX.current = e.touches[0].clientX
        }, { passive: true })
        track.addEventListener('touchend', () => {
          if (!dragging.current) return
          const delta = curX.current - startX.current
          const th = 40
          if (Math.abs(delta) > th) {
            setIdx((i) => {
              const ni = delta < 0 ? Math.min(i + 1, positions - 1) : Math.max(i - 1, 0)
              return ni
            })
          }
          dragging.current = false
          play()
        })
      }
    }
    return () => {
      window.removeEventListener('resize', onResize)
      stop()
    }
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [])

  useEffect(() => {
    update()
    // eslint-disable-next-line react-hooks/exhaustive-deps
  }, [idx, visible])

  return (
    <div ref={rootRef} className="relative overflow-hidden">
      <div ref={trackRef} className="flex transition-transform duration-500 ease-out" data-track>
        {projects.map((p) => (
          <div className="px-1" data-slide key={p.slug}>
            <article className="rounded-lg border border-slate-200 border-t-4 border-[var(--accent)] bg-white p-6 shadow-sm h-full">
              <h3 className="font-semibold">{p.title}</h3>
              <p className="mt-2 text-sm text-slate-700">{p.summary}</p>
              {p.tags?.length ? (
                <div className="mt-4 flex flex-wrap gap-2">
                  {p.tags.map((t) => (
                    <span key={t} className="text-xs bg-slate-100 text-slate-700 rounded-full px-2 py-1 ring-1 ring-inset ring-slate-200">
                      {t}
                    </span>
                  ))}
                </div>
              ) : null}
              <div className="mt-4">
                <a href="/projects" className="text-sm text-slate-600 hover:text-slate-800">Read more →</a>
              </div>
            </article>
          </div>
        ))}
      </div>
      <div className="mt-4 flex justify-center gap-2" data-dots>
        {projects.map((_, i) => (
          <button
            key={i}
            className="h-2 w-2 rounded-full bg-slate-300"
            aria-label={`Go to slide ${i + 1}`}
            onClick={() => i < positions && setIdx(i)}
          />
        ))}
      </div>
    </div>
  )
}

