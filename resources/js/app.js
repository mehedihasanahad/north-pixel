import './bootstrap';
import Alpine from 'alpinejs';

// ── Global Alpine stores ──────────────────────────────────────
Alpine.store('ui', {
    drawerOpen: false,
    modalOpen:  false,
    modalProduct: null,

    openModal(product) {
        this.modalProduct = product;
        this.modalOpen = true;
        document.body.style.overflow = 'hidden';
    },
    closeModal() {
        this.modalOpen = false;
        this.modalProduct = null;
        document.body.style.overflow = '';
    },
    openDrawer()  { this.drawerOpen = true;  document.body.style.overflow = 'hidden'; },
    closeDrawer() { this.drawerOpen = false; document.body.style.overflow = ''; },
});

// ── Scroll progress bar ───────────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {
    const bar = document.getElementById('scroll-progress');
    if (bar) {
        window.addEventListener('scroll', () => {
            const pct = window.scrollY / (document.documentElement.scrollHeight - window.innerHeight) * 100;
            bar.style.width = Math.min(pct, 100) + '%';
        }, { passive: true });
    }

    // Scroll reveal via IntersectionObserver
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('visible');
                revealObserver.unobserve(e.target);
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));
});

window.Alpine = Alpine;
Alpine.start();
