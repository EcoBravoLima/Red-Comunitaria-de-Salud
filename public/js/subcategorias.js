// ==========================================================================
// ACTIVIDAD 14: JAVASCRIPT - SUBCATEGORÍAS CON CHECKBOXES
// Proyecto: Red Comunitaria de Salud
// Descripción: Filtrado avanzado de artículos por múltiples categorías y subcategorías
// mediante checkboxes, implementando reglas de inclusión (OR dentro de la misma categoría)
// y exclusión (AND entre diferentes categorías) con JavaScript Vanilla.
// ==========================================================================

// --------------------------------------------------------------------------
// 1. ENLACE A COMPONENTES MEDIANTE ById
// Obtenemos cada checkbox del panel de filtros por su identificador único
// --------------------------------------------------------------------------

// Checkbox para ver todos los artículos
let checkTodos = document.getElementById("check-todos");

// Categoría 1: Tipo de Atención / Especialidad
let checkVacunacion = document.getElementById("check-vacunacion");
let checkDental = document.getElementById("check-dental");
let checkAlerta = document.getElementById("check-alerta");

// Categoría 2: Población Dirigida
let checkInfantil = document.getElementById("check-infantil");
let checkAdultos = document.getElementById("check-adultos");
let checkMayor = document.getElementById("check-mayor");

// Categoría 3: Modalidad de Atención
let checkClinica = document.getElementById("check-clinica");
let checkBrigada = document.getElementById("check-brigada");
let checkEscuela = document.getElementById("check-escuela");

// --------------------------------------------------------------------------
// 2. ENLACE A DIVISIONES MEDIANTE ClassName
// Obtenemos todos los elementos del catálogo mediante la clase general 'articulo'
// --------------------------------------------------------------------------
let todosLosArticulos = document.getElementsByClassName("articulo");

// --------------------------------------------------------------------------
// 3. FUNCIONES EXPLÍCITAS PARA GESTIÓN DE VISIBILIDAD (classList add / remove)
// --------------------------------------------------------------------------

// Oculta todas las divisiones del catálogo añadiendo la clase 'hidden'
function ocultarTodos() {
    for (let i = 0; i < todosLosArticulos.length; i++) {
        todosLosArticulos[i].classList.add("hidden");
    }
}

// Muestra todas las divisiones del catálogo removiendo la clase 'hidden'
function mostrarTodos() {
    for (let i = 0; i < todosLosArticulos.length; i++) {
        todosLosArticulos[i].classList.remove("hidden");
    }
}

// Desmarca todas las casillas de subcategorías
function desmarcarSubcategorias() {
    checkVacunacion.checked = false;
    checkDental.checked = false;
    checkAlerta.checked = false;

    checkInfantil.checked = false;
    checkAdultos.checked = false;
    checkMayor.checked = false;

    checkClinica.checked = false;
    checkBrigada.checked = false;
    checkEscuela.checked = false;
}

// --------------------------------------------------------------------------
// 4. FUNCIÓN EXPLÍCITA DE FILTRADO (INCLUSIÓN Y EXCLUSIÓN)
// --------------------------------------------------------------------------
function filtrarArticulos() {
    // Si la opción "Ver Todos" está marcada, mostramos todos los artículos
    if (checkTodos.checked) {
        mostrarTodos();
        return;
    }

    // Determinamos si hay al menos una subcategoría seleccionada en cada grupo
    let cat1Activa = checkVacunacion.checked || checkDental.checked || checkAlerta.checked;
    let cat2Activa = checkInfantil.checked || checkAdultos.checked || checkMayor.checked;
    let cat3Activa = checkClinica.checked || checkBrigada.checked || checkEscuela.checked;

    // Regla: Si ninguna subcategoría está seleccionada, deben mostrarse todos los artículos
    if (!cat1Activa && !cat2Activa && !cat3Activa) {
        checkTodos.checked = true;
        mostrarTodos();
        return;
    }

    // Ocultamos inicialmente todos los artículos para aplicar el filtrado
    ocultarTodos();

    // Evaluamos cada artículo del catálogo
    for (let i = 0; i < todosLosArticulos.length; i++) {
        let articulo = todosLosArticulos[i];

        // ------------------------------------------------------------------
        // EVALUACIÓN CATEGORÍA 1 (Tipo de Atención) - INCLUSIÓN (OR)
        // Si 2 o más subcategorías de la misma categoría son seleccionadas,
        // se incluyen los artículos que tengan cualquiera de ellas.
        // ------------------------------------------------------------------
        let cumpleCat1 = false;
        if (!cat1Activa) {
            cumpleCat1 = true; // Si no hay filtro en esta categoría, no excluye
        } else {
            if (checkVacunacion.checked && articulo.classList.contains("sub-vacunacion")) {
                cumpleCat1 = true;
            }
            if (checkDental.checked && articulo.classList.contains("sub-dental")) {
                cumpleCat1 = true;
            }
            if (checkAlerta.checked && articulo.classList.contains("sub-alerta")) {
                cumpleCat1 = true;
            }
        }

        // ------------------------------------------------------------------
        // EVALUACIÓN CATEGORÍA 2 (Población Dirigida) - INCLUSIÓN (OR)
        // ------------------------------------------------------------------
        let cumpleCat2 = false;
        if (!cat2Activa) {
            cumpleCat2 = true; // Si no hay filtro en esta categoría, no excluye
        } else {
            if (checkInfantil.checked && articulo.classList.contains("sub-infantil")) {
                cumpleCat2 = true;
            }
            if (checkAdultos.checked && articulo.classList.contains("sub-adultos")) {
                cumpleCat2 = true;
            }
            if (checkMayor.checked && articulo.classList.contains("sub-mayor")) {
                cumpleCat2 = true;
            }
        }

        // ------------------------------------------------------------------
        // EVALUACIÓN CATEGORÍA 3 (Modalidad de Atención) - INCLUSIÓN (OR)
        // ------------------------------------------------------------------
        let cumpleCat3 = false;
        if (!cat3Activa) {
            cumpleCat3 = true; // Si no hay filtro en esta categoría, no excluye
        } else {
            if (checkClinica.checked && articulo.classList.contains("sub-clinica")) {
                cumpleCat3 = true;
            }
            if (checkBrigada.checked && articulo.classList.contains("sub-brigada")) {
                cumpleCat3 = true;
            }
            if (checkEscuela.checked && articulo.classList.contains("sub-escuela")) {
                cumpleCat3 = true;
            }
        }

        // ------------------------------------------------------------------
        // EVALUACIÓN GLOBAL ENTRE CATEGORÍAS - EXCLUSIÓN (AND)
        // Cuando se seleccionan subcategorías de 2 o más categorías distintas,
        // se exige que el artículo cumpla simultáneamente con todas ellas.
        // ------------------------------------------------------------------
        if (cumpleCat1 && cumpleCat2 && cumpleCat3) {
            articulo.classList.remove("hidden");
        }
    }
}

// --------------------------------------------------------------------------
// 5. FUNCIONES EXPLÍCITAS MANEJADORAS DE EVENTOS
// --------------------------------------------------------------------------

// Acción al interactuar con el checkbox "Ver Todos"
function accionCambioTodos() {
    if (checkTodos.checked) {
        desmarcarSubcategorias();
        mostrarTodos();
    } else {
        filtrarArticulos();
    }
}

// Acción al interactuar con cualquier checkbox de subcategoría
function accionCambioSubcategoria() {
    checkTodos.checked = false;
    filtrarArticulos();
}

// --------------------------------------------------------------------------
// 6. ASIGNACIÓN DE EVENTOS MEDIANTE addEventListener
// Conectamos cada checkbox a su función explícita mediante el evento 'change'
// --------------------------------------------------------------------------
checkTodos.addEventListener("change", accionCambioTodos);

// Categoría 1
checkVacunacion.addEventListener("change", accionCambioSubcategoria);
checkDental.addEventListener("change", accionCambioSubcategoria);
checkAlerta.addEventListener("change", accionCambioSubcategoria);

// Categoría 2
checkInfantil.addEventListener("change", accionCambioSubcategoria);
checkAdultos.addEventListener("change", accionCambioSubcategoria);
checkMayor.addEventListener("change", accionCambioSubcategoria);

// Categoría 3
checkClinica.addEventListener("change", accionCambioSubcategoria);
checkBrigada.addEventListener("change", accionCambioSubcategoria);
checkEscuela.addEventListener("change", accionCambioSubcategoria);
