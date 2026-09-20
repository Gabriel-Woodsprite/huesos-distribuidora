const { src, dest, watch, series, parallel } = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const autoprefixer = require("autoprefixer");
const postcss = require("gulp-postcss");
const sourcemaps = require("gulp-sourcemaps");
const cssnano = require("cssnano");
const concat = require("gulp-concat");
const terser = require("gulp-terser-js");
const rename = require("gulp-rename");
const imagemin = require("gulp-imagemin"); // Minificar imagenes
const cache = require("gulp-cache");
const webp = require("gulp-webp");

const paths = {
	scss: "src/scss/**/*.scss",
	js: "src/js/**/*.js",
	imagenes: "src/img/**/*",
};

// css es una función que se puede llamar automaticamente
function css() {
	return (
		src(paths.scss)
			.pipe(sourcemaps.init())
			.pipe(sass())
			.pipe(postcss([autoprefixer(), cssnano()]))
			// .pipe(postcss([autoprefixer()]))
			.pipe(sourcemaps.write("."))
			.pipe(dest("public/build/css"))
	);
}

function javascript() {
	return src(paths.js)
		.pipe(terser())
		.pipe(sourcemaps.write("."))
		.pipe(dest("public/build/js"));
}

function imagenes() {
	return src(paths.imagenes)
		.pipe(cache(imagemin({ optimizationLevel: 3 })))
		.pipe(dest("public/build/img"));
}

function versionWebp() {
	return src(paths.imagenes).pipe(webp()).pipe(dest("public/build/img"));
}

function watchArchivos() {
	watch(paths.scss, css);
	watch(paths.js, javascript);
	// Ejecuta las imágenes en serie al detectar cambios para evitar conflictos
	watch(paths.imagenes, series(imagenes, versionWebp));
}

exports.css = css;
exports.watchArchivos = watchArchivos;

// Se procesan las imágenes secuencialmente (series) antes de iniciar las demás tareas
exports.default = series(
	imagenes,
	versionWebp,
	parallel(css, javascript, watchArchivos)
);

exports.build = series(
	imagenes,
	versionWebp,
	parallel(css, javascript)
);