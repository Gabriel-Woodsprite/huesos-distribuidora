	<?php
	session_start([
		'cookie_httponly' => true,
		'cookie_samesite' => 'Lax',
		'cookie_secure'   => !empty($_SERVER['HTTPS']),
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
			<section id="productos" class="productos-section">
				<div class="container">

					<!-- 1. Encabezado de la Sección -->
					<div class="section-title text-center">
						<h2>Nuestras Líneas de Productos</h2>
						<p>Distribución mayorista de insumos veterinarios, medicamentos y equipamiento para clínicas,
							hospitales y tiendas especializadas.</p>
					</div>

					<!-- 2. Categorías / Líneas Principales -->
					<div class="categories-grid">
						<div class="category-card">
							<div class="category-icon"><!-- Icono Farmacéutico --></div>
							<h3>Farmacéuticos y Biológicos</h3>
							<p>Vacunas, antibióticos, anestésicos, antiparasitarios y tratamientos dermatológicos de uso
								clínico.</p>
						</div>

						<div class="category-card">
							<div class="category-icon"><!-- Icono Nutrición --></div>
							<h3>Nutrición y Suplementos</h3>
							<p>Alimento especializado, premios funcionales, suplementos vitamínicos y reguladores de salud
								animal.</p>
						</div>

						<div class="category-card">
							<div class="category-icon"><!-- Icono Diagnóstico/Equipo --></div>
							<h3>Equipo Médico y Diagnóstico</h3>
							<p>Pruebas rápidas de diagnóstico, reactivos de laboratorio, material quirúrgico y accesorios de
								manejo.</p>
						</div>
					</div>

					<!-- 3. Laboratorios / Marcas Destacadas -->
					<div class="brands-wrapper text-center">
						<h3>Laboratorios y Marcas con las que Trabajamos</h3>
						<p>Contamos con el respaldo de marcas líderes en el sector veterinario:</p>

						<div class="brands-grid">
							<!-- Puedes colocar los logos o nombres de las marcas clave del inventario -->
							<span class="brand-item">Zoetis</span>
							<span class="brand-item">Mindray</span>
							<span class="brand-item">Virbac</span>
							<span class="brand-item">Holliday</span>
							<span class="brand-item">Waggys</span>
							<span class="brand-item">Back 2 Nature</span>
							<span class="brand-item">Liceaga</span>
						</div>
					</div>

					<!-- 4. Descarga de Catálogo y Cotización (CTA) -->
					<div class="catalog-cta text-center">
						<h3>¿Deseas consultar la lista completa de precios o un producto en específico?</h3>
						<p>Descarga nuestro catálogo actualizado o ponte en contacto directo con uno de nuestros asesores.
						</p>
						<div class="cta-buttons">
							<a href="docs/catalogo-distribuidora-huesos.pdf" class="btn btn-primary" download
								target="_blank">
								Descargar Catálogo PDF
							</a>
							<a href="https://wa.me/527151461718" class="btn btn-success" target="_blank">
								Cotizar por WhatsApp
							</a>
						</div>
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

					<!-- Contenido Principal (Tarjetas + Mapa) -->
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

							<!-- Botón de Acción -->
							<div class="cobertura-cta">
								<a href="https://wa.me/527151461718?text=Hola,%20quisiera%20consultar%20la%20cobertura%20y%20tiempos%20de%20entrega%20en%20mi%20zona"
									target="_blank" rel="noopener noreferrer" class="btn-whatsapp">
									<svg class="icono-svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
										<path
											d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981z" />
									</svg>
									Consultar cobertura de mi ciudad
								</a>
							</div>

						</div>

						<!-- Mapa de Cobertura / Ubicación -->
						<div class="cobertura-mapa">
							<h3>Mapa de Distribución y Ubicación</h3>
							<div class="mapa-contenedor">
								<iframe
									src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.63!2d-100.35!3d19.43!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTnvsDE1JzQ4LjAiTiAxMDDCsDIxJzAwLjAiVw!5e0!3m2!1ses-419!2smx!4v1600000000000!5m2!1es-419!2smx"
									width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
									title="Mapa de Cobertura Distribuidora Veterinaria Huesos">
								</iframe>
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
									<!-- <span class="icono" aria-hidden="true">&#128222;</span> -->
									<div>
										<strong>Teléfono / WhatsApp:</strong>
										<a href="tel:+527151461718" aria-label="Llamar al +52 715 146 1718">+52 715 146
											1718</a>
									</div>
								</div>

								<div class="contacto-item">
									<!-- <span class="icono" aria-hidden="true">&#128231;</span> -->
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
							<form action="contact.php" method="POST" class="formulario-contacto" id="formulario-contacto" novalidate>
								<!-- INPUTS PARA TOKENS -->
								<input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf, ENT_QUOTES) ?>"> <!-- BACKEND -->
								<input type="hidden" name="form_ts" value="<?= (int) (microtime(true) * 1000) ?>"> <!-- BACKEND -->

								<!-- H O N E Y P O T -->
								<div class="hp-field" aria-hidden="true">
									<label for="website">No Rellenar</label>
									<input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
								</div>

								<!-- F I E L D S E T -->
								<fieldset>
									<legend>Envíanos un mensaje</legend>

									<div class="campo">
										<label for="nombre">
											Nombre completo
											<span class="requerido" aria-hidden="true">*</span>
										</label>
										<input
											type="text"
											id="nombre"
											name="nombre"
											placeholder="Ej. Dr. Juan Pérez"
											required
											minlength="70"
											maxlength="100"
											autocomplete="name"
											aria-describedby="err-nombre"
											value="Gabriel Algo" />
										<!-- NUEVO ELEMENTO SMALL PARA MOSTRAR ERRORES -->
										<small class="error" id="err-nombre" role="alert"></small>
									</div>

									<div class="campo">
										<label for="tipo-cliente">
											Tipo de Establecimiento
											<span class="requerido" aria-hidden="true">*</span>
										</label>
										<select
											id="tipo-cliente"
											name="tipo_cliente"
											required
											aria-required="true">
											<option value="" disabled selected>
												Selecciona una opción
											</option>
											<option value="veterinaria" selected>Veterinaria</option>
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
										<small class="error" id="err-tipo-cliente" role="alert">
										</small>
									</div>

									<div class="campo-grupo">
										<div class="campo">
											<label for="email">
												Correo Electrónico
												<span class="requerido" aria-hidden="true">*</span>
											</label>
											<input
												type="email"
												id="email"
												name="email"
												placeholder="correo@ejemplo.com"
												required
												autocomplete="email"
												aria-describedby="err-email"
												value="l23650343@zitacuaro.tecnm.mx" />
											<small class="error" id="err-email" role="alert">
											</small>
										</div>

										<div class="campo">
											<label for="telefono">
												Teléfono de Contacto
												<span class="requerido" aria-hidden="true">*</span>
											</label>
											<input
												type="tel"
												id="telefono"
												name="telefono"
												placeholder="10 Digitos"
												required
												aria-required="true"
												inputmode="numeric"
												pattern="\d{10}"
												maxlength="10"
												autocomplete="tel-national"
												aria-describedby="err-telefono"
												value="1234567890" />
											<small class="error" id="err-telefono" role="alert">
											</small>
										</div>
									</div>

									<div class="campo">
										<label for="mensaje">
											¿En qué podemos ayudarte?
											<span class="requerido" aria-hidden="true">*</span>
										</label>
										<textarea
											id="mensaje"
											name="mensaje"
											rows="5"
											placeholder="Escribe aquí tu consulta o los productos requeridos..."
											required
											aria-required="true"
											minlength="200"
											maxlength="2000"
											autocomplete="mensaje"
											aria-describedby="err-mensaje">lskdfj alsdkfjlsakffla lsadkflsd</textarea>
										<small class="error" id="err-mensaje" role="alert">
										</small>
									</div>

									<div class="campo campo-checkbox">
										<input
											type="checkbox"
											id="privacidad"
											name="privacidad"
											required
											aria-required="true"
											aria-describedby="privacidad"
											value="" />
										<label for="privacidad">
											Acepto el
											<a href="/politica-de-privacidad" target="_blank"
												rel="noopener noreferrer">Aviso de Privacidad</a>
											<span class="requerido" aria-hidden="true">*</span>
										</label>
										<small class="error" id="err-privacidad" role="alert">
										</small>
									</div>

									<input type="submit" class="btn-enviar" value="Envíar mensaje">
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