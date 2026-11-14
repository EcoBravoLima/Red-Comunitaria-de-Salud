// ==========================================================================
// ACTIVIDAD: JAVASCRIPT - BUSCADOR DE PRODUCTOS POR NOMBRE
// Proyecto: Red Comunitaria de Salud
// Archivo: public/js/buscador.js
// Descripción: Buscador interactivo desde cero para filtrar divisiones de 
// productos en la vista del catálogo mediante eventos, clases y manipulación del DOM.
// ==========================================================================

// --------------------------------------------------------------------------
// 1. ENLACE A COMPONENTES MEDIANTE ById
// Obtenemos los elementos de control de la interfaz por su identificador único
// --------------------------------------------------------------------------
let inputBusqueda = document.getElementById("input-busqueda");
let btnLimpiar = document.getElementById("btn-limpiar");
let contadorResultados = document.getElementById("contador-resultados");
let mensajeSinResultados = document.getElementById("mensaje-sin-resultados");
let contenedorCatalogo = document.getElementById("catalogo-productos");

// --------------------------------------------------------------------------
// 2. ENLACE A DIVISIONES MEDIANTE ClassName
// Obtenemos la colección HTML de todas las divisiones de productos
// mediante la clase común 'producto' asignada a cada tarjeta del catálogo
// --------------------------------------------------------------------------
let divisionesProductos = document.getElementsByClassName("producto");

// --------------------------------------------------------------------------
// 3. FUNCIONES EXPLÍCITAS PARA CADA ACCIÓN
// --------------------------------------------------------------------------

// Acción 1: Mostrar una división específica utilizando 'display' y clases CSS
function mostrarDivision(division) {
    // Restauramos la propiedad de visualización con display
    division.style.display = ""; 
    // Removemos la clase de ocultamiento del CSS
    division.classList.remove("hidden");
}

// Acción 2: Ocultar una división específica utilizando 'display' y clases CSS
function ocultarDivision(division) {
    // Ocultamos la división utilizando la propiedad display: none
    division.style.display = "none";
    // Agregamos la clase de ocultamiento del CSS
    division.classList.add("hidden");
}

// Acción 3: Mostrar todas las divisiones de productos en el catálogo
function mostrarTodosLosProductos() {
    for (let i = 0; i < divisionesProductos.length; i++) {
        mostrarDivision(divisionesProductos[i]);
    }
}

// Acción 4: Actualizar el contador de productos encontrados y el mensaje de alerta
function actualizarContador(visibles, total) {
    if (contadorResultados) {
        contadorResultados.textContent = "Mostrando " + visibles + " de " + total + " productos";
    }

    // Si no hubo coincidencias (visibles === 0), mostramos el mensaje de "no encontrado"
    if (mensajeSinResultados) {
        if (visibles === 0) {
            mensajeSinResultados.style.display = "block";
            mensajeSinResultados.classList.remove("hidden");
        } else {
            mensajeSinResultados.style.display = "none";
            mensajeSinResultados.classList.add("hidden");
        }
    }
}

// Acción 5: Función principal para realizar la búsqueda por nombre o clase de producto
function buscarProductos() {
    // Leemos el valor ingresado en el input, quitamos espacios y convertimos a minúsculas
    let textoBusqueda = inputBusqueda.value.toLowerCase().trim();

    // Si la caja de texto está vacía, mostramos todos los productos
    if (textoBusqueda === "") {
        mostrarTodosLosProductos();
        actualizarContador(divisionesProductos.length, divisionesProductos.length);
        return;
    }

    let coincidencias = 0;

    // Recorremos cada una de las divisiones obtenidas con getElementsByClassName("producto")
    for (let i = 0; i < divisionesProductos.length; i++) {
        let division = divisionesProductos[i];

        // Obtenemos los nombres de clases asignados a la división (incluye las clases de producto y categoría)
        let clasesDeDivision = division.className.toLowerCase();

        // Obtenemos el texto visible dentro de la división (título, descripción, especialidad)
        let textoContenido = division.textContent.toLowerCase();

        // Evaluamos si el texto buscado coincide con las clases de la división O con el nombre del producto
        if (clasesDeDivision.indexOf(textoBusqueda) !== -1 || textoContenido.indexOf(textoBusqueda) !== -1) {
            mostrarDivision(division);
            coincidencias++;
        } else {
            ocultarDivision(division);
        }
    }

    // Actualizamos el indicador visual de resultados encontrados
    actualizarContador(coincidencias, divisionesProductos.length);
}

// Acción 6: Limpiar el campo de búsqueda y restablecer el catálogo completo
function limpiarBusqueda() {
    if (inputBusqueda) {
        inputBusqueda.value = "";
        inputBusqueda.focus();
    }
    mostrarTodosLosProductos();
    actualizarContador(divisionesProductos.length, divisionesProductos.length);
}

// Acción 7: Búsqueda rápida desde sugerencias interactivas (pills de búsqueda)
function buscarSugerencia(termino) {
    if (inputBusqueda) {
        inputBusqueda.value = termino;
        buscarProductos();
    }
}

// --------------------------------------------------------------------------
// 4. AGREGAR EVENTOS MEDIANTE addEventListener
// Conectamos los componentes de la vista con sus funciones correspondientes
// --------------------------------------------------------------------------

// Evento al escribir o borrar texto en el input (input: detección en tiempo real)
if (inputBusqueda) {
    inputBusqueda.addEventListener("input", buscarProductos);
    // Evento al soltar la tecla (keyup: para asegurar compatibilidad y requerimiento)
    inputBusqueda.addEventListener("keyup", buscarProductos);
}

// Evento al hacer clic en el botón de limpiar
if (btnLimpiar) {
    btnLimpiar.addEventListener("click", limpiarBusqueda);
}

// Inicialización: aseguramos que al cargar la página el contador muestre el total de productos
document.addEventListener("DOMContentLoaded", function () {
    actualizarContador(divisionesProductos.length, divisionesProductos.length);
});
