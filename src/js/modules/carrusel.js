export function initCarruselNosotros() {
    const carrusel = document.getElementById('carruselNosotros');
    const btnPrev = document.querySelector('.carrusel-btn--prev');
    const btnNext = document.querySelector('.carrusel-btn--next');

    // Validación para evitar errores si los elementos no existen en el DOM
    if (!carrusel || !btnPrev || !btnNext) return;

    const scrollAmount = 280; // Distancia de desplazamiento en píxeles

    btnPrev.addEventListener('click', () => {
        carrusel.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    });

    btnNext.addEventListener('click', () => {
        carrusel.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    });
}