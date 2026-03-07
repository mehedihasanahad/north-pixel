import PhotoSwipeLightbox from 'photoswipe/lightbox';
import 'photoswipe/style.css';

const urls = window._screenshotUrls || [];

if (urls.length) {
    // Load each image to read its natural dimensions — prevents stretch
    Promise.all(
        urls.map(src => new Promise(resolve => {
            const img = new Image();
            img.onload = () => resolve({ src, width: img.naturalWidth, height: img.naturalHeight });
            img.onerror = () => resolve({ src, width: 1280, height: 720 });
            img.src = src;
        }))
    ).then(dataSource => {
        const lightbox = new PhotoSwipeLightbox({
            dataSource,
            pswpModule: () => import('photoswipe'),
            wheelToZoom: true,
            pinchToClose: false,
            bgOpacity: 0.92,
        });

        lightbox.init();
        window._lightbox = lightbox;
    });
}
