import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

// ── Particle canvas ───────────────────────────────────────────
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
            x:    Math.random() * W,
            y:    Math.random() * H,
            r:    Math.random() * 1.8 + 0.4,
            vx:   (Math.random() - 0.5) * 0.4,
            vy:   (Math.random() - 0.5) * 0.4,
            color: c,
            alpha: Math.random() * 0.5 + 0.15,
        };
    }

    function init() {
        resize();
        particles = Array.from({ length: 90 }, makeParticle);
    }

    function draw() {
        ctx.clearRect(0, 0, W, H);

        // Connection lines
        for (let i = 0; i < particles.length; i++) {
            for (let j = i + 1; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const d  = Math.sqrt(dx * dx + dy * dy);
                if (d < 120) {
                    ctx.beginPath();
                    ctx.strokeStyle = `rgba(124,58,237,${0.08 * (1 - d / 120)})`;
                    ctx.lineWidth   = 0.6;
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                }
            }
        }

        // Dots
        particles.forEach(p => {
            p.x += p.vx;
            p.y += p.vy;
            if (p.x < 0) p.x = W;
            if (p.x > W) p.x = 0;
            if (p.y < 0) p.y = H;
            if (p.y > H) p.y = 0;

            ctx.beginPath();
            ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
            ctx.fillStyle = p.color + p.alpha + ')';
            ctx.fill();
        });

        requestAnimationFrame(draw);
    }

    init();
    draw();
    window.addEventListener('resize', () => { resize(); });
}

// ── Hero GSAP animations ──────────────────────────────────────
function initHero() {
    const tl = gsap.timeline({ defaults: { ease: 'power3.out' } });

    tl.from('#hero-badge',    { y: 20, opacity: 0, duration: 0.6 })
      .from('#hero-words .word', {
          y: 60, opacity: 0, duration: 0.7, stagger: 0.08,
      }, '-=0.2')
      .from('#hero-sub',      { y: 20, opacity: 0, duration: 0.6 }, '-=0.3')
      .from('#hero-ctas',     { y: 20, opacity: 0, duration: 0.6 }, '-=0.3')
      .from('#hero-cards',    { y: 40, opacity: 0, duration: 0.8, stagger: 0.12 }, '-=0.4')
      .from('#hero-scroll',   { opacity: 0, duration: 0.5 }, '-=0.2');
}

// ── Stat counters ─────────────────────────────────────────────
function initStats() {
    document.querySelectorAll('[data-count]').forEach(el => {
        const target = parseInt(el.dataset.count, 10);
        ScrollTrigger.create({
            trigger: el,
            start:   'top 85%',
            once:    true,
            onEnter: () => {
                gsap.to({ val: 0 }, {
                    val:      target,
                    duration: 2,
                    ease:     'power2.out',
                    onUpdate() { el.textContent = Math.round(this.targets()[0].val).toLocaleString(); },
                });
            },
        });
    });
}

// ── Card 3D tilt ──────────────────────────────────────────────
function initTilt() {
    document.querySelectorAll('.tilt-card').forEach(card => {
        card.addEventListener('mousemove', e => {
            const { left, top, width, height } = card.getBoundingClientRect();
            const x = (e.clientX - left) / width  - 0.5;
            const y = (e.clientY - top)  / height - 0.5;
            gsap.to(card, {
                rotateY: x * 14,
                rotateX: -y * 14,
                transformPerspective: 900,
                duration: 0.4,
                ease: 'power2.out',
            });
        });
        card.addEventListener('mouseleave', () => {
            gsap.to(card, { rotateX: 0, rotateY: 0, duration: 0.5, ease: 'power2.out' });
        });
    });
}

// ── Magnetic buttons ──────────────────────────────────────────
function initMagnetic() {
    document.querySelectorAll('.magnetic').forEach(btn => {
        btn.addEventListener('mousemove', e => {
            const r   = btn.getBoundingClientRect();
            const x   = (e.clientX - r.left - r.width  / 2) * 0.35;
            const y   = (e.clientY - r.top  - r.height / 2) * 0.35;
            gsap.to(btn, { x, y, duration: 0.3, ease: 'power2.out' });
        });
        btn.addEventListener('mouseleave', () => {
            gsap.to(btn, { x: 0, y: 0, duration: 0.5, ease: 'elastic.out(1, 0.4)' });
        });
    });
}

// ── Process timeline line draw ────────────────────────────────
function initProcess() {
    const steps = document.querySelectorAll('.process-step');
    steps.forEach((step, i) => {
        ScrollTrigger.create({
            trigger: step,
            start:   'top 75%',
            once:    true,
            onEnter: () => {
                setTimeout(() => step.classList.add('revealed'), i * 200);
                const fill = step.querySelector('.process-line-fill');
                if (fill) gsap.to(fill, { width: '100%', duration: 0.8, ease: 'power2.inOut', delay: i * 0.2 });
            },
        });
    });
}

// ── Orb parallax ─────────────────────────────────────────────
function initParallax() {
    document.querySelectorAll('[data-parallax]').forEach(el => {
        const speed = parseFloat(el.dataset.parallax) || 0.3;
        ScrollTrigger.create({
            trigger: el.parentElement,
            start:   'top bottom',
            end:     'bottom top',
            scrub:   true,
            onUpdate: self => {
                gsap.set(el, { y: self.progress * speed * 120 });
            },
        });
    });
}

// ── Testimonial stagger reveal ────────────────────────────────
function initTestimonials() {
    gsap.from('.testimonial-card', {
        scrollTrigger: {
            trigger: '#testimonials',
            start:   'top 75%',
        },
        y: 50, opacity: 0, duration: 0.7,
        stagger: 0.15, ease: 'power3.out',
    });
}

// ── Init all ─────────────────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
    // Respect reduced motion
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    initParticles();
    initHero();
    initStats();
    initTilt();
    initMagnetic();
    initProcess();
    initParallax();
    initTestimonials();
});
