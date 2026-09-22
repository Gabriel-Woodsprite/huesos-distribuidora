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
	<meta
		name="description"
		content="Página Web Corporativa de Huesos, Distribuidora, empresa dedicada a la distribución de productos veterinarios." />

	<!-- css  -->
	<link rel="stylesheet" href="public/build/css/app.css" />

	<title>Huesos Distribuidora</title>
</head>

<body>
	<header class="header-principal">
		<!-- Barra de navegación con Logo -->
		<div class="nav-contenedor">
			<!-- Logo SVG con enlace al inicio -->
			<a href="#inicio" class="logo">
				<img src="" alt="Huesos — Distribuidora Veterinaria" />
			</a>

			<!-- Menú de navegación semántico -->
			<nav aria-label="Navegación principal">
				<ul>
					<li><a href="#inicio">Inicio</a></li>
					<li><a href="#nosotros">Nosotros</a></li>
					<li><a href="#productos">Productos</a></li>
					<li><a href="#cobertura">Cobertura</a></li>
					<li><a href="#contacto">Contacto</a></li>
				</ul>
			</nav>
		</div>

		<!-- Banner Hero / Presentación Principal -->
		<div class="hero">
			<h1>Huesos — Distribuidora Veterinaria</h1>
			<p class="lema">
				Más que distribución, el aliado estratégico de tu práctica
				veterinaria.
			</p>
			<p class="descripcion">
				Impulsamos la salud animal ofreciendo medicamentos de especialidad,
				suplementos y soluciones innovadoras con atención personalizada,
				disponibilidad oportuna y el respaldo cercano que tu clínica u
				hospital necesita.
			</p>
			<a href="#contacto" class="btn-hero">Contactar</a>
		</div>
	</header>
	<main>
		<section id="nosotros" class="seccion-nosotros">
			<!-- PARTE SUPERIOR -->
			<div class="nosotros-banner">
				<picture>
					<source
						srcset="public/build/img/macotas/dog3-sf.webp"
						type="image/webp" />
					<source
						srcset="public/build/img/macotas/dog3-sf.png"
						type="image/png" />
					<img
						loading="lazy"
						src="public/build/img/macotas/dog3-sf.png"
						alt="Cachorro de labrador dorado acostado con un collar rojo" />
				</picture>
				<blockquote class="nosotros-frase">
					<p>
						"Su bienestar es nuestra mayor inspiración; su salud, nuestro
						compromiso diario."
					</p>
				</blockquote>
			</div>

			<!-- PARTE INFERIOR -->
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
					<a href="#" class="btn-leer-mas">Leer más &rarr;</a>
				</div>

				<!-- Columna Derecha: Mosaico de Tarjetas -->
				<div class="nosotros-tarjetas">
					<div class="tarjeta tarjeta-imagen">
						<img
							src=""
							alt="Perro peludo café claro asomándose en una mesa" />
					</div>

					<div class="tarjeta tarjeta-destacada">
						<div class="tarjeta-item">
							<h3>Titulo</h3>
							<p>Info</p>
						</div>
						<div class="tarjeta-item">
							<h3>Titulo</h3>
							<p>Info</p>
						</div>
					</div>

					<div class="tarjeta tarjeta-imagen">
						<img
							src=""
							alt="Perro de pelaje esponjoso blanco y café posando sobre un fondo azul claro" />
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
									<a
										href="tel:+527151461718"
										aria-label="Llamar al +52 715 146 1718">+52 715 146 1718</a>
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
							<a
								href="https://wa.me/527151461718?text=Hola,%20quisiera%20solicitar%20informaci%C3%B3n%20sobre%20sus%20productos%20y%20servicios."
								class="btn-whatsapp"
								target="_blank"
								rel="noopener noreferrer"
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
									<input
										type="text"
										id="nombre"
										name="nombre"
										placeholder="Ej. Dr. Juan Pérez"
										required
										aria-required="true" />
								</div>

								<div class="campo">
									<label for="empresa">Nombre de la Clínica o Empresa</label>
									<input
										type="text"
										id="empresa"
										name="empresa"
										placeholder="Ej. Clínica Veterinaria Huesos" />
								</div>

								<div class="campo">
									<label for="tipo-cliente">Tipo de Establecimiento
										<span class="requerido" aria-hidden="true">*</span></label>
									<select
										id="tipo-cliente"
										name="tipo_cliente"
										required
										aria-required="true">
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
										<input
											type="email"
											id="email"
											name="email"
											placeholder="correo@ejemplo.com"
											required
											aria-required="true" />
									</div>

									<div class="campo">
										<label for="telefono">Teléfono de Contacto
											<span class="requerido" aria-hidden="true">*</span></label>
										<input
											type="tel"
											id="telefono"
											name="telefono"
											placeholder="10 dígitos"
											required
											aria-required="true" />
									</div>
								</div>

								<div class="campo">
									<label for="mensaje">¿En qué podemos ayudarte?
										<span class="requerido" aria-hidden="true">*</span></label>
									<textarea
										id="mensaje"
										name="mensaje"
										rows="5"
										placeholder="Escribe aquí tu consulta o los productos requeridos..."
										required
										aria-required="true"></textarea>
								</div>

								<div class="campo campo-checkbox">
									<input
										type="checkbox"
										id="privacidad"
										name="privacidad"
										required
										aria-required="true" />
									<label for="privacidad">
										Acepto el
										<a
											href="/politica-de-privacidad"
											target="_blank"
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
						<a
							href="https://www.facebook.com/share/1GnMrhfQb9/"
							target="_blank"
							rel="noopener noreferrer">Facebook</a>
					</li>
					<li>
						<a
							href="https://www.instagram.com/distribuidoravethuesos?igsh=Zno0d294Z2FpdTgz"
							target="_blank"
							rel="noopener noreferrer">Instagram</a>
					</li>
				</ul>
			</div>
		</div>

		<!-- Pie inferior: Copyright -->
		<div class="footer-copyright">
			<small>&copy; 2026 Huesos — Distribuidora Veterinaria. Todos los derechos
				reservados.</small>
		</div>
	</footer>
	<script src="public/build/js/app.js"></script>
</body>

</html>