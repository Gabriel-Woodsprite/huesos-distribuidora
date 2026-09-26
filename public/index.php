<?php
require __DIR__ . '/../vendor/autoload.php';
$apiKey = getenv('RESEND_API_KEY');
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

	<title>Huesos Distribuidora</title>
</head>

<body>
	<header class="header-principal">

		<!-- Barra superior -->
		<div class="nav-contenedor">

			<div class="nav-bar">
				<a href="#inicio" class="logo">
					<span class="logo__nombre">HUESOS</span>
				</a>

				<button class="nav-toggle" aria-label="Abrir menú">☰</button>
			</div>

			<!-- Menú de navegación semántico -->
			<nav class="nav-menu" aria-label="Navegación principal">
				<div class="nav-menu__header">
					<button class="nav-close" aria-label="Cerrar menú">✕</button>
					<span class="nav-menu__title">Vet Huesos</span>
				</div>

				<ul class="nav-menu__list">
					<li><a href="#nosotros">Nosotros</a></li>
					<li><a href="#productos">Productos</a></li>
					<li><a href="#cobertura">Cobertura</a></li>
					<li><a href="#contacto">Contacto</a></li>
				</ul>

				<div class="nav-menu__socials">
					<ul class="redes-sociales">
						<li>
							<a href="https://www.facebook.com/share/1GnMrhfQb9/" target="_blank"
								rel="noopener noreferrer" aria-label="Facebook" class="red-social facebook">
								<svg viewBox="0 0 24 24" aria-hidden="true" class="icono-svg">
									<path
										d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
								</svg>
							</a>
						</li>
						<li>
							<a href="https://www.instagram.com/distribuidoravethuesos?igsh=Zno0d294Z2FpdTgz"
								target="_blank" rel="noopener noreferrer" aria-label="Instagram"
								class="red-social instagram">
								<svg viewBox="0 0 24 24" aria-hidden="true" class="icono-svg">
									<path
										d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
								</svg>
							</a>
						</li>
					</ul>
				</div>
			</nav>

		</div>

		<!-- Hero / Presentación -->
		<div class="hero">
			<div class="hero__contenido">
				<h1 class="nombre">HUESOS</h1>
				<span class="frase">Más que distribución</span>
				<p class="descripcion">
					Impulsamos la salud animal ofreciendo medicamentos de especialidad,
					suplementos y soluciones innovadoras con atención personalizada.
				</p>
				<a href="#contacto" class="btn-contactar">Contactar</a>
			</div>

			<picture class="hero__imagen">
				<source srcset="build/img/mascotas/hero.webp" type="image/webp">
				<img src="build/img/mascotas/hero.png" alt="imagen de prueba">
			</picture>
		</div>

	</header>
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
					<a href="#contacto" class="btn-leer-mas">Leer más &rarr;</a>
				</div>

				<!-- Columna Derecha: Mosaico en Desktop / Carrusel en Mobile -->
				<div class="nosotros-tarjetas">
					<div class="tarjeta tarjeta-imagen">
						<picture>
							<source srcset="build/img/mascotas/hero.webp" type="image/webp">
							<img src="build/img/mascotas/hero.png" alt="imagen de prueba" loading="lazy">
						</picture>
					</div>

					<div class="tarjeta tarjeta-destacada">
						<div class="tarjeta-item">
							<h3>Disponibilidad</h3>
							<p>Entrega oportuna de insumos y medicamentos clave.</p>
						</div>
						<div class="tarjeta-item">
							<h3>Respaldo</h3>
							<p>Atención y asesoría técnica personalizada.</p>
						</div>
					</div>

					<div class="tarjeta tarjeta-imagen">
						<picture>
							<source srcset="build/img/mascotas/hero.webp" type="image/webp">
							<img src="build/img/mascotas/hero.png" alt="imagen de prueba" loading="lazy">
						</picture>
					</div>
				</div>
			</div>
		</section>
		<section id="productos">
			<!-- PENDIENTE -->
		</section>
		<section id="cobertura">
			<!-- PENDIENTE -->
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
								<span class="icono" aria-hidden="true">&#128222;</span>
								<div>
									<strong>Teléfono / WhatsApp:</strong>
									<a href="tel:+527151461718" aria-label="Llamar al +52 715 146 1718">+52 715 146
										1718</a>
								</div>
							</div>

							<div class="contacto-item">
								<span class="icono" aria-hidden="true">&#128231;</span>
								<div>
									<strong>Correo Electrónico:</strong>
									<a href="mailto:distribuidorahuesos@gmail.com">distribuidorahuesos@gmail.com</a>
								</div>
							</div>
						</address>

						<!-- Botón de Acción WhatsApp -->
						<div class="whatsapp-accion">
							<a href="https://wa.me/527151461718?text=Hola,%20quisiera%20solicitar%20informaci%C3%B3n%20sobre%20sus%20productos%20y%20servicios."
								class="btn-whatsapp" target="_blank" rel="noopener noreferrer"
								aria-label="Contactar por WhatsApp">
								Enviar WhatsApp Directo
							</a>
						</div>
					</div>

					<!-- Columna Formulario de Contacto -->
					<div class="contacto-formulario-wrapper">
						<form action="contact.php" method="POST" class="formulario-contacto">
							<fieldset>
								<legend>Envíanos un mensaje</legend>

								<div class="campo">
									<label for="nombre">Nombre completo
										<span class="requerido" aria-hidden="true">*</span></label>
									<input type="text" id="nombre" name="nombre" placeholder="Ej. Dr. Juan Pérez"
										required aria-required="true" />
								</div>

								<div class="campo">
									<label for="empresa">Nombre de la Clínica o Empresa</label>
									<input type="text" id="empresa" name="empresa"
										placeholder="Ej. Clínica Veterinaria Huesos" />
								</div>

								<div class="campo">
									<label for="tipo-cliente">Tipo de Establecimiento
										<span class="requerido" aria-hidden="true">*</span></label>
									<select id="tipo-cliente" name="tipo_cliente" required aria-required="true">
										<option value="" disabled selected>
											Selecciona una opción
										</option>
										<option value="veterinaria">Veterinaria</option>
										<option value="hospital">Hospital Veterinario</option>
										<option value="tienda-mascotas">
											Tienda de Mascotas / Pet Shop
										</option>
										<option value="estetica">Estética Animal</option>
										<option value="distribuidor">Distribuidor</option>
										<option value="productor">
											Ganadero / Productor Pecuario
										</option>
										<option value="otro">Otro</option>
									</select>
								</div>

								<div class="campo-grupo">
									<div class="campo">
										<label for="email">Correo Electrónico
											<span class="requerido" aria-hidden="true">*</span></label>
										<input type="email" id="email" name="email" placeholder="correo@ejemplo.com"
											required aria-required="true" />
									</div>

									<div class="campo">
										<label for="telefono">Teléfono de Contacto
											<span class="requerido" aria-hidden="true">*</span></label>
										<input type="tel" id="telefono" name="telefono" placeholder="10 dígitos"
											required aria-required="true" />
									</div>
								</div>

								<div class="campo">
									<label for="mensaje">¿En qué podemos ayudarte?
										<span class="requerido" aria-hidden="true">*</span></label>
									<textarea id="mensaje" name="mensaje" rows="5"
										placeholder="Escribe aquí tu consulta o los productos requeridos..." required
										aria-required="true"></textarea>
								</div>

								<div class="campo campo-checkbox">
									<input type="checkbox" id="privacidad" name="privacidad" required
										aria-required="true" />
									<label for="privacidad">
										Acepto el
										<a href="/politica-de-privacidad" target="_blank"
											rel="noopener noreferrer">Aviso de Privacidad</a>
										<span class="requerido" aria-hidden="true">*</span>
									</label>
								</div>

								<input type="submit" class="btn-enviar" value="Envíar mensaje">
							</fieldset>
						</form>
					</div>
				</div>
			</div>
		</section>
	</main>
	<footer class="pie-pagina">
		<div class="footer-contenido">
			<!-- Columna 1: Marca e información de contacto -->
			<div class="footer-bloque">
				<h3>Huesos — Distribuidora Veterinaria</h3>
				<p>Aliados estratégicos en salud animal.</p>

				<address>
					<p>
						Email:
						<a href="mailto:distribuidorahuesos@gmail.com">distribuidorahuesos@gmail.com</a>
					</p>
					<p>Teléfono: <a href="tel:+527151461718">+52 715 146 1718</a></p>
				</address>
			</div>

			<!-- Columna 2: Navegación del sitio -->
			<nav aria-label="Navegación secundaria" class="footer-bloque">
				<h3>Menú</h3>
				<ul>
					<li><a href="#inicio">Inicio</a></li>
					<li><a href="#nosotros">Nosotros</a></li>
					<li><a href="#productos">Productos</a></li>
					<li><a href="#cobertura">Cobertura</a></li>
					<li><a href="#contacto">Contacto</a></li>
				</ul>
			</nav>

			<!-- Columna 3: Enlaces legales -->
			<nav class="footer-bloque" aria-label="Enlaces legales">
				<h3>Legal</h3>
				<ul>
					<li><a href="/politica-de-privacidad">Aviso de Privacidad</a></li>
					<li>
						<a href="/terminos-y-condiciones">Términos y Condiciones</a>
					</li>
					<li><a href="/cookies">Política de Cookies</a></li>
				</ul>
			</nav>

			<!-- Columna 4: Redes Sociales -->
			<div class="footer-bloque">
				<h3>Síguenos</h3>
				<ul class="redes-sociales">
					<li>
						<a href="https://www.facebook.com/share/1GnMrhfQb9/" target="_blank" rel="noopener noreferrer"
							aria-label="Síguenos en Facebook" class="red-social facebook">
							<svg viewBox="0 0 24 24" aria-hidden="true" class="icono-svg">
								<path
									d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
							</svg>
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/distribuidoravethuesos?igsh=Zno0d294Z2FpdTgz" target="_blank"
							rel="noopener noreferrer" aria-label="Síguenos en Instagram" class="red-social instagram">
							<svg viewBox="0 0 24 24" aria-hidden="true" class="icono-svg">
								<path
									d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
							</svg>
						</a>
					</li>
				</ul>
			</div>

			<!-- Pie inferior: Copyright -->
			<div class="footer-copyright">
				<small>&copy; 2026 Huesos — Distribuidora Veterinaria. Todos los derechos
					reservados.</small>
			</div>
	</footer>
	<script src="build/js/app.js"></script>
</body>

</html>