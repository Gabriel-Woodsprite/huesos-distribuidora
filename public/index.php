<?php
session_start([
	'cookie_httponly' => true,
	'cookie_samesite' => 'Lax',
	'cookie_secure' => !empty($_SERVER['HTTPS']),
]);

if (empty($_SESSION['csrf_token'])) {
	$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
$csrf = $_SESSION['csrf_token'];

$old = $_SESSION['form_old'] ?? [];
$errors = $_SESSION['form_errors'] ?? [];
unset($_SESSION['form_old'], $_SESSION['form_errors']);

?>
<!doctype html>
<html lang="es">

<head>
	<!-- Meta tags -->
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description"
		content="Página Web Corporativa de Huesos, Distribuidora, empresa dedicada a la distribución de productos veterinarios." />

	<!-- css  -->
	<link rel="stylesheet" href="build/css/app.css">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;700&family=Roboto:wght@400;500;700&display=swap"
		rel="stylesheet">

	<title>Huesos Distribuidora</title>
</head>

<body>
	<?php
	include 'includes/header.php';
	?>
	<main>
		<section id="nosotros" class="seccion-nosotros contenedor">
			<!-- PARTE SUPERIOR: Imagen + Frase -->
			<div class="nosotros-banner">
				<picture class="nosotros-banner__imagen">
					<source srcset="build/img/mascotas/hero.webp" type="image/webp">
					<img src="build/img/mascotas/hero.png" alt="imagen de prueba" loading="lazy">
				</picture>
				<blockquote class="nosotros-frase">
					<p>
						"Su bienestar es nuestra mayor inspiración; su salud, nuestro compromiso diario."
					</p>
				</blockquote>
			</div>

			<!-- PARTE INFERIOR: Historia + Mosaico/Carrusel de Tarjetas -->
			<div class="nosotros-contenido">
				<!-- Columna Izquierda: Historia / Descripción -->
				<div class="nosotros-info">
					<h2>Nosotros</h2>
					<p>
						En <strong>Huesos — Distribuidora Veterinaria</strong>, nacimos el
						8 de enero de 2025 con una convicción clara: la salud animal
						merece productos de la más alta calidad, atención profesional y un
						acompañamiento cercano que realmente respalde el trabajo diario de
						los médicos veterinarios.
					</p>
					<p>
						No solo distribuimos medicamentos, suplementos y soluciones de
						especialidad; nos convertimos en tu aliado estratégico. Nos
						diferenciamos por brindar disponibilidad oportuna, respaldo
						integral y un servicio personalizado diseñado para hacer crecer tu
						clínica u hospital y mejorar la atención de tus pacientes.
					</p>
					<p>
						Guiados por la integridad, la innovación y una firme pasión por la
						medicina veterinaria.
					</p>
					<a href="#nosotros-detalle" class="btn-enlace">Leer más</a>
				</div>

				<!-- Columna Derecha: Mosaico en Desktop / Carrusel con Flechas en Mobile -->
				<div class="nosotros-tarjetas-wrapper">
					<button class="carrusel-btn carrusel-btn--prev" aria-label="Anterior">&#10094;</button>

					<div class="nosotros-tarjetas" id="carruselNosotros">
						<!-- Tarjeta de Imagen 1 (Izquierda) -->
						<div class="tarjeta tarjeta-imagen tarjeta-imagen--left">
							<picture>
								<source srcset="build/img/mascotas/hero.webp" type="image/webp">
								<img src="build/img/mascotas/hero.png" alt="imagen de prueba" loading="lazy">
							</picture>
						</div>

						<!-- Tarjeta Central Destacada -->
						<div class="tarjeta tarjeta-destacada">
							<div class="tarjeta-item">
								<div class="tarjeta-icono" aria-hidden="true">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
										stroke-linecap="round" stroke-linejoin="round">
										<rect x="1" y="3" width="15" height="13"></rect>
										<polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
										<circle cx="5.5" cy="18.5" r="2.5"></circle>
										<circle cx="18.5" cy="18.5" r="2.5"></circle>
									</svg>
								</div>
								<div class="tarjeta-texto">
									<h3>Disponibilidad</h3>
									<p>Entrega oportuna de insumos y medicamentos clave.</p>
								</div>
							</div>

							<div class="tarjeta-item">
								<div class="tarjeta-icono" aria-hidden="true">
									<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
										stroke-linecap="round" stroke-linejoin="round">
										<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
									</svg>
								</div>
								<div class="tarjeta-texto">
									<h3>Respaldo</h3>
									<p>Atención y asesoría técnica personalizada.</p>
								</div>
							</div>
						</div>

						<!-- Tarjeta de Imagen 3 (Derecha) -->
						<div class="tarjeta tarjeta-imagen tarjeta-imagen--right">
							<picture>
								<source srcset="build/img/mascotas/hero.webp" type="image/webp">
								<img src="build/img/mascotas/hero.png" alt="imagen de prueba" loading="lazy">
							</picture>
						</div>
					</div>

					<button class="carrusel-btn carrusel-btn--next" aria-label="Siguiente">&#10095;</button>
				</div>
			</div>
		</section>
		<section id="productos" class="productos-section contenedor">
			<!-- 1. Encabezado de la Sección -->
			<div class="productos__header">
				<h2>Nuestras Líneas de Productos</h2>
				<p>Distribución mayorista de insumos veterinarios, medicamentos y equipamiento para clínicas, hospitales
					y tiendas especializadas.</p>
			</div>

			<!-- 2. Categorías / Líneas Principales -->
			<div class="productos__grid">
				<div class="producto-card">
					<div class="producto-card__icon" aria-hidden="true">
						<!-- Icono Farmacéutico -->
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
							stroke-linecap="round" stroke-linejoin="round">
							<path d="M10.5 20.5L3 13l7.5-7.5L18 13l-7.5 7.5z"></path>
							<line x1="3" y1="13" x2="21" y2="13"></line>
						</svg>
					</div>
					<h3>Farmacéuticos y Biológicos</h3>
					<p>Vacunas, antibióticos, anestésicos, antiparasitarios y tratamientos dermatológicos de uso
						clínico.</p>
				</div>

				<div class="producto-card">
					<div class="producto-card__icon" aria-hidden="true">
						<!-- Icono Nutrición -->
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
							stroke-linecap="round" stroke-linejoin="round">
							<path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
						</svg>
					</div>
					<h3>Nutrición y Suplementos</h3>
					<p>Alimento especializado, premios funcionales, suplementos vitamínicos y reguladores de salud
						animal.</p>
				</div>

				<div class="producto-card">
					<div class="producto-card__icon" aria-hidden="true">
						<!-- Icono Diagnóstico/Equipo -->
						<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
							stroke-linecap="round" stroke-linejoin="round">
							<path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
						</svg>
					</div>
					<h3>Equipo Médico y Diagnóstico</h3>
					<p>Pruebas rápidas de diagnóstico, reactivos de laboratorio, material quirúrgico y accesorios de
						manejo.</p>
				</div>
			</div>

			<!-- 3. Laboratorios / Marcas Destacadas -->
			<div class="productos__marcas">
				<h3>Laboratorios y Marcas con las que Trabajamos</h3>
				<p>Contamos con el respaldo de marcas líderes en el sector veterinario:</p>

				<div class="marcas-grid">
					<div class="marca-item">
						<img src="build/img/marcas/Zoetis.svg" alt="Zoetis" loading="lazy">
					</div>
					<div class="marca-item">
						<img src="build/img/marcas/Mindray.svg" alt="Mindray" loading="lazy">
					</div>
					<div class="marca-item">
						<img src="build/img/marcas/Virbac.svg" alt="Virbac" loading="lazy">
					</div>
					<div class="marca-item">
						<img src="build/img/marcas/Lapisa.svg" alt="Lapisa" loading="lazy">
					</div>
					<div class="marca-item">
						<img src="build/img/marcas/DiprofaQ.svg" alt="DiprofaQ" loading="lazy">
					</div>
					<div class="marca-item">
						<img src="build/img/marcas/Vetoquinol.svg" alt="Vetoquinol" loading="lazy">
					</div>
				</div>
			</div>

			<!-- 4. Descarga de Catálogo y Cotización (CTA) -->
			<!-- Definición ÚNICA de la huella -->
			<svg width="0" height="0" style="position:absolute" aria-hidden="true" focusable="false">
				<defs>
					<g id="huella-path">
						<!-- Dedos (4 elipses) -->
						<ellipse cx="20" cy="46" rx="8.5" ry="12" transform="rotate(-18 20 46)" />
						<ellipse cx="38" cy="26" rx="9" ry="13" transform="rotate(-8 38 26)" />
						<ellipse cx="62" cy="26" rx="9" ry="13" transform="rotate(8 62 26)" />
						<ellipse cx="80" cy="46" rx="8.5" ry="12" transform="rotate(18 80 46)" />
						<!-- Almohadilla central -->
						<path d="M50 46
				C41 46 36 54 31 62
				C25 70 20 74 20 82
				C20 90 27 94 35 92
				C41 90 45 88 50 88
				C55 88 59 90 65 92
				C73 94 80 90 80 82
				C80 74 75 70 69 62
				C64 54 59 46 50 46 Z" />
					</g>
				</defs>
			</svg>

			<div class="productos__cta">
				<!-- Huellitas decorativas -->
				<svg class="huella-decorativa h-1" viewBox="0 0 100 100" aria-hidden="true">
					<use href="#huella-path" />
				</svg>
				<svg class="huella-decorativa h-2" viewBox="0 0 100 100" aria-hidden="true">
					<use href="#huella-path" />
				</svg>
				<svg class="huella-decorativa h-3" viewBox="0 0 100 100" aria-hidden="true">
					<use href="#huella-path" />
				</svg>
				<svg class="huella-decorativa h-4" viewBox="0 0 100 100" aria-hidden="true">
					<use href="#huella-path" />
				</svg>
				<svg class="huella-decorativa h-5" viewBox="0 0 100 100" aria-hidden="true">
					<use href="#huella-path" />
				</svg>
				<svg class="huella-decorativa h-6" viewBox="0 0 100 100" aria-hidden="true">
					<use href="#huella-path" />
				</svg>
				<svg class="huella-decorativa h-7" viewBox="0 0 100 100" aria-hidden="true">
					<use href="#huella-path" />
				</svg>

				<h3>¿Deseas consultar la lista completa de precios o un producto en específico?</h3>
				<p>Descarga nuestro catálogo actualizado o ponte en contacto directo con uno de nuestros asesores.</p>

				<div class="productos__cta-botones">
					<!-- Botón Descargar Catálogo -->
					<a href="docs/catalogo-distribuidora-huesos.pdf" class="btn btn--secundario" download
						target="_blank" rel="noopener noreferrer" aria-label="Descargar Catálogo PDF">
						<svg class="btn__icon-pdf" viewBox="0 0 24 24" width="20" height="20" fill="none">
							<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" stroke="#D32F2F"
								stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
							<polyline points="14 2 14 8 20 8" stroke="#D32F2F" stroke-width="2" stroke-linecap="round"
								stroke-linejoin="round" />
							<path d="M9 13h6M9 17h4" stroke="#D32F2F" stroke-width="2" stroke-linecap="round" />
						</svg>
						<span>Descargar Catálogo <small>(PDF)</small></span>
					</a>

					<!-- Botón WhatsApp -->
					<a href="https://wa.me/527151461718?text=Hola,%20quisiera%20solicitar%20información"
						class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer"
						aria-label="Contactar por WhatsApp">
						<svg viewBox="0 0 16 16" width="20" height="20">
							<path fill="white"
								d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z">
							</path>
						</svg>
						<span>Enviar WhatsApp Directo</span>
					</a>
				</div>
			</div>
		</section>
		<section id="cobertura" class="cobertura-section">
			<div class="container">

				<!-- Encabezado de la Sección -->
				<div class="section-title text-center">
					<h2>Nuestra Cobertura</h2>
					<p>Llegamos a veterinarias, clínicas, estéticas y hospitales animales en la región y todo México.
					</p>
				</div>

				<!-- Contenido Principal (Tarjetas + Mapa dentro del grid) -->
				<div class="cobertura-grid">

					<!-- Lista de Puntos de Cobertura -->
					<div class="cobertura-detalles">
						<div class="cobertura-card card-regional">
							<h3>Presencia Regional Directa</h3>
							<p>Atención personalizada y distribución prioritaria en nuestra ciudad sede y estados
								colindantes.</p>
						</div>

						<div class="cobertura-card card-nacional">
							<h3>Envíos a Todo México</h3>
							<p>Contamos con logística y alianzas de envío para abastecer tus productos veterinarios en
								cualquier punto de la República Mexicana.</p>
						</div>

						<div class="cobertura-card card-mayoristas">
							<h3>Atención a Mayoristas y Clínicas</h3>
							<p>Suministro constante para veterinarias, hospitales veterinarios, tiendas de mascotas y
								distribuidores.</p>
						</div>

						<!-- Botón de Acción unificado -->
						<div class="cobertura-cta">
							<a href="https://wa.me/527151461718?text=Hola,%20quisiera%20consultar%20la%20cobertura%20y%20tiempos%20de%20entrega%20en%20mi%20zona"
								target="_blank" rel="noopener noreferrer" class="btn-whatsapp">
								<svg viewBox="0 0 16 16" width="20" height="20" aria-hidden="true">
									<path fill="currentColor"
										d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z">
									</path>
								</svg>
								Consultar cobertura de mi ciudad
							</a>
						</div>
					</div>

					<!-- Mapa Conceptual de Cobertura y Sede -->
					<div class="cobertura-mapa">
						<h3>Centro Logístico y Red Nacional</h3>
						<div class="mapa-contenedor mapa-conceptual">

							<!-- Sede -->
							<div class="sede-badge">
								<div class="sede-punto-pulsante"></div>
								<div class="sede-info">
									<span class="sede-etiqueta">Sede Operativa Central</span>
									<span class="sede-ciudad">Toluca, Estado de México</span>
								</div>
							</div>

							<!-- Mapa de México -->
							<svg viewBox="-10 -14 660 410" class="svg-mexico" role="img"
								aria-label="Mapa de México con rutas de distribución desde Toluca hacia todo el país">

								<defs>
									<linearGradient id="mxFill" gradientUnits="userSpaceOnUse" x1="0" y1="0" x2="0"
										y2="400">
										<stop offset="0" class="stop-a" />
										<stop offset="1" class="stop-b" />
									</linearGradient>

									<pattern id="mxDots" width="9" height="9" patternUnits="userSpaceOnUse">
										<circle cx="4.5" cy="4.5" r="1" class="mx-punto-textura" />
									</pattern>

									<!-- Territorio -->
									<path id="mxA"
										d="M64,6 L131,35 L169,35 L186,35 L186,25 L218,25 L249,49 L256,70 L283,82 L296,66 L315,66 L328,80 L352,113 L359,136 L392,145 L396,164 L386,186 L385,215 L391,240 L395,252 L405,268 L416,283 L422,292 L447,304 L470,299 L480,296 L497,294 L518,280 L522,269 L524,252 L539,240 L564,236 L570,234 L588,235 L593,244 L581,262 L576,293 L564,297 L550,310 L513,312 L513,322 L505,338 L500,347 L490,379 L456,349 L433,345 L416,353 L409,355 L398,351 L371,340 L345,331 L313,315 L301,308 L276,299 L260,286 L234,258 L241,252 L241,235 L220,201 L199,168 L170,152 L135,104 L112,86 L99,57 L85,35 L65,25 Z" />
									<path id="mxB"
										d="M17,10 L61,6 L61,28 L64,45 L75,62 L87,82 L92,92 L100,102 L109,118 L118,133 L128,147 L140,165 L147,182 L150,190 L157,203 L154,207 L140,203 L125,188 L112,172 L103,155 L90,130 L74,112 L60,95 L50,72 L42,53 L27,23 Z" />

									<!-- Rutas desde Toluca (348,281) -->
									<path id="r1" d="M348,281 Q238,80 20,12" />
									<path id="r2" d="M348,281 Q267,191 146,182" />
									<path id="r3" d="M348,281 Q281,139 133,81" />
									<path id="r4" d="M348,281 Q325,161 226,90" />
									<path id="r5" d="M348,281 Q367,213 335,151" />
									<path id="r6" d="M348,281 Q319,253 278,253" />
									<path id="r7" d="M348,281 Q382,268 416,283" />
									<path id="r8" d="M348,281 Q392,296 405,326" />
									<path id="r9" d="M348,281 Q420,296 473,333" />
									<path id="r10" d="M348,281 Q437,225 540,246" />
									<path id="r11" d="M348,281 Q462,213 592,243" />
								</defs>

								<!-- Sombra / relieve -->
								<g class="mx-sombra" transform="translate(0,6)">
									<use href="#mxA" />
									<use href="#mxB" />
								</g>

								<!-- Silueta -->
								<g class="mx-silueta">
									<use href="#mxA" />
									<use href="#mxB" />
								</g>
								<g class="mx-textura">
									<use href="#mxA" />
									<use href="#mxB" />
								</g>

								<!-- Rutas -->
								<g class="mx-rutas" fill="none">
									<use href="#r1" />
									<use href="#r2" />
									<use href="#r3" />
									<use href="#r4" />
									<use href="#r5" />
									<use href="#r6" />
									<use href="#r7" />
									<use href="#r8" />
									<use href="#r9" />
									<use href="#r10" />
									<use href="#r11" />
								</g>

								<!-- Paquetes viajando -->
								<g class="mx-paquetes">
									<circle r="3">
										<animateMotion dur="4.5s" begin="0s" repeatCount="indefinite">
											<mpath href="#r1" />
										</animateMotion>
									</circle>
									<circle r="3">
										<animateMotion dur="3.5s" begin="0.6s" repeatCount="indefinite">
											<mpath href="#r2" />
										</animateMotion>
									</circle>
									<circle r="3">
										<animateMotion dur="4s" begin="1.2s" repeatCount="indefinite">
											<mpath href="#r3" />
										</animateMotion>
									</circle>
									<circle r="3">
										<animateMotion dur="3.5s" begin="0.3s" repeatCount="indefinite">
											<mpath href="#r4" />
										</animateMotion>
									</circle>
									<circle r="3">
										<animateMotion dur="3s" begin="1.5s" repeatCount="indefinite">
											<mpath href="#r5" />
										</animateMotion>
									</circle>
									<circle r="3">
										<animateMotion dur="2.5s" begin="0.9s" repeatCount="indefinite">
											<mpath href="#r6" />
										</animateMotion>
									</circle>
									<circle r="3">
										<animateMotion dur="2.5s" begin="0.2s" repeatCount="indefinite">
											<mpath href="#r7" />
										</animateMotion>
									</circle>
									<circle r="3">
										<animateMotion dur="2.5s" begin="1.1s" repeatCount="indefinite">
											<mpath href="#r8" />
										</animateMotion>
									</circle>
									<circle r="3">
										<animateMotion dur="3s" begin="0.5s" repeatCount="indefinite">
											<mpath href="#r9" />
										</animateMotion>
									</circle>
									<circle r="3">
										<animateMotion dur="3.8s" begin="1.8s" repeatCount="indefinite">
											<mpath href="#r10" />
										</animateMotion>
									</circle>
									<circle r="3">
										<animateMotion dur="4.2s" begin="0.8s" repeatCount="indefinite">
											<mpath href="#r11" />
										</animateMotion>
									</circle>
								</g>

								<!-- Ciudades -->
								<g class="mx-ciudades">
									<g>
										<circle class="aro" cx="20" cy="12" r="5.5" />
										<circle class="nucleo" cx="20" cy="12" r="2.2" />
									</g>
									<g>
										<circle class="aro" cx="146" cy="182" r="5.5" />
										<circle class="nucleo" cx="146" cy="182" r="2.2" />
									</g>
									<g>
										<circle class="aro" cx="133" cy="81" r="5.5" />
										<circle class="nucleo" cx="133" cy="81" r="2.2" />
									</g>
									<g>
										<circle class="aro" cx="226" cy="90" r="5.5" />
										<circle class="nucleo" cx="226" cy="90" r="2.2" />
									</g>
									<g>
										<circle class="aro" cx="335" cy="151" r="5.5" />
										<circle class="nucleo" cx="335" cy="151" r="2.2" />
									</g>
									<g>
										<circle class="aro" cx="278" cy="253" r="5.5" />
										<circle class="nucleo" cx="278" cy="253" r="2.2" />
									</g>
									<g>
										<circle class="aro" cx="416" cy="283" r="5.5" />
										<circle class="nucleo" cx="416" cy="283" r="2.2" />
									</g>
									<g>
										<circle class="aro" cx="405" cy="326" r="5.5" />
										<circle class="nucleo" cx="405" cy="326" r="2.2" />
									</g>
									<g>
										<circle class="aro" cx="473" cy="333" r="5.5" />
										<circle class="nucleo" cx="473" cy="333" r="2.2" />
									</g>
									<g>
										<circle class="aro" cx="540" cy="246" r="5.5" />
										<circle class="nucleo" cx="540" cy="246" r="2.2" />
									</g>
									<g>
										<circle class="aro" cx="592" cy="243" r="5.5" />
										<circle class="nucleo" cx="592" cy="243" r="2.2" />
									</g>
								</g>

								<!-- Etiquetas -->
								<g class="mx-etiquetas">
									<text x="10" y="0" class="lbl lbl--main">Tijuana</text>
									<text x="137" y="186" class="lbl lbl--sec" text-anchor="end">La Paz</text>
									<text x="142" y="85" class="lbl lbl--sec">Hermosillo</text>
									<text x="235" y="94" class="lbl lbl--sec">Chihuahua</text>
									<text x="344" y="155" class="lbl lbl--main">Monterrey</text>
									<text x="269" y="257" class="lbl lbl--main" text-anchor="end">Guadalajara</text>
									<text x="425" y="279" class="lbl lbl--main">Veracruz</text>
									<text x="396" y="330" class="lbl lbl--sec" text-anchor="end">Oaxaca</text>
									<text x="482" y="337" class="lbl lbl--sec">Tuxtla</text>
									<text x="540" y="230" class="lbl lbl--sec" text-anchor="middle">Mérida</text>
									<text x="600" y="247" class="lbl lbl--main">Cancún</text>
								</g>

								<!-- Sede: Toluca -->
								<g class="mx-sede">
									<circle class="pulso" cx="348" cy="281" r="8" />
									<circle class="punto" cx="348" cy="281" r="7" />
									<text x="348" y="304" class="lbl lbl--sede" text-anchor="middle">Toluca</text>
								</g>
							</svg>

							<!-- Banner nacional -->
							<div class="cobertura-nacional-banner">
								<svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor"
									stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
									<circle cx="12" cy="12" r="10"></circle>
									<line x1="2" y1="12" x2="22" y2="12"></line>
									<path
										d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
									</path>
								</svg>
								<span>Logística activa con entregas garantizadas en <strong>todo México</strong></span>
							</div>
						</div>
					</div>

				</div>

			</div>
		</section>
		<section id="contacto" class="seccion-contacto">
			<div class="contacto-contenedor">
				<header class="contacto-encabezado">
					<h2>Contacto</h2>
					<p>
						Estamos listos para convertirnos en el aliado estratégico que tu
						práctica veterinaria necesita. Ponte en contacto con nosotros para
						cotizaciones, solicitudes de catálogo o información de productos.
					</p>
				</header>

				<div class="contacto-grid">
					<!-- Columna Información de Contacto Directo y Canales -->
					<div class="contacto-info">
						<h3>Atención Personalizada</h3>
						<p>
							Comunícate directamente con nuestro equipo de ventas y soporte
							para recibir asistencia:
						</p>

						<address class="datos-contacto">
							<div class="contacto-item">
								<div>
									<strong>Teléfono / WhatsApp:</strong>
									<a href="tel:+527151461718" aria-label="Llamar al +52 715 146 1718">+52 715 146
										1718</a>
								</div>
							</div>

							<div class="contacto-item">
								<div>
									<strong>Correo Electrónico:</strong>
									<a href="mailto:distribuidorahuesos@gmail.com">distribuidorahuesos@gmail.com</a>
								</div>
							</div>
						</address>

						<!-- Botón de Acción WhatsApp -->
						<div class="whatsapp-accion">
							<a href="https://wa.me/527151461718?text=Hola,%20quisiera%20solicitar%20información"
								class="btn btn--whatsapp" target="_blank" rel="noopener noreferrer"
								aria-label="Contactar por WhatsApp">
								<svg viewBox="0 0 16 16" width="20" height="20">
									<path fill="white"
										d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z">
									</path>
								</svg>
								<span>Enviar WhatsApp Directo</span>
							</a>
						</div>
					</div>

					<!-- Columna Formulario de Contacto -->
					<div class="contacto-formulario-wrapper">
						<form action="contact.php" method="POST" class="formulario-contacto" id="formulario-contacto"
							novalidate>
							<input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf, ENT_QUOTES) ?>">
							<input type="hidden" name="form_ts" value="<?= (int) (microtime(true) * 1000) ?>">

							<div class="hp-field" aria-hidden="true">
								<label for="website">No Rellenar</label>
								<input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
							</div>

							<fieldset>
								<legend>Envíanos un mensaje</legend>

								<div class="campo">
									<label for="nombre">
										Nombre completo <span class="requerido" aria-hidden="true">*</span>
									</label>
									<input type="text" id="nombre" name="nombre" placeholder="Ej. Dr. Juan Pérez"
										required minlength="2" maxlength="100" autocomplete="name"
										aria-describedby="err-nombre" />
									<small class="error" id="err-nombre" role="alert"></small>
								</div>

								<div class="campo">
									<label for="tipo-cliente">
										Tipo de Establecimiento <span class="requerido" aria-hidden="true">*</span>
									</label>
									<select id="tipo-cliente" name="tipo_cliente" required aria-required="true">
										<option value="" disabled selected>Selecciona una opción</option>
										<option value="veterinaria">Veterinaria</option>
										<option value="hospital">Hospital Veterinario</option>
										<option value="tienda-mascotas">Tienda de Mascotas / Pet Shop</option>
										<option value="estetica">Estética Animal</option>
										<option value="distribuidor">Distribuidor</option>
										<option value="productor">Ganadero / Productor Pecuario</option>
										<option value="otro">Otro</option>
									</select>
									<small class="error" id="err-tipo-cliente" role="alert"></small>
								</div>

								<div class="campo-grupo">
									<div class="campo">
										<label for="email">
											Correo Electrónico <span class="requerido" aria-hidden="true">*</span>
										</label>
										<input type="email" id="email" name="email" placeholder="correo@ejemplo.com"
											required autocomplete="email" aria-describedby="err-email" />
										<small class="error" id="err-email" role="alert"></small>
									</div>

									<div class="campo">
										<label for="telefono">
											Teléfono de Contacto <span class="requerido" aria-hidden="true">*</span>
										</label>
										<input type="tel" id="telefono" name="telefono" placeholder="10 Dígitos"
											required aria-required="true" inputmode="numeric" pattern="\d{10}"
											maxlength="10" autocomplete="tel-national"
											aria-describedby="err-telefono" />
										<small class="error" id="err-telefono" role="alert"></small>
									</div>
								</div>

								<div class="campo">
									<label for="mensaje">
										¿En qué podemos ayudarte? <span class="requerido" aria-hidden="true">*</span>
									</label>
									<textarea id="mensaje" name="mensaje" rows="5"
										placeholder="Escribe aquí tu consulta o los productos requeridos..." required
										aria-required="true" minlength="10" maxlength="2000"
										aria-describedby="err-mensaje"></textarea>
									<small class="error" id="err-mensaje" role="alert"></small>
								</div>

								<div class="campo campo-checkbox">
									<!-- Checkbox de Privacidad Estilizado -->
									<div class="campo campo-checkbox">
										<input type="checkbox" id="privacidad" name="privacidad" required
											aria-required="true" value="1" />
										<label for="privacidad">
											Acepto el <a href="/politica-de-privacidad" target="_blank"
												rel="noopener noreferrer">Aviso de Privacidad</a>
											<span class="requerido" aria-hidden="true">*</span>
										</label>
										<small class="error" id="err-privacidad" role="alert"></small>
									</div>

									<!-- Botón de Envío -->
									<button type="submit" class="btn btn--correo">
										<svg class="btn__icon-correo" viewBox="0 0 24 24" width="20" height="20"
											fill="none" aria-hidden="true">
											<path
												d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
												stroke="#EA4335" stroke-width="2" stroke-linecap="round"
												stroke-linejoin="round" />
											<polyline points="22,6 12,13 2,6" stroke="#EA4335" stroke-width="2"
												stroke-linecap="round" stroke-linejoin="round" />
										</svg>
										<span>Enviar Mensaje <small>(Correo)</small></span>
									</button>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</section>
		<?php
		include 'includes/footer.php'
			?>
	</main>

	<script src="build/js/main.js"></script>
</body>

</html>