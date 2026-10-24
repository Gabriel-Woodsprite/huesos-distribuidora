export function nav() {
	const navToggle = document.querySelector('.nav-toggle');
	const navMenu = document.querySelector('.nav-menu');
	const navClose = document.querySelector('.nav-close');

	if (navToggle && navMenu) {
		navToggle.addEventListener('click', () => {
			navMenu.classList.add('is-active');
		});
	}

	if (navClose && navMenu) {
		navClose.addEventListener('click', () => {
			navMenu.classList.remove('is-active');
		});
	}
}