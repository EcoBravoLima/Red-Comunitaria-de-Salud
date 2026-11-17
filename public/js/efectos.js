// ==========================================================================
// ACTIVIDAD 17: JAVASCRIPT - EFECTOS Y TRANSICIONES CON EVENTOS DEL MOUSE
// Proyecto: Red Comunitaria de Salud
// Archivo: public/js/efectos.js
// Descripción: Implementación de efectos, transiciones y animaciones de
// Tailwind CSS desde cero con JavaScript mediante mouseover, mouseout,
// getElementById, getElementsByClassName, addEventListener y classList.
// ==========================================================================

// --------------------------------------------------------------------------
// 1. ENLACE A COMPONENTES MEDIANTE ById
// Obtenemos los elementos principales del banner y la barra de herramientas
// --------------------------------------------------------------------------
let bannerDestacado = document.getElementById("banner-destacado");
let bannerInsignia = document.getElementById("banner-insignia");
let bannerCajaImagen = document.getElementById("banner-caja-imagen");

let botonLimpiarEfecto = document.getElementById("btn-limpiar");
let iconoLimpiar = document.getElementById("icono-limpiar");
let contadorEfecto = document.getElementById("contador-resultados");

// --------------------------------------------------------------------------
// 2. ENLACE A DIVISIONES MEDIANTE ClassName
// Obtenemos las colecciones de tarjetas, cajas de imagen y sugerencias
// --------------------------------------------------------------------------
let tarjetasCatalogo = document.getElementsByClassName("tarjeta-catalogo");
let cajasImagen = document.getElementsByClassName("caja-imagen");
let botonesSugerencia = document.getElementsByClassName("btn-sugerencia");

// --------------------------------------------------------------------------
// 3. FUNCIONES EXPLÍCITAS PARA EL BANNER DESTACADO (EFECTO 1)
// Transición de gradiente, desplazamiento vertical, pulso e inclinación
// --------------------------------------------------------------------------

// Función explícita para mouseover en el banner principal
function activarEfectoBanner() {
    bannerDestacado.classList.remove("from-amber-500", "via-amber-600", "to-orange-600", "shadow-xl");
    bannerDestacado.classList.add("from-brand-600", "via-brand-700", "to-brand-900", "shadow-2xl", "ring-4", "ring-accent-500", "-translate-y-1");

    if (bannerInsignia) {
        bannerInsignia.classList.remove("bg-black/25");
        bannerInsignia.classList.add("bg-accent-500", "animate-pulse", "translate-x-2");
    }

    if (bannerCajaImagen) {
        bannerCajaImagen.classList.add("scale-105", "rotate-1");
    }
}

// Función explícita para mouseout en el banner principal
function desactivarEfectoBanner(evento) {
    if (evento.relatedTarget && bannerDestacado.contains(evento.relatedTarget)) {
        return;
    }

    bannerDestacado.classList.remove("from-brand-600", "via-brand-700", "to-brand-900", "shadow-2xl", "ring-4", "ring-accent-500", "-translate-y-1");
    bannerDestacado.classList.add("from-amber-500", "via-amber-600", "to-orange-600", "shadow-xl");

    if (bannerInsignia) {
        bannerInsignia.classList.remove("bg-accent-500", "animate-pulse", "translate-x-2");
        bannerInsignia.classList.add("bg-black/25");
    }

    if (bannerCajaImagen) {
        bannerCajaImagen.classList.remove("scale-105", "rotate-1");
    }
}

// --------------------------------------------------------------------------
// 4. FUNCIONES EXPLÍCITAS PARA LAS TARJETAS DEL CATÁLOGO (EFECTO 2)
// Elevación, anillo de enfoque, cambio de fondo/borde y acento en el pie
// --------------------------------------------------------------------------

