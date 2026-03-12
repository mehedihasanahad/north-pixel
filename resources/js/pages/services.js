import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

/* ─── Hero entrance ─────────────────────────────────────────── */
function initServiceHero() {
    const badge = document.querySelector('.hero-badge');
    const words = document.querySelectorAll('.hero-word');
    const sub   = document.querySelector('.hero-sub');
    const ctas  = document.querySelectorAll('.hero-cta');
    const visual = document.querySelector('.hero-visual');

    const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

    if (badge)  tl.from(badge,  { opacity: 0, y: -20, duration: 0.5 }, 0);
    if (words.length) tl.from(words, { opacity: 0, y: 40, stagger: 0.12, duration: 0.7 }, 0.2);
    if (sub)    tl.from(sub,    { opacity: 0, y: 20, duration: 0.6 }, 0.5);
    if (ctas.length) tl.from(ctas, { opacity: 0, y: 20, stagger: 0.1, duration: 0.5 }, 0.7);
    if (visual) tl.from(visual, { opacity: 0, x: 40, duration: 0.8 }, 0.3);
}

/* ─── Scroll reveal (process steps, feature cards) ─────────── */
function initScrollReveal() {
    gsap.utils.toArray('.reveal-up').forEach((el, i) => {
        gsap.from(el, {
            scrollTrigger: { trigger: el, start: 'top 88%', toggleActions: 'play none none none' },
            opacity: 0,
            y: 50,
            duration: 0.7,
            ease: 'power3.out',
            delay: (i % 4) * 0.08,
        });
    });

    gsap.utils.toArray('.reveal-stagger').forEach(container => {
        const children = container.children;
        gsap.from(children, {
            scrollTrigger: { trigger: container, start: 'top 85%', toggleActions: 'play none none none' },
            opacity: 0,
            y: 40,
            scale: 0.97,
            stagger: 0.1,
            duration: 0.65,
            ease: 'power3.out',
        });
    });

    /* process connecting line fill */
    gsap.utils.toArray('.process-line').forEach(line => {
        gsap.fromTo(line,
            { scaleX: 0 },
            {
                scaleX: 1,
                transformOrigin: 'left center',
                duration: 0.8,
                ease: 'power2.inOut',
                scrollTrigger: { trigger: line, start: 'top 85%', toggleActions: 'play none none none' },
            }
        );
    });
}

/* ─── Stat / count-up ───────────────────────────────────────── */
function initStatCounters() {
    document.querySelectorAll('[data-count]').forEach(el => {
        const target = parseFloat(el.dataset.count);
        const suffix = el.dataset.suffix || '';
        const decimals = String(target).includes('.') ? 1 : 0;

        ScrollTrigger.create({
            trigger: el,
            start: 'top 88%',
            once: true,
            onEnter: () => {
                gsap.to({ val: 0 }, {
                    val: target,
                    duration: 1.8,
                    ease: 'power2.out',
                    onUpdate() {
                        el.textContent = this.targets()[0].val.toFixed(decimals) + suffix;
                    },
                });
            },
        });
    });
}

/* ─── Tilt cards ────────────────────────────────────────────── */
function initTilt() {
    if (window.matchMedia('(hover: hover)').matches) {
        document.querySelectorAll('.tilt-card').forEach(card => {
            card.addEventListener('mousemove', e => {
                const r = card.getBoundingClientRect();
                const x = ((e.clientX - r.left) / r.width  - 0.5) * 14;
                const y = ((e.clientY - r.top)  / r.height - 0.5) * -14;
                gsap.to(card, { rotateX: y, rotateY: x, duration: 0.3, ease: 'power2.out', transformPerspective: 800 });
            });
            card.addEventListener('mouseleave', () => {
                gsap.to(card, { rotateX: 0, rotateY: 0, duration: 0.5, ease: 'power2.out' });
            });
        });
    }
}

/* ─── Magnetic buttons ──────────────────────────────────────── */
function initMagnetic() {
    if (!window.matchMedia('(hover: hover)').matches) return;
    document.querySelectorAll('.magnetic').forEach(btn => {
        btn.addEventListener('mousemove', e => {
            const r = btn.getBoundingClientRect();
            const x = (e.clientX - r.left - r.width  / 2) * 0.35;
            const y = (e.clientY - r.top  - r.height / 2) * 0.35;
            gsap.to(btn, { x, y, duration: 0.3, ease: 'power2.out' });
        });
        btn.addEventListener('mouseleave', () => {
            gsap.to(btn, { x: 0, y: 0, duration: 0.5, ease: 'elastic.out(1, 0.5)' });
        });
    });
}

/* ─── Parallax orbs ─────────────────────────────────────────── */
function initParallaxOrbs() {
    document.querySelectorAll('[data-parallax]').forEach(el => {
        const speed = parseFloat(el.dataset.parallax) || 0.15;
        gsap.to(el, {
            y: () => -ScrollTrigger.maxScroll(window) * speed,
            ease: 'none',
            scrollTrigger: { trigger: document.body, start: 'top top', end: 'bottom bottom', scrub: true },
        });
    });
}

/* ─── Particle canvas (hero section) ───────────────────────── */
function initParticles() {
    const canvas = document.getElementById('hero-particles');
    if (!canvas) return;

    const ctx = canvas.getContext('2d');
    let W, H, pts;

    function resize() {
        W = canvas.width  = canvas.offsetWidth;
        H = canvas.height = canvas.offsetHeight;
    }

    function makePoints() {
        pts = Array.from({ length: 60 }, () => ({
            x: Math.random() * W,
            y: Math.random() * H,
            r: Math.random() * 1.5 + 0.3,
            vx: (Math.random() - 0.5) * 0.3,
            vy: (Math.random() - 0.5) * 0.3,
            a: Math.random(),
        }));
    }

    function draw() {
        ctx.clearRect(0, 0, W, H);
        pts.forEach(p => {
            p.x += p.vx; p.y += p.vy;
            if (p.x < 0) p.x = W; if (p.x > W) p.x = 0;
            if (p.y < 0) p.y = H; if (p.y > H) p.y = 0;
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = `rgba(168,85,247,${p.a * 0.6})`;
            ctx.fill();
        });

        /* connect nearby */
        for (let i = 0; i < pts.length; i++) {
            for (let j = i + 1; j < pts.length; j++) {
                const dx = pts[i].x - pts[j].x;
                const dy = pts[i].y - pts[j].y;
                const dist = Math.hypot(dx, dy);
                if (dist < 90) {
                    ctx.beginPath();
                    ctx.moveTo(pts[i].x, pts[i].y);
                    ctx.lineTo(pts[j].x, pts[j].y);
                    ctx.strokeStyle = `rgba(124,58,237,${(1 - dist / 90) * 0.25})`;
                    ctx.lineWidth = 0.5;
                    ctx.stroke();
                }
            }
        }
        requestAnimationFrame(draw);
    }

    resize();
    makePoints();
    draw();
    window.addEventListener('resize', () => { resize(); makePoints(); });
}

/* ─── Speed Optimization page — SVG dial + metric bars ─────── */
function initSpeedDial() {
    const ring = document.getElementById('speed-dial-ring');
    if (!ring) return;

    const circumference = parseFloat(ring.getAttribute('stroke-dasharray') || '339');
    const targetScore   = parseInt(document.getElementById('speed-score')?.dataset.target || '94');

    /* start at "bad" (low score = high offset) */
    gsap.set(ring, { strokeDashoffset: circumference });

    ScrollTrigger.create({
        trigger: ring,
        start: 'top 80%',
        once: true,
        onEnter: () => {
            /* animate dash offset: full → portion representing score */
            const finalOffset = circumference - (circumference * targetScore / 100);
            gsap.to(ring, {
                strokeDashoffset: finalOffset,
                duration: 2,
                ease: 'power2.inOut',
            });

            /* counter */
            const scoreEl = document.getElementById('speed-score');
            if (scoreEl) {
                gsap.to({ val: 32 }, {
                    val: targetScore,
                    duration: 2,
                    ease: 'power2.inOut',
                    onUpdate() {
                        scoreEl.textContent = Math.round(this.targets()[0].val);
                    },
                });
            }
        },
    });

    /* metric bars */
    document.querySelectorAll('.metric-bar').forEach(bar => {
        const target = bar.dataset.width || '80%';
        gsap.fromTo(bar,
            { width: '0%' },
            {
                width: target,
                duration: 1.2,
                ease: 'power2.out',
                scrollTrigger: { trigger: bar, start: 'top 88%', once: true },
            }
        );
    });
}

/* ─── Mobile App page — phone frame entrance ────────────────── */
function initPhoneFrames() {
    const p1 = document.getElementById('phone-frame-1');
    const p2 = document.getElementById('phone-frame-2');
    if (!p1 && !p2) return;

    const tl = gsap.timeline({
        scrollTrigger: { trigger: p1 || p2, start: 'top 80%', once: true },
        defaults: { ease: 'back.out(1.4)', duration: 0.9 },
    });
    if (p1) tl.from(p1, { opacity: 0, y: 60, rotate: -4 }, 0);
    if (p2) tl.from(p2, { opacity: 0, y: 60, rotate:  4 }, 0.15);

    /* floating bob */
    [p1, p2].filter(Boolean).forEach((el, i) => {
        gsap.to(el, {
            y: -10,
            duration: 2.5 + i * 0.5,
            yoyo: true,
            repeat: -1,
            ease: 'sine.inOut',
            delay: i * 0.4,
        });
    });
}

/* ─── Maintenance page — shield pulse ───────────────────────── */
function initShieldPulse() {
    const shield = document.getElementById('shield-icon');
    if (!shield) return;

    gsap.from(shield, {
        scale: 0,
        opacity: 0,
        duration: 0.8,
        ease: 'back.out(1.6)',
        scrollTrigger: { trigger: shield, start: 'top 80%', once: true },
    });

    gsap.to(shield, {
        y: -8,
        duration: 2.8,
        yoyo: true,
        repeat: -1,
        ease: 'sine.inOut',
    });
}

/* ─── Ready-Made page — mini product card floats ────────────── */
function initReadyMiniCards() {
    const cards = document.querySelectorAll('.service-mini-card');
    if (!cards.length) return;

    cards.forEach((card, i) => {
        gsap.from(card, {
            opacity: 0,
            y: 30,
            duration: 0.6,
            delay: i * 0.12,
            ease: 'power3.out',
            scrollTrigger: { trigger: card, start: 'top 88%', once: true },
        });
        /* continuous bob */
        gsap.to(card, {
            y: -6,
            duration: 2 + i * 0.3,
            yoyo: true,
            repeat: -1,
            ease: 'sine.inOut',
            delay: i * 0.2,
        });
    });
}

/* ─── Boot ──────────────────────────────────────────────────── */
document.addEventListener('DOMContentLoaded', () => {
    initServiceHero();
    initScrollReveal();
    initStatCounters();
    initTilt();
    initMagnetic();
    initParallaxOrbs();
    initParticles();

    /* page-specific — safe (guards internally) */
    initSpeedDial();
    initPhoneFrames();
    initShieldPulse();
    initReadyMiniCards();
});
