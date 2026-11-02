// 1. Obtención de los elementos del DOM mediante getElementById
let p1 = document.getElementById("pregunta1");
let r1 = document.getElementById("respuesta1");

let p2 = document.getElementById("pregunta2");
let r2 = document.getElementById("respuesta2");

let p3 = document.getElementById("pregunta3");
let r3 = document.getElementById("respuesta3");

let p4 = document.getElementById("pregunta4");
let r4 = document.getElementById("respuesta4");

let p5 = document.getElementById("pregunta5");
let r5 = document.getElementById("respuesta5");

// 2. Función para mostrar u ocultar respuestas utilizando classList
function toggle(respuesta) {
    respuesta.classList.toggle("hidden");
}

// 3. Asignación de eventos click a cada pregunta utilizando addEventListener
// Cada pregunta controla únicamente su respuesta correspondiente
p1.addEventListener("click", function() {
    toggle(r1);
});

p2.addEventListener("click", function() {
    toggle(r2);
});

p3.addEventListener("click", function() {
    toggle(r3);
});

p4.addEventListener("click", function() {
    toggle(r4);
});

p5.addEventListener("click", function() {
    toggle(r5);
});