// Función explícita para mouseover en cada tarjeta
function activarEfectoTarjeta(evento) {
    let tarjeta = evento.currentTarget;

    tarjeta.classList.remove("bg-white", "border-slate-200", "shadow-sm");
    tarjeta.classList.add("bg-brand-50", "border-brand-500", "-translate-y-2", "ring-4", "ring-brand-200", "shadow-xl");

    // Modificamos también el div del título y el div del pie de la tarjeta
    let titulo = tarjeta.getElementsByClassName("titulo-tarjeta")[0];
    if (titulo) {
        titulo.classList.remove("text-slate-900");
        titulo.classList.add("text-brand-700");
    }

    let pieTarjeta = tarjeta.getElementsByClassName("pie-tarjeta")[0];
    if (pieTarjeta) {
        pieTarjeta.classList.remove("border-slate-100");
        pieTarjeta.classList.add("border-brand-200", "bg-brand-100/70");
    }
}

// Función explícita para mouseout en cada tarjeta
function desactivarEfectoTarjeta(evento) {
    let tarjeta = evento.currentTarget;

    if (evento.relatedTarget && tarjeta.contains(evento.relatedTarget)) {
        return;
    }

    tarjeta.classList.remove("bg-brand-50", "border-brand-500", "-translate-y-2", "ring-4", "ring-brand-200", "shadow-xl");
    tarjeta.classList.add("bg-white", "border-slate-200", "shadow-sm");

    let titulo = tarjeta.getElementsByClassName("titulo-tarjeta")[0];
    if (titulo) {
        titulo.classList.remove("text-brand-700");
        titulo.classList.add("text-slate-900");
    }

    let pieTarjeta = tarjeta.getElementsByClassName("pie-tarjeta")[0];
    if (pieTarjeta) {
        pieTarjeta.classList.remove("border-brand-200", "bg-brand-100/70");
        pieTarjeta.classList.add("border-slate-100");
    }
}

// --------------------------------------------------------------------------
// 5. FUNCIONES EXPLÍCITAS PARA LAS DIVISIONES DE IMAGEN (EFECTO 3)
// Inclinación + zoom en imagen, borde inferior y animación bounce en etiqueta
// --------------------------------------------------------------------------

// Función explícita para mouseover en la división de imagen (div.caja-imagen)
function activarEfectoCajaImagen(evento) {
    let cajaImagen = evento.currentTarget;

    cajaImagen.classList.remove("border-transparent");
    cajaImagen.classList.add("border-accent-500", "brightness-110");

    let imagen = cajaImagen.getElementsByClassName("imagen-tarjeta")[0];
    if (imagen) {
        imagen.classList.add("scale-110", "-rotate-2");
    }

    let etiqueta = cajaImagen.getElementsByClassName("etiqueta-categoria")[0];
    if (etiqueta) {
        etiqueta.classList.add("animate-bounce", "-translate-x-1", "scale-105");
    }
}

// Función explícita para mouseout en la división de imagen (div.caja-imagen)
function desactivarEfectoCajaImagen(evento) {
    let cajaImagen = evento.currentTarget;

    if (evento.relatedTarget && cajaImagen.contains(evento.relatedTarget)) {
        return;
    }

    cajaImagen.classList.remove("border-accent-500", "brightness-110");
    cajaImagen.classList.add("border-transparent");

    let imagen = cajaImagen.getElementsByClassName("imagen-tarjeta")[0];
    if (imagen) {
        imagen.classList.remove("scale-110", "-rotate-2");
    }

    let etiqueta = cajaImagen.getElementsByClassName("etiqueta-categoria")[0];
    if (etiqueta) {
        etiqueta.classList.remove("animate-bounce", "-translate-x-1", "scale-105");
    }
}

// --------------------------------------------------------------------------
// 6. FUNCIONES EXPLÍCITAS PARA CONTROLES DEL BUSCADOR (EFECTO 4)
// Rotación de ícono 180°, escalado, cambio de color y elevación en pills
// --------------------------------------------------------------------------

// Función explícita para mouseover en el botón Limpiar
function activarEfectoBotonLimpiar() {
    botonLimpiarEfecto.classList.remove("bg-slate-800", "border-slate-600");
    botonLimpiarEfecto.classList.add("bg-accent-500", "border-white", "scale-105", "shadow-lg");

    if (iconoLimpiar) {
        iconoLimpiar.classList.add("-rotate-180");
    }
}

