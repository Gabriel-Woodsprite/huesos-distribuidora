/* Luego la mueves a otro lado 🐒  */

document.addEventListener('DOMContentLoaded', () => {
    const navToggle = document.querySelector('.nav-toggle');
    const navClose = document.querySelector('.nav-close');
    const navMenu = document.querySelector('.nav-menu');

    // Abrir el menú al hacer clic en la hamburguesa ☰
    if (navToggle) {
        navToggle.addEventListener('click', () => {
            navMenu.classList.add('is-active');
        });
    }

    // Cerrar el menú al hacer clic en la X
    if (navClose) {
        navClose.addEventListener('click', () => {
            navMenu.classList.remove('is-active');
        });
    }
});