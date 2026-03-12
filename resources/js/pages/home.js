import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// ─────────────────────────────────────────────────────────────
// PARTICLES
// ─────────────────────────────────────────────────────────────
function initParticles() {
    const canvas = document.getElementById('particle-canvas');
    if (!canvas) return;

    const ctx    = canvas.getContext('2d');
    const COLORS = ['rgba(124,58,237,', 'rgba(168,85,247,', 'rgba(245,158,11,'];
    let W, H, particles;

    function resize() {
        W = canvas.width  = canvas.offsetWidth;
        H = canvas.height = canvas.offsetHeight;
    }

    function makeParticle() {
        const c = COLORS[Math.floor(Math.random() * COLORS.length)];
        return {
            x: Math.random() * W, y: Math.random() * H,
            r: Math.random() * 1.6 + 0.3,
            vx: (Math.random() - 0.5) * 0.35,
            vy: (Math.random() - 0.5) * 0.35,
            color: c, alpha: Math.random() * 0.45 + 0.1,
        };
    }

    function draw() {
        ctx.clearRect(0, 0, W, H);
        for (let i = 0; i < particles.length; i++) {
            for (let j = i + 1; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const d  = Math.sqrt(dx * dx + dy * dy);
                if (d < 110) {
                    ctx.beginPath();
                    ctx.strokeStyle = `rgba(124,58,237,${0.07 * (1 - d / 110)})`;
                    ctx.lineWidth   = 0.5;
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                }
            }
        }
        particles.forEach(p => {
            p.x += p.vx; p.y += p.vy;
            if (p.x < 0) p.x = W; if (p.x > W) p.x = 0;
            if (p.y < 0) p.y = H; if (p.y > H) p.y = 0;
            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = p.color + p.alpha + ')';
            ctx.fill();
        });
        requestAnimationFrame(draw);
    }

    resize();
    particles = Array.from({ length: 80 }, makeParticle);
    draw();
    window.addEventListener('resize', resize);
}

// ─────────────────────────────────────────────────────────────
// HERO — set hidden state in JS, animate to visible
// ─────────────────────────────────────────────────────────────
function initHero() {
    // 1. Set initial hidden state for every animated element
    gsap.set([
        '#hero-badge',
        '.hero-word',
        '#hero-sub',
        '#hero-ctas',
        '#hero-trust',
        '#hero-visual',
        '#hero-badge-live',
        '#hero-badge-clients',
        '#hero-scroll',
    ], { opacity: 0, y: 24 });

    gsap.set('#hero-visual', { y: 40 });
    gsap.set(['#hero-badge-live', '#hero-badge-clients'], { scale: 0.8, y: 0 });

    // 2. Build timeline — all `to` (animate TO visible)
    const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

    tl.to('#hero-badge', { opacity: 1, y: 0, duration: 0.55 }, 0.1)

      .to('.hero-word', {
          opacity: 1, y: 0,
          duration: 0.65, stagger: 0.07,
      }, 0.35)

      .to('#hero-sub',   { opacity: 1, y: 0, duration: 0.55 }, '-=0.25')
      .to('#hero-ctas',  { opacity: 1, y: 0, duration: 0.55 }, '-=0.35')
      .to('#hero-trust', { opacity: 1, y: 0, duration: 0.45 }, '-=0.3')

      // Visual slides in from right on desktop, from below on mobile
      .to('#hero-visual', {
          opacity: 1, y: 0, duration: 0.75, ease: 'power2.out',
      }, 0.5)

      .to('#hero-badge-live', {
          opacity: 1, scale: 1, duration: 0.45, ease: 'back.out(2)',
      }, 1.0)
      .to('#hero-badge-clients', {
          opacity: 1, scale: 1, duration: 0.45, ease: 'back.out(2)',
      }, 1.15)

      .to('#hero-scroll', { opacity: 1, y: 0, duration: 0.4 }, 1.3);

    // 3. Gentle bob on floating badges (after entry)
    tl.add(() => {
        gsap.to('#hero-badge-live',    { y: -8, repeat: -1, yoyo: true, duration: 2.8, ease: 'sine.inOut' });
        gsap.to('#hero-badge-clients', { y:  6, repeat: -1, yoyo: true, duration: 3.2, ease: 'sine.inOut', delay: 0.8 });
        // Subtle pulse on the browser window
        gsap.to('#hero-browser', { y: -6, repeat: -1, yoyo: true, duration: 4.0, ease: 'sine.inOut', delay: 0.4 });
    });
}

// ─────────────────────────────────────────────────────────────
// TYPEWRITER — starts after headline words are visible
// ─────────────────────────────────────────────────────────────
function initTypewriter() {
    const el     = document.getElementById('hero-typewriter');
    const cursor = document.querySelector('.typewriter-cursor');
    if (!el) return;

    const text = el.dataset.text || '';

    // Delay enough for word stagger to finish (words * 70ms + ~500ms buffer)
    const delay = Math.max(1400, document.querySelectorAll('.hero-word').length * 70 + 500);

    setTimeout(() => {
        // Make the element visible
        el.style.opacity = '1';
        if (cursor) cursor.style.opacity = '1';

        let i = 0;
        function tick() {
            el.textContent = text.slice(0, i);
            i++;
            if (i <= text.length) setTimeout(tick, 52 + Math.random() * 28);
        }
        tick();
    }, delay);
}

// ─────────────────────────────────────────────────────────────
// STAT COUNTERS
// ─────────────────────────────────────────────────────────────
function initStats() {
    document.querySelectorAll('[data-count]').forEach(el => {
        const target = parseInt(el.dataset.count, 10);
        ScrollTrigger.create({
            trigger: el, start: 'top 85%', once: true,
            onEnter: () => {
                gsap.to({ val: 0 }, {
                    val: target, duration: 2, ease: 'power2.out',
                    onUpdate() { el.textContent = Math.round(this.targets()[0].val).toLocaleString(); },
                });
            },
        });
    });
}

