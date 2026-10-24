import { nav } from './modules/nav.js';
import { validacion } from './modules/validacion.js';
import { initCarruselNosotros } from './modules/carrusel.js';

document.addEventListener('DOMContentLoaded', () => {
    if (typeof nav === 'function') nav();
    if (typeof validacion === 'function') validacion();
    if (typeof initCarruselNosotros === 'function') initCarruselNosotros();
});