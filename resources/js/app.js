import './bootstrap';
import Alpine from 'alpinejs';
import lottie from 'lottie-web';

window.Alpine = Alpine;
window.lottie = lottie;

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    // Animasi Lottie untuk error DB
    const errorContainer = document.getElementById('gmi-Error-404');
    if (errorContainer) {
        lottie.loadAnimation({
            container: errorContainer,
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: '/animations/gmi-Error-404.json', // path ke file animasi kamu
        });
    }
});
