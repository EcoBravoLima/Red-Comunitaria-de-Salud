# Red Comunitaria de Salud Pública

Sistema web integral para la gestión y difusión de servicios médicos comunitarios, directorio de unidades de salud, agenda de citas, y catálogo interactivo de comunicados y alertas epidemiológicas.

---

## 📌 Actividades del Proyecto

### Actividad 13: JavaScript, Categorías (Catálogo Interactivo)

Implementación de un sistema de filtrado dinámico por categorías para los comunicados, campañas y alertas de salud comunitaria, desarrollado desde cero con **JavaScript Vanilla** bajo lineamientos pedagógicos de manipulación del DOM y arquitectura basada en eventos nativos.

#### 🎯 Requerimientos Técnicos Cumplidos:
- **Menú con `id` único:** Cada botón de categoría posee un identificador único en el DOM (`btn-todas`, `btn-vacunacion`, `btn-dental`, `btn-alerta`, `btn-jornadas`).
- **Enlace a componentes mediante `getElementById`:** Captura directa de los elementos interactivos del menú.
- **Enlace a divisiones mediante `getElementsByClassName`:** Selección de las tarjetas de artículos mediante su clase general (`articulo`) y su clase temática (`vacunacion`, `dental`, `alerta`, `jornadas`).
- **Gestión de visibilidad con `classList.add` y `classList.remove`:** Ocultamiento y visualización de artículos aplicando o removiendo la clase utilitaria `hidden`.
- **Uso de atributos `data-`:** Validación semántica en cada tarjeta mediante `data-categoria="..."` leído con `.getAttribute("data-categoria")`.
- **Eventos con `addEventListener`:** Asignación desacoplada de eventos `click` a cada botón del menú, eliminando llamadas inline en HTML.
- **Funciones explícitas:** Funciones dedicadas para cada acción (`mostrarTodos`, `filtrarVacunacion`, `filtrarDental`, `filtrarAlerta`, `filtrarJornadas`, `ocultarTodosLosArticulos`).
- **Sin base de datos:** El catálogo funciona de forma reactiva y rápida en el lado del cliente (Front-End).

#### 🗂️ Archivos Principales de la Actividad:
- `resources/views/noticias.blade.php`: Vista Blade del catálogo con 20 comunicados oficiales (5 artículos por categoría).
- `public/js/categorias.js`: Archivo JavaScript con la lógica de control del DOM y filtrado por eventos.
- `public/img/noticias/`: 20 fotografías temáticas originales de alta calidad asignadas a cada comunicado.

---

### Actividad 12: Acordeón Interactivo de Preguntas Frecuentes (FAQ)
- `resources/views/preguntas.blade.php`: Vista interactiva con acordeón desplegable.
- `public/js/preguntas.js`: Control de visibilidad con `getElementById`, `addEventListener` y `classList.toggle`.

---

## 🚀 Instalación y Ejecución Local

1. Clonar el repositorio:
   ```bash
   git clone https://github.com/EcoBravoLima/Red-Comunitaria-de-Salud.git
   cd Red-Comunitaria-de-Salud
   ```

2. Instalar dependencias de PHP con Composer:
   ```bash
   composer install
   ```

3. Iniciar el servidor local de desarrollo:
   - Mediante el script automático:
     ```cmd
     iniciar_servidor.bat
     ```
   - O mediante Artisan:
     ```bash
     php artisan serve
     ```

4. Abrir en el navegador:
   - Catálogo de Noticias y Categorías: `http://127.0.0.1:8000/noticias`
   - Preguntas Frecuentes: `http://127.0.0.1:8000/preguntas`

---

## 🔒 Requisitos del Entorno
- **PHP:** 8.2+ o 8.3+ (recomendado PHP 8.3.36+ con mitigación CVE-2024-4577).
- **Laravel Framework:** 10.x
- **Tailwind CSS & FontAwesome:** Integrados vía CDN.

---

## 📄 Licencia
Este proyecto es software de código abierto bajo la licencia [MIT](LICENSE).
