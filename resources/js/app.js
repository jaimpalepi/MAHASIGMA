import './bootstrap';
import 'flowbite';
document.addEventListener('DOMContentLoaded', function () {
        const carousel = document.querySelector('[data-carousel="slide"]');
        const nextBtn = carousel.querySelector('[data-carousel-next]');

        // Auto slide every 5 seconds
        setInterval(() => {
            nextBtn.click();
        }, 5000);
    });