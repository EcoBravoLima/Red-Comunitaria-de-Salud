# 🏥 Red Comunitaria de Salud Pública

> **Plataforma Web Integral de Servicios Médicos Gratuitos, Atención Comunitaria y Salud Preventiva.**  
> Proyecto académico colaborativo desarrollado con **Laravel**, **Blade**, **Tailwind CSS** y **JavaScript Vanilla**.

[![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2%20%7C%208.3-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
[![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-3.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![JavaScript](https://img.shields.io/badge/JavaScript-Vanilla%20ES6+-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/es/docs/Web/JavaScript)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg?style=for-the-badge)](https://opensource.org/licenses/MIT)

---

## 📋 Descripción General del Proyecto

La **Red Comunitaria de Salud** es una iniciativa digital orientada a garantizar el acceso universal y gratuito a los servicios de salud pública municipal para la población sin derechohabiencia laboral. 

El portal centraliza la información institucional de 8 unidades médicas y hospitales comunitarios, un catálogo de 12 especialistas certificados, guías de atención al paciente, sistema de reservación de citas en línea, canal de comunicación directa para dudas y aclaraciones, y un centro informativo de comunicados, jornadas de vacunación y alertas epidemiológicas en tiempo real.

---

## 📚 Bitácora Cronológica de Actividades (Actividad 1 a Actividad 13)

A continuación se detalla la evolución pedagógica y técnica del proyecto a lo largo del curso:

| Actividad | Nombre / Módulo | Descripción Técnica y Funcional |
| :---: | :--- | :--- |
| **Act. 1** | **Definición del Proyecto y Requerimientos** | Planteamiento del problema, delimitación del alcance social del sistema de salud comunitaria, especificación de requerimientos funcionales y no funcionales, y elección de la arquitectura tecnológica base. |
| **Act. 2** | **Arquitectura de Información y Wireframing** | Diseño del mapa de navegación del sitio web, jerarquía de contenidos, diseño de bocetos estructurales (wireframes) y definición de flujos de interacción para pacientes y ciudadanos. |
| **Act. 3** | **Estructura HTML5 y Entorno Laravel** | Inicialización del entorno de desarrollo sobre el framework Laravel 10 con PHP 8.2/8.3, definición del árbol de directorios MVC y configuración del enrutamiento web inicial (`routes/web.php`). |
| **Act. 4** | **Sistema de Diseño y Estilizado Responsive** | Definición de la guía de estilos visual: paleta cromática institucional (`brand` y `accent`), escala tipográfica fluida adaptativa (*mobile-first*) con Google Font *Inter*, e integración de FontAwesome 6 y Tailwind CSS. |
| **Act. 5** | **Plantilla Maestra y Componentes Globales** | Maquetación del layout principal (`resources/views/layouts/app.blade.php`), implementando la barra institucional de urgencias 24h, navbar responsive con menú colapsable para dispositivos móviles, y pie de página institucional. |
| **Act. 6** | **Página de Inicio (Home)** | Implementación de `index.blade.php`: sección Hero con llamados a la acción prioritarios, panel de métricas de impacto comunitario (atenciones gratuitas, clínicas activas), accesos rápidos y presentación institucional. |
| **Act. 7** | **Catálogo de Servicios Médicos** | Implementación de `servicios.blade.php`: catálogo integral de 8 especialidades gratuitas (Medicina General, Pediatría, Odontología, Salud Materna, Laboratorio Clínico, Nutrición, Psicología y Vacunación). |
| **Act. 8** | **Directorio Municipal de Hospitales y Clínicas** | Implementación de `directorio.blade.php`: listado detallado de las 8 unidades médicas distribuidas en los sectores Centro, Norte, Sur, Oriente, Poniente y Rural, con horarios, direcciones, teléfonos y mapa interactivo. |
| **Act. 9** | **Directorio Médico y Cuerpo de Especialistas** | Implementación de `directorio-medico.blade.php`: perfil profesional de 12 médicos y especialistas con cédula profesional verificable, turno asignado (matutino/vespertino) y filtros temáticos. |
| **Act. 10** | **Formularios de Interacción Ciudadana** | Desarrollo de vistas de contacto y trámites: `citas.blade.php` para el agendamiento de turnos médicos en línea con selección de especialidad y clínica, y `contacto.blade.php` para el buzón de dudas ciudadanas. |
| **Act. 11** | **Guía del Paciente, Horarios e Identidad** | Implementación de `guia-paciente.blade.php` (trámites, requisitos para consultas, derechos del paciente) y `nosotros.blade.php` (misión, visión, valores éticos y directorio directivo de la red de salud). |
| **Act. 12** | **JavaScript Básico: Acordeón Interactivo (FAQ)** | Implementación de interacción con JavaScript nativo en `preguntas.blade.php` y `public/js/preguntas.js`: acordeón de preguntas frecuentes utilizando enlace de elementos por `getElementById`, asignación de eventos con `addEventListener` y alternancia de visibilidad mediante `classList.toggle("hidden")`. |
| **Act. 13** | **JavaScript: Filtrado por Categorías** | Implementación de un catálogo dinámico en `noticias.blade.php` con 20 comunicados oficiales (5 por categoría). Filtrado en cliente con `public/js/categorias.js` empleando `getElementById`, `getElementsByClassName`, manipulación de `classList.add/remove`, validación con atributos `data-categoria` y funciones explícitas sin base de datos. |
| **Act. 14** | **JavaScript: Subcategorías con Checkboxes** | Filtrado avanzado con 3 categorías principales y 3 subcategorías cada una mediante checkboxes. Implementa reglas de **inclusión (OR)** dentro de la misma categoría y **exclusión (AND)** entre categorías diferentes utilizando `getElementById`, `getElementsByClassName`, `classList.add/remove` y `addEventListener`. |

---

## 🔬 Detalle Técnico de la Actividad 14: JavaScript - Subcategorías con Checkboxes

La **Actividad 14** expande las capacidades de filtrado del catálogo incorporando 3 dimensiones o categorías de clasificación con 3 subcategorías cada una, manipuladas mediante casillas de verificación (**checkboxes**) agrupadas en divisiones:

### 1. Dimensiones de Clasificación (Categorías y Subcategorías)
1. **Tipo de Atención / Especialidad:**
   - Vacunación (`sub-vacunacion`)
   - Salud Dental (`sub-dental`)
   - Alertas y Preventiva (`sub-alerta`)
2. **Población Objetivo:**
   - Infantil y Escolar (`sub-infantil`)
   - Adultos y Trabajadores (`sub-adultos`)
   - Adultos Mayores (`sub-mayor`)
3. **Modalidad / Sede de Atención:**
   - Unidad Médica Fija (`sub-clinica`)
   - Brigada Móvil / Parques (`sub-brigada`)
   - Planteles Escolares (`sub-escuela`)

### 2. Reglas Lógicas de Filtrado
* **Inclusión (OR dentro de la misma categoría):** Cuando se seleccionan dos o más subcategorías de la misma categoría (ej. *Vacunación* y *Salud Dental*), se muestran todos los artículos que pertenezcan a cualquiera de ellas.
* **Exclusión (AND entre categorías diferentes):** Cuando se seleccionan subcategorías de dos o más categorías distintas (ej. *Vacunación* y *Planteles Escolares*), el sistema exige que el artículo cumpla simultáneamente con ambas condiciones; de lo contrario, queda excluido.
* **Seleccionar Todos o Ninguno:** Si está marcado el checkbox *"Ver Todos"* o si todas las casillas están desmarcadas, se muestran automáticamente todos los comunicados.

---

## 🔬 Detalle Técnico de la Actividad 13: JavaScript - Categorías

La **Actividad 13** consolida los conocimientos de manipulación del Modelo de Objetos del Documento (**DOM**) y arquitectura de eventos en el navegador:

### 1. Requerimientos Pedagógicos Cumplidos
* **Menú con `id` único:** Cada botón de filtrado en el menú superior cuenta con un identificador unívoco:
  - `btn-todas`
  - `btn-vacunacion`
  - `btn-dental`
  - `btn-alerta`
  - `btn-jornadas`
* **Identificación por clases temáticas:** Cada tarjeta de artículo cuenta con la clase general `articulo` y el nombre de su categoría incorporado en el atributo `class`:
  ```html
  <article class="articulo vacunacion ..." data-categoria="vacunacion">...</article>
  <article class="articulo dental ..." data-categoria="dental">...</article>
  <article class="articulo alerta ..." data-categoria="alerta">...</article>
  <article class="articulo jornadas ..." data-categoria="jornadas">...</article>
  ```
* **Enlace a componentes mediante `ById`:**
  ```javascript
  let botonVacunacion = document.getElementById("btn-vacunacion");
  ```
* **Enlace a divisiones mediante `ClassName`:**
  ```javascript
  let articulosVacunacion = document.getElementsByClassName("vacunacion");
  ```
* **Ocultar y mostrar con `classList.add` y `classList.remove`:**
  ```javascript
  // Ocultar división
  elemento.classList.add("hidden");
  // Mostrar división
  elemento.classList.remove("hidden");
  ```
* **Uso del atributo `data-`:** Validación semántica en cada iteración:
  ```javascript
  let categoria = elemento.getAttribute("data-categoria");
  ```
* **Funciones explícitas para cada acción:**
  - `mostrarTodos()`
  - `filtrarVacunacion()`
  - `filtrarDental()`
  - `filtrarAlerta()`
  - `filtrarJornadas()`
  - `ocultarTodosLosArticulos()`
* **Asignación de eventos mediante `addEventListener`:** Código totalmente desacoplado, sin atributos `onclick` en el marcado HTML:
  ```javascript
  botonVacunacion.addEventListener("click", filtrarVacunacion);
  ```

---

### 2. Catálogo de Comunicados Implementados (5 por categoría)

| Categoría | Total | Comunicados Oficiales Incluidos |
| :--- | :---: | :--- |
| **💉 Vacunación** | **5** | 1. Jornada Nacional de Vacunación (Influenza, COVID-19 y Neumococo)<br>2. Módulos de Refuerzo de Cartilla Infantil Nacional<br>3. Campaña Escolar contra el Virus del Papiloma Humano (VPH)<br>4. Jornada Municipal de Vacunación Antirrábica Canina y Felina<br>5. Refuerzo de Tétanos y Hepatitis B para Adultos |
| **🦷 Salud Dental** | **5** | 1. Detección y Prevención de Caries en Escuelas Primarias<br>2. Limpiezas Dentales con Ultrasonido y Resinas Gratuitas<br>3. Talleres de Técnica Correcta de Cepillado y Uso de Hilo Dental<br>4. Extracciones Simples y Alivio del Dolor Dental Agudo<br>5. Diagnóstico de Gingivitis y Periodoncia en Diabéticos |
| **⚠️ Alertas** | **5** | 1. Recomendaciones para Evitar Criaderos de Dengue<br>2. Aviso Preventivo por Descenso Térmico e Infecciones Respiratorias<br>3. Síntomas y Manejo Inmediato del Golpe de Calor<br>4. Protocolo de Cloración de Agua y Desinfección de Alimentos<br>5. Alerta Ambiental por Calidad del Aire para Pacientes Asmáticos |
| **🏥 Jornadas** | **5** | 1. Jornada de Salud Visual: Examen de la Vista y Lentes Graduados<br>2. Feria de Mastografías Gratuitas y Cáncer de Mama<br>3. Brigada Médica Rural en Ejidos y Zonas Comunitarias<br>4. Detección Temprana de Diabetes e Hipertensión Arterial<br>5. Jornada de Salud Emocional y Manejo de Ansiedad y Duelo |
| **TOTAL** | **20** | **20 comunicados con 20 fotografías temáticas originales no repetidas.** |

---

## 📂 Estructura de Archivos del Proyecto

```text
Red-Comunitaria-de-Salud/
├── app/
│   └── Http/Controllers/
├── public/
│   ├── css/
│   │   └── estilos.css
│   ├── img/
│   │   ├── clinicas/            # 8 fotografías de unidades médicas
│   │   ├── doctores/            # 12 fotografías de especialistas
│   │   ├── general/             # Hero y banner de equipo
│   │   └── noticias/            # 20 fotografías temáticas de la Actividad 13
│   └── js/
│       ├── preguntas.js         # Lógica de la Actividad 12 (Acordeón FAQ)
│       ├── categorias.js        # Lógica de la Actividad 13 (Filtrado de Catálogo)
│       └── noticias.js          # Espejo sincronizado de categorias.js
├── resources/
│   └── views/
│       ├── layouts/
│       │   └── app.blade.php    # Plantilla maestra y navegación global
│       ├── index.blade.php      # Act. 6 - Página de inicio
│       ├── directorio.blade.php # Act. 8 - Directorio de hospitales y clínicas
│       ├── servicios.blade.php  # Act. 7 - Catálogo de servicios médicos
│       ├── directorio-medico.blade.php # Act. 9 - Directorio de 12 doctores
│       ├── guia-paciente.blade.php     # Act. 11 - Horarios y guía del paciente
│       ├── citas.blade.php      # Act. 10 - Sistema de agendamiento de citas
│       ├── contacto.blade.php   # Act. 10 - Buzón ciudadano y contacto
│       ├── nosotros.blade.php   # Act. 11 - Misión, visión e identidad
│       ├── preguntas.blade.php  # Act. 12 - Centro de Ayuda interactivo (FAQ)
│       └── noticias.blade.php   # Act. 13 - Catálogo interactivo de comunicados
├── routes/
│   └── web.php                  # Enrutador HTTP de vistas Laravel
├── iniciar_servidor.bat         # Script de arranque rápido en Windows
└── README.md                    # Documentación integral del proyecto
```

---

## ⚡ Instalación y Puesta en Marcha Local

### Prerrequisitos
- **PHP** versión 8.2 o superior instalada (verificada con `php -v`).
- **Composer** versión 2.x instalada.
- Servidor web local o soporte CLI (`php artisan serve`).

### Pasos de ejecución:

1. **Clonar el repositorio:**
   ```bash
   git clone https://github.com/EcoBravoLima/Red-Comunitaria-de-Salud.git
   cd Red-Comunitaria-de-Salud
   ```

2. **Instalar paquetes y dependencias:**
   ```bash
   composer install
   ```

3. **Iniciar el servidor local:**
   - **Opción A (Recomendada en Windows):**
     Hacer doble clic en `iniciar_servidor.bat` o ejecutarlo desde la terminal:
     ```cmd
     iniciar_servidor.bat
     ```
   - **Opción B (Línea de comandos estándar de Laravel):**
     ```bash
     php artisan serve
     ```

4. **Navegar en el explorador web:**
   - **Catálogo de Categorías (Actividad 13):** `http://127.0.0.1:8000/noticias`
   - **Preguntas Frecuentes (Actividad 12):** `http://127.0.0.1:8000/preguntas`
   - **Directorio de Clínicas:** `http://127.0.0.1:8000/directorio`
   - **Directorio de Doctores:** `http://127.0.0.1:8000/directorio-medico`
   - **Inicio Principal:** `http://127.0.0.1:8000/`

---

## 🛡️ Seguridad y Consideraciones Técnicas
- El entorno de ejecución se encuentra protegido contra vulnerabilidades del interprete PHP (mitigación de directivas en [SECURITY.md](SECURITY.md)).
- Enrutamiento estricto de solicitudes GET en Laravel mediante funciones de renderizado de plantillas Blade directas.
- Separación rigurosa de responsabilidades entre el marcado semántico HTML, el motor de estilos con Tailwind CSS y la capa de interactividad en JavaScript nativo.

---

## 👥 Equipo de Desarrollo y Créditos
* **Proyecto:** Red Comunitaria de Salud Pública
* **Autor / Estudiante:** [EcoBravoLima](https://github.com/EcoBravoLima)
* **Materia:** Programación / Desarrollo Web
* **Licencia:** Código abierto bajo términos de la licencia [MIT](LICENSE).
