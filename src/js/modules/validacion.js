export function validacion() {
	"use strict";
	const form = document.getElementById("formulario-contacto");
	if (!form) return; // Patron EARLY RETURN, previene recorrer un if verboso y sale inmediatamente si existe un error

	const rules = {
		// Define un objeto con las reglas que utilizará cada campo que requiera validación
		nombre: { required: true, min: 5, max: 100, label: "nombre" },
		tipo_cliente: { required: true, label: "tipo de establecimiento" },
		email: { required: true, type: "email", label: "correo" },
		telefono: { required: true, pattern: /^\d{10}$/, label: "teléfono" },
		mensaje: { required: true, min: 10, max: 5000, label: "mensaje" },
		privacidad: {
			required: true,
			type: "checkbox",
			label: "aviso de privacidad",
		},
	};

	const setError = (field, msg = "") => {
		const el = form.querySelector(`[name="${field}"]`); // Busqueda por atributo name dentro del form
		if (!el) return; // early return

		// Selecciona el contenedor de error
		const box =
			document.getElementById(`err-${field}`) || // Busca un elemento con id "err-${field}"
			el.closest(".campo")?.querySelector(".error"); // Si no lo encuentra, busca el hijo .error del padre más cercano .campo

		// Asigna texto
		if (box) box.textContent = msg;
		el.setAttribute("aria-invalid", msg ? "true" : "false"); // Indicador para leectores de pantalla que existen errores

		// Asigna y quita clase campo--error (al contenedor) evaluando si existe o no un mensaje asignado (!!'': false, !!'txt': true)
		el.closest(".campo")?.classList.toggle("campo--error", !!msg);
	};

	const validateField = name => {
		const emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]{2,}$/;
		const r = rules[name];
		if (!r) return true; // Si el campo no existe, website honeypot devuelve true sin validar ???????????????????

		const el = form.querySelector(`[name="${name}"]`);
		if (!el) return true; // Si no existe, sale devolviendo true y no falla

		let value = r.type === "checkbox" ? el.checked : el.value.trim(); // Si checkbox --> estado; sino --> STR (sin espacios en blanco con .trim())

		// PRIMER VALIDACIÓN: Verifica que un elemento requerido esté lleno o marcado
		if (r.required && (value === "" || value === false)) {
			setError(name, `El ${r.label} es obligatorio`);
			return false; // Corta para dejar de validar
		}

		// VALIDACIÓN DE FORMATOS: Formato de correo valido o invalido
		if (r.type === "email" && !emailRe.test(value)) {
			setError(name, `Correo electronico invalido`);
			return false;
		}

		// VALIDACIÓN DE PATRÓN: Si existe r.pattern y el patrón es incorrecto
		if (r.pattern && !r.pattern.test(value)) {
			setError(name, `Formato de telefono incorrecto`);
			return false;
		}

		// VALIDACIÓN DE LONGITUDES
		if (r.min && value.length < r.min) {
			setError(name, `Minimo ${r.min} caracteres`);
			return false;
		}
		if (r.max && value.length > r.max) {
			setError(name, `Maximo ${r.max} caracteres`);
			return false;
		}

		setError(name, ""); // Llegado a este punto significa que no hay errores
		return true;
	};

	// RECORRIDO EN TIEMPO REAL
	// Devuelve un NodeList con los elementos seleccionados
	form.querySelectorAll("input, select, textarea").forEach(el => {
		el.addEventListener("blur", () => validateField(el.name)); // Valida elemento cuando se pierde el foco
		el.addEventListener("input", () => {
			// Validación en vivo (Cuando ya existe el error)
			if (el.getAttribute("aria-invalid") === "true") validateField(el.name);
		});
	});

	form.addEventListener("submit", async e => {
		e.preventDefault(); // Evita recargar la pagina para controlar lo que sucede después del submit

		const campos = Object.keys(rules); // Devuelve el nombre de nuestro objeto Rules
		const ok = campos.map(validateField).every(Boolean); // campos.map -> Aplica validación sobre cada elemento
		// .every(Boolean) -> devuelve true solo si todos los elementos son true

		if (!ok) {
			// Si algo falla, el DOM se enfoca en el campo con aria-invalid=true
			form.querySelector('[aria-invalid="true"]')?.focus();
			return; // Sale sin enviar
		}

		// Si todo está correcto, cambia el estado del boton
		const btn = form.querySelector(".btn-enviar");
		const original = btn.value;
		btn.disabled = true;
		btn.value = "Enviando...";

		try {
			// Fetch al action de form (contact.php)
			const res = await fetch(form.action, {
				method: "POST", // Se envía por POST
				body: new FormData(form), // Construye un _payload_ con todos los campos (campos normales, csrf_token, form_ts, website (honeypot))
				headers: {
					Accept: "application/json", // Hacemos saber que necesitamos json
					"X-Requested-With": "XMLHttpRequest", // Identifica que es AJAX
				},
			});

			const data = await res
				.json()
				.catch(() => ({ ok: false, errors: ["Invalid Server Response"] }));

			if (res.ok && data.ok) {
				// Si se devuelve ok como respuesta y dentro del JSON, se redirecciona
				window.location.href = data.redirect || "/gracias.php";
				return;
			}

			// Si nuestro json tiene .errors tipo object
			if (data.errors && typeof data.errors === "object") {
				Object.entries(data.errors).forEach(
					(
						[campo, msg], // Itera sobre un Object.etries de nuestros errores
					) => setError(campo, msg), // Aplica error en cada campo (Porque devuelve los campos CON error)
				);
				form.querySelector('[aria-invalid="true"]')?.focus();
			} else {
				alert(data.errors?.[0] || "Error al envíar. Intenta de nuevo");
			}
		} catch (error) {
			console.error(err);
			alert("No pudimos conectar con el servidor. Revisa tu conexión");
		} finally {
			btn.disabled = false;
			btn.value = original;
		}
	});
}