// Función explícita para mouseout en el botón Limpiar
function desactivarEfectoBotonLimpiar(evento) {
    if (evento.relatedTarget && botonLimpiarEfecto.contains(evento.relatedTarget)) {
        return;
    }

    botonLimpiarEfecto.classList.remove("bg-accent-500", "border-white", "scale-105", "shadow-lg");
    botonLimpiarEfecto.classList.add("bg-slate-800", "border-slate-600");

    if (iconoLimpiar) {
        iconoLimpiar.classList.remove("-rotate-180");
    }
}

// Función explícita para mouseover en el contador de resultados
function activarEfectoContador() {
    contadorEfecto.classList.remove("bg-white/10", "border-white/20");
    contadorEfecto.classList.add("bg-emerald-600", "border-emerald-300", "scale-105", "ring-2", "ring-emerald-300");
}

// Función explícita para mouseout en el contador de resultados
function desactivarEfectoContador(evento) {
    if (evento.relatedTarget && contadorEfecto.contains(evento.relatedTarget)) {
        return;
    }

    contadorEfecto.classList.remove("bg-emerald-600", "border-emerald-300", "scale-105", "ring-2", "ring-emerald-300");
    contadorEfecto.classList.add("bg-white/10", "border-white/20");
}

// Función explícita para mouseover en cada botón de sugerencia rápida
function activarEfectoSugerencia(evento) {
    let boton = evento.currentTarget;
    boton.classList.remove("bg-white/10", "text-slate-200");
    boton.classList.add("bg-accent-500", "text-white", "-translate-y-1", "scale-105", "shadow-md");
}

// Función explícita para mouseout en cada botón de sugerencia rápida
function desactivarEfectoSugerencia(evento) {
    let boton = evento.currentTarget;
    boton.classList.remove("bg-accent-500", "text-white", "-translate-y-1", "scale-105", "shadow-md");
    boton.classList.add("bg-white/10", "text-slate-200");
}

// --------------------------------------------------------------------------
// 7. AGREGAR EVENTOS MEDIANTE addEventListener (mouseover y mouseout)
// --------------------------------------------------------------------------

// Eventos del Banner Destacado (enlazado por ById)
if (bannerDestacado) {
    bannerDestacado.addEventListener("mouseover", activarEfectoBanner);
    bannerDestacado.addEventListener("mouseout", desactivarEfectoBanner);
}

// Eventos del Botón Limpiar (enlazado por ById)
if (botonLimpiarEfecto) {
    botonLimpiarEfecto.addEventListener("mouseover", activarEfectoBotonLimpiar);
    botonLimpiarEfecto.addEventListener("mouseout", desactivarEfectoBotonLimpiar);
}

// Eventos del Contador de Resultados (enlazado por ById)
if (contadorEfecto) {
    contadorEfecto.addEventListener("mouseover", activarEfectoContador);
    contadorEfecto.addEventListener("mouseout", desactivarEfectoContador);
}

// Eventos de las Tarjetas del Catálogo (enlazadas por ClassName)
for (let i = 0; i < tarjetasCatalogo.length; i++) {
    tarjetasCatalogo[i].addEventListener("mouseover", activarEfectoTarjeta);
    tarjetasCatalogo[i].addEventListener("mouseout", desactivarEfectoTarjeta);
}

// Eventos de las Divisiones de Imagen (enlazadas por ClassName)
for (let i = 0; i < cajasImagen.length; i++) {
    cajasImagen[i].addEventListener("mouseover", activarEfectoCajaImagen);
    cajasImagen[i].addEventListener("mouseout", desactivarEfectoCajaImagen);
}

// Eventos de las Sugerencias Rápidas (enlazadas por ClassName)
for (let i = 0; i < botonesSugerencia.length; i++) {
    botonesSugerencia[i].addEventListener("mouseover", activarEfectoSugerencia);
    botonesSugerencia[i].addEventListener("mouseout", desactivarEfectoSugerencia);
}
