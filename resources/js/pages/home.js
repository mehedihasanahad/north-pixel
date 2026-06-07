// Scroll reveal handled by app.js IntersectionObserver (.reveal class)
// Stat count-up on first intersection
document.addEventListener('DOMContentLoaded', () => {
    const statEls = document.querySelectorAll('[data-count]');
    if (!statEls.length) return;

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            const target = parseFloat(el.dataset.count);
            const suffix = el.dataset.suffix ?? '';
            const duration = 1200;
            const start = performance.now();

            function tick(now) {
                const progress = Math.min((now - start) / duration, 1);
                const ease = 1 - Math.pow(1 - progress, 3);
                el.textContent = Math.round(ease * target) + suffix;
                if (progress < 1) requestAnimationFrame(tick);
            }

            requestAnimationFrame(tick);
            observer.unobserve(el);
        });
    }, { threshold: 0.5 });

    statEls.forEach(el => observer.observe(el));
});