// ─────────────────────────────────────────────────────────────
// 3D TILT (desktop only)
// ─────────────────────────────────────────────────────────────
function initTilt() {
    if (window.matchMedia('(pointer:coarse)').matches) return; // skip on touch
    document.querySelectorAll('.tilt-card').forEach(card => {
        card.addEventListener('mousemove', e => {
            const { left, top, width, height } = card.getBoundingClientRect();
            const x = (e.clientX - left) / width  - 0.5;
            const y = (e.clientY - top)  / height - 0.5;
            gsap.to(card, { rotateY: x * 12, rotateX: -y * 12, transformPerspective: 900, duration: 0.35, ease: 'power2.out' });
        });
        card.addEventListener('mouseleave', () => {
            gsap.to(card, { rotateX: 0, rotateY: 0, duration: 0.5, ease: 'power2.out' });
        });
    });
}

// ─────────────────────────────────────────────────────────────
// MAGNETIC BUTTONS (desktop only)
// ─────────────────────────────────────────────────────────────
function initMagnetic() {
    if (window.matchMedia('(pointer:coarse)').matches) return;
    document.querySelectorAll('.magnetic').forEach(btn => {
        btn.addEventListener('mousemove', e => {
            const r = btn.getBoundingClientRect();
            gsap.to(btn, {
                x: (e.clientX - r.left - r.width  / 2) * 0.35,
                y: (e.clientY - r.top  - r.height / 2) * 0.35,
                duration: 0.3, ease: 'power2.out',
            });
        });
        btn.addEventListener('mouseleave', () => {
            gsap.to(btn, { x: 0, y: 0, duration: 0.5, ease: 'elastic.out(1, 0.4)' });
        });
    });
}

// ─────────────────────────────────────────────────────────────
// SERVICES
// ─────────────────────────────────────────────────────────────
function initServices() {
    const cards = gsap.utils.toArray('.service-card');
    if (!cards.length) return;

    // Staggered entrance
    gsap.set(cards, { opacity: 0, y: 50, scale: 0.97 });
    ScrollTrigger.create({
        trigger: '#services',
        start: 'top 72%',
        once: true,
        onEnter: () => {
            gsap.to(cards, {
                opacity: 1, y: 0, scale: 1,
                duration: 0.7,
                stagger: 0.1,
                ease: 'power3.out',
            });
        },
    });

    // Subtle icon bob on scroll scrub
    document.querySelectorAll('.service-icon-wrap').forEach((icon, i) => {
        gsap.to(icon, {
            y: -6,
            repeat: -1,
            yoyo: true,
            duration: 2.5 + (i % 3) * 0.4,
            ease: 'sine.inOut',
            delay: i * 0.3,
        });
    });

    // Number counter for featured card tags ("50+")
    // nothing needed — already handled by stat counters if added

    // Animate the connecting top-bar width on hover (desktop)
    if (!window.matchMedia('(pointer:coarse)').matches) {
        cards.forEach(card => {
            const bar = card.querySelector('.h-1');
            if (!bar) return;
            const origW = bar.style.background;
            card.addEventListener('mouseenter', () => {
                gsap.fromTo(bar, { scaleX: 0, transformOrigin: 'left' }, { scaleX: 1, duration: 0.5, ease: 'power2.out' });
            });
        });
    }
}

// ─────────────────────────────────────────────────────────────
// PROCESS STEPS
// ─────────────────────────────────────────────────────────────
function initProcess() {
    document.querySelectorAll('.process-step').forEach((step, i) => {
        ScrollTrigger.create({
            trigger: step, start: 'top 78%', once: true,
            onEnter: () => {
                setTimeout(() => step.classList.add('revealed'), i * 180);
                const line = document.getElementById('process-line');
                if (line) gsap.to(line, { width: '100%', duration: 0.9, ease: 'power2.inOut', delay: i * 0.18 });
            },
        });
    });
}

// ─────────────────────────────────────────────────────────────
// ORB PARALLAX
// ─────────────────────────────────────────────────────────────
function initParallax() {
    document.querySelectorAll('[data-parallax]').forEach(el => {
        const speed = parseFloat(el.dataset.parallax) || 0.3;
        ScrollTrigger.create({
            trigger: el.parentElement, start: 'top bottom', end: 'bottom top', scrub: true,
            onUpdate: self => gsap.set(el, { y: self.progress * speed * 120 }),
        });
    });
}

// ─────────────────────────────────────────────────────────────
// TESTIMONIALS
// ─────────────────────────────────────────────────────────────
function initTestimonials() {
    const cards = gsap.utils.toArray('.testimonial-card');
    if (!cards.length) return;
    gsap.set(cards, { opacity: 0, y: 40 });
    ScrollTrigger.create({
        trigger: '#testimonials', start: 'top 78%', once: true,
        onEnter: () => gsap.to(cards, { opacity: 1, y: 0, duration: 0.65, stagger: 0.14, ease: 'power3.out' }),
    });
}

// ─────────────────────────────────────────────────────────────
// BOOT
// ─────────────────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {

    // Reduced motion — just show everything immediately
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        const tw = document.getElementById('hero-typewriter');
        if (tw) { tw.textContent = tw.dataset.text ?? ''; tw.style.opacity = '1'; }
        document.querySelectorAll('.testimonial-card').forEach(c => c.style.opacity = '1');
        return;
    }

    initParticles();
    initHero();
    initTypewriter();
    initStats();
    initTilt();
    initMagnetic();
    initServices();
    initProcess();
    initParallax();
    initTestimonials();
});
