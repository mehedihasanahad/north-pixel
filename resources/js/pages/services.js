// Scroll reveal is handled by app.js IntersectionObserver

// Animate metric bars (speedup & maintenance pages)
document.addEventListener('DOMContentLoaded', () => {
    const bars = document.querySelectorAll('.metric-bar');
    if (!bars.length) return;

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            const target = el.style.getPropertyValue('--target-w') || '0%';
            setTimeout(() => { el.style.width = target; }, 200);
            observer.unobserve(el);
        });
    }, { threshold: 0.3 });

    bars.forEach(el => observer.observe(el));
});
