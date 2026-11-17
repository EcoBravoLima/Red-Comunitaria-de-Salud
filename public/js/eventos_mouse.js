// ==========================================================================
// ACTIVIDAD 16: JAVASCRIPT - EVENTOS DEL MOUSE (mouseover / mouseout)
// Proyecto: Red Comunitaria de Salud
// Archivo: public/js/eventos_mouse.js
// Descripción: Implementación desde cero de eventos mouseover y mouseout
// con getElementById, getElementsByClassName, addEventListener y classList
// para resaltar cada producto cambiando borde, sombra, redondeado y escala (+5%).
// ==========================================================================

// --------------------------------------------------------------------------
// 1. ENLACE A COMPONENTES MEDIANTE ById
// Obtenemos los elementos principales por su identificador único
// --------------------------------------------------------------------------
let catalogoProductos = document.getElementById("catalogo-productos");
let productoDestacado = document.getElementById("producto-destacado");
let indicadorActivo = document.getElementById("indicador-producto-activo");

// --------------------------------------------------------------------------
// 2. ENLACE A DIVISIONES MEDIANTE ClassName
// Obtenemos todas las tarjetas de productos usando su clase común
// --------------------------------------------------------------------------
let tarjetasProductos = document.getElementsByClassName("tarjeta-producto");

// --------------------------------------------------------------------------
// 3. FUNCIONES AUXILIARES PARA EL INDICADOR VISUAL (ById + classList)
// --------------------------------------------------------------------------
function mostrarProductoEnIndicador(elemento) {
    if (!indicadorActivo) {
        return;
    }

    let nombreProducto = elemento.getAttribute("data-nombre");
    indicadorActivo.classList.remove("bg-white/10", "border-white/20");
    indicadorActivo.classList.add("bg-red-600", "border-red-300", "shadow-lg");
    indicadorActivo.textContent = "Resaltando: " + (nombreProducto ? nombreProducto : "Producto seleccionado");
}

function limpiarIndicador() {
    if (!indicadorActivo) {
        return;
    }

    indicadorActivo.classList.remove("bg-red-600", "border-red-300", "shadow-lg");
    indicadorActivo.classList.add("bg-white/10", "border-white/20");
    indicadorActivo.textContent = "Pasa el mouse sobre un producto";
}

// --------------------------------------------------------------------------
// 4. FUNCIONES EXPLÍCITAS PARA EL PRODUCTO DESTACADO (ENLAZADO POR ById)
// Aplica: 1) cambio de borde, 2) sombra, 3) esquinas más redondeadas, 4) +5% tamaño
// --------------------------------------------------------------------------

// Función explícita para mouseover en #producto-destacado
function resaltarProductoDestacado() {
    // 1. Cambiar el color del borde
    productoDestacado.classList.remove("border-transparent");
    productoDestacado.classList.add("border-red-500");

    // 2. Aplicar sombra tenue / resaltado
    productoDestacado.classList.remove("shadow-sm");
    productoDestacado.classList.add("shadow-2xl");

    // 3. Redondear más las esquinas (de rounded-lg a rounded-3xl)
    productoDestacado.classList.remove("rounded-lg");
    productoDestacado.classList.add("rounded-3xl");

    // 4. Incrementar el tamaño en 5% (scale-105 = transform: scale(1.05))
    productoDestacado.classList.add("scale-105", "relative", "z-10");

    mostrarProductoEnIndicador(productoDestacado);
}

// Función explícita para mouseout en #producto-destacado
function restaurarProductoDestacado(evento) {
    // Evitar que los elementos hijos disparen un mouseout falso dentro del mismo div
    if (evento.relatedTarget && productoDestacado.contains(evento.relatedTarget)) {
        return;
    }

    // 1. Restaurar borde original
    productoDestacado.classList.remove("border-red-500");
    productoDestacado.classList.add("border-transparent");

    // 2. Restaurar sombra original
    productoDestacado.classList.remove("shadow-2xl");
    productoDestacado.classList.add("shadow-sm");

    // 3. Restaurar esquinas originales
    productoDestacado.classList.remove("rounded-3xl");
    productoDestacado.classList.add("rounded-lg");

    // 4. Restaurar tamaño normal (100%)
    productoDestacado.classList.remove("scale-105", "relative", "z-10");

    limpiarIndicador();
}

// --------------------------------------------------------------------------
// 5. FUNCIONES EXPLÍCITAS PARA LAS TARJETAS DEL CATÁLOGO (ClassName)
// Aplica: 1) cambio de borde, 2) sombra, 3) esquinas más redondeadas, 4) +5% tamaño
// --------------------------------------------------------------------------

// Función explícita para mouseover en cada división del catálogo (.tarjeta-producto)
function resaltarTarjetaProducto(evento) {
    let divisionProducto = evento.currentTarget;

    // 1. Cambiar el color del borde
    divisionProducto.classList.remove("border-slate-200");
    divisionProducto.classList.add("border-red-500");

    // 2. Aplicar sombra de resaltado
    divisionProducto.classList.remove("shadow-sm");
    divisionProducto.classList.add("shadow-2xl");

    // 3. Redondear las esquinas (de rounded-lg a rounded-3xl)
    divisionProducto.classList.remove("rounded-lg");
    divisionProducto.classList.add("rounded-3xl");

    // 4. Incrementar el tamaño en 5%
    divisionProducto.classList.add("scale-105", "relative", "z-10");

    mostrarProductoEnIndicador(divisionProducto);
}

// Función explícita para mouseout en cada división del catálogo (.tarjeta-producto)
function restaurarTarjetaProducto(evento) {
    let divisionProducto = evento.currentTarget;

    // Evitar parpadeo al mover el puntero sobre imagen o texto interno de la misma tarjeta
    if (evento.relatedTarget && divisionProducto.contains(evento.relatedTarget)) {
        return;
    }

    // 1. Restaurar el color de borde original
    divisionProducto.classList.remove("border-red-500");
    divisionProducto.classList.add("border-slate-200");

    // 2. Restaurar sombra original
    divisionProducto.classList.remove("shadow-2xl");
    divisionProducto.classList.add("shadow-sm");

    // 3. Restaurar el redondeo original de esquinas
    divisionProducto.classList.remove("rounded-3xl");
    divisionProducto.classList.add("rounded-lg");

    // 4. Regresar al tamaño original (100%)
    divisionProducto.classList.remove("scale-105", "relative", "z-10");

    limpiarIndicador();
}

// --------------------------------------------------------------------------
// 6. AGREGAR EVENTOS MEDIANTE addEventListener (mouseover y mouseout)
// --------------------------------------------------------------------------

// Eventos del producto destacado (enlazado con getElementById)
if (productoDestacado) {
    productoDestacado.addEventListener("mouseover", resaltarProductoDestacado);
    productoDestacado.addEventListener("mouseout", restaurarProductoDestacado);
}

// Eventos para cada tarjeta del catálogo (enlazadas con getElementsByClassName)
if (catalogoProductos) {
    for (let i = 0; i < tarjetasProductos.length; i++) {
        tarjetasProductos[i].addEventListener("mouseover", resaltarTarjetaProducto);
        tarjetasProductos[i].addEventListener("mouseout", restaurarTarjetaProducto);
    }
}
