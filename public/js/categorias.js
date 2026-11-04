// ==========================================================================
// ACTIVIDAD 13: JAVASCRIPT, CATEGORÍAS
// Proyecto: Red Comunitaria de Salud
// Descripción: Filtrado interactivo de artículos por categorías mediante eventos,
// manipulación de clases y atributos data en JavaScript Vanilla.
// ==========================================================================

// --------------------------------------------------------------------------
// 1. ENLACE A COMPONENTES MEDIANTE ById
// Obtenemos cada botón del menú de categorías utilizando su id único
// --------------------------------------------------------------------------
let botonTodas = document.getElementById("btn-todas");
let botonVacunacion = document.getElementById("btn-vacunacion");
let botonDental = document.getElementById("btn-dental");
let botonAlerta = document.getElementById("btn-alerta");
let botonJornadas = document.getElementById("btn-jornadas");

// --------------------------------------------------------------------------
// 2. ENLACE A DIVISIONES MEDIANTE ClassName
// Obtenemos la colección general de artículos y las colecciones específicas
// usando el nombre de la categoría asignado como clase a cada división
// --------------------------------------------------------------------------
let todosLosArticulos = document.getElementsByClassName("articulo");
let articulosVacunacion = document.getElementsByClassName("vacunacion");
let articulosDental = document.getElementsByClassName("dental");
let articulosAlerta = document.getElementsByClassName("alerta");
let articulosJornadas = document.getElementsByClassName("jornadas");

// Botones del menú para cambiar el estilo visual del botón activo
let botonesMenu = document.getElementsByClassName("btn-categoria");

// --------------------------------------------------------------------------
// 3. FUNCIONES AUXILIARES (OCULTAR Y MOSTRAR CON classList add / remove)
// --------------------------------------------------------------------------

// Oculta todas las divisiones de artículos agregando la clase 'hidden'
function ocultarTodosLosArticulos() {
    for (let i = 0; i < todosLosArticulos.length; i++) {
        todosLosArticulos[i].classList.add("hidden");
    }
}

// Actualiza el aspecto visual del menú marcando el botón seleccionado
function actualizarBotonActivo(botonSeleccionado) {
    for (let i = 0; i < botonesMenu.length; i++) {
        botonesMenu[i].classList.remove("bg-brand-600", "text-white");
        botonesMenu[i].classList.add("bg-slate-100", "text-slate-800");
    }
    botonSeleccionado.classList.remove("bg-slate-100", "text-slate-800");
    botonSeleccionado.classList.add("bg-brand-600", "text-white");
}

// --------------------------------------------------------------------------
// 4. FUNCIONES EXPLÍCITAS PARA CADA ACCIÓN
// Cada función realiza el filtrado específico leyendo el atributo data-
// y utilizando classList remove para mostrar las divisiones correspondientes
// --------------------------------------------------------------------------

// Acción 1: Mostrar todos los artículos del catálogo
function mostrarTodos() {
    actualizarBotonActivo(botonTodas);
    for (let i = 0; i < todosLosArticulos.length; i++) {
        // Uso del atributo data-categoria para verificar el artículo
        let categoria = todosLosArticulos[i].getAttribute("data-categoria");
        // Mostramos la división quitando la clase 'hidden'
        todosLosArticulos[i].classList.remove("hidden");
    }
}

// Acción 2: Filtrar artículos de la categoría Vacunación
function filtrarVacunacion() {
    actualizarBotonActivo(botonVacunacion);
    ocultarTodosLosArticulos();
    // Recorremos las divisiones obtenidas con getElementsByClassName("vacunacion")
    for (let i = 0; i < articulosVacunacion.length; i++) {
        // Uso del atributo data-categoria
        let categoria = articulosVacunacion[i].getAttribute("data-categoria");
        if (categoria === "vacunacion") {
            articulosVacunacion[i].classList.remove("hidden");
        }
    }
}

// Acción 3: Filtrar artículos de la categoría Salud Dental
function filtrarDental() {
    actualizarBotonActivo(botonDental);
    ocultarTodosLosArticulos();
    // Recorremos las divisiones obtenidas con getElementsByClassName("dental")
    for (let i = 0; i < articulosDental.length; i++) {
        // Uso del atributo data-categoria
        let categoria = articulosDental[i].getAttribute("data-categoria");
        if (categoria === "dental") {
            articulosDental[i].classList.remove("hidden");
        }
    }
}

// Acción 4: Filtrar artículos de la categoría Alertas Sanitarias
function filtrarAlerta() {
    actualizarBotonActivo(botonAlerta);
    ocultarTodosLosArticulos();
    // Recorremos las divisiones obtenidas con getElementsByClassName("alerta")
    for (let i = 0; i < articulosAlerta.length; i++) {
        // Uso del atributo data-categoria
        let categoria = articulosAlerta[i].getAttribute("data-categoria");
        if (categoria === "alerta") {
            articulosAlerta[i].classList.remove("hidden");
        }
    }
}

// Acción 5: Filtrar artículos de la categoría Jornadas Especiales
function filtrarJornadas() {
    actualizarBotonActivo(botonJornadas);
    ocultarTodosLosArticulos();
    // Recorremos las divisiones obtenidas con getElementsByClassName("jornadas")
    for (let i = 0; i < articulosJornadas.length; i++) {
        // Uso del atributo data-categoria
        let categoria = articulosJornadas[i].getAttribute("data-categoria");
        if (categoria === "jornadas") {
            articulosJornadas[i].classList.remove("hidden");
        }
    }
}

// --------------------------------------------------------------------------
// 5. AGREGAR EVENTO MEDIANTE addEventListener
// Asignamos el evento 'click' a cada botón para ejecutar su función explícita
// --------------------------------------------------------------------------
botonTodas.addEventListener("click", mostrarTodos);
botonVacunacion.addEventListener("click", filtrarVacunacion);
botonDental.addEventListener("click", filtrarDental);
botonAlerta.addEventListener("click", filtrarAlerta);
botonJornadas.addEventListener("click", filtrarJornadas);
