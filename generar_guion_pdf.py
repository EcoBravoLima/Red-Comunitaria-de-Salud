import os
import sys
from reportlab.lib import colors
from reportlab.lib.pagesizes import letter
from reportlab.lib.units import inch
from reportlab.lib.styles import getSampleStyleSheet, ParagraphStyle
from reportlab.platypus import (
    SimpleDocTemplate, Paragraph, Spacer, Table, TableStyle, PageBreak, KeepTogether, HRFlowable
)
from reportlab.pdfgen import canvas

class NumberedCanvas(canvas.Canvas):
    def __init__(self, *args, **kwargs):
        super(NumberedCanvas, self).__init__(*args, **kwargs)
        self._saved_page_states = []

    def showPage(self):
        self._saved_page_states.append(dict(self.__dict__))
        self._startPage()

    def save(self):
        num_pages = len(self._saved_page_states)
        for state in self._saved_page_states:
            self.__dict__.update(state)
            self.draw_page_decorations(num_pages)
            super(NumberedCanvas, self).showPage()
        super(NumberedCanvas, self).save()

    def draw_page_decorations(self, page_count):
        self.saveState()
        self.setFont("Helvetica", 8)
        self.setFillColor(colors.HexColor("#64748b"))
        
        # Header (pages > 1)
        if self._pageNumber > 1:
            self.drawString(54, 750, "Red Comunitaria de Salud • Actividad: Buscador de Productos por Nombre (JavaScript Vanilla)")
            self.setStrokeColor(colors.HexColor("#cbd5e1"))
            self.setLineWidth(0.5)
            self.line(54, 742, 558, 742)
            
        # Footer (all pages)
        self.setStrokeColor(colors.HexColor("#cbd5e1"))
        self.setLineWidth(0.5)
        self.line(54, 45, 558, 45)
        self.drawString(54, 32, "Documento de Exposición y Guión de Video • Resolución Mínima: 720p • Archivos: .js y .blade.php")
        page_text = f"Página {self._pageNumber} de {page_count}"
        self.drawRightString(558, 32, page_text)
        self.restoreState()

def build_pdf(filename="Guion_Presentacion_Buscador_Productos_JS.pdf"):
    doc = SimpleDocTemplate(
        filename,
        pagesize=letter,
        leftMargin=54,
        rightMargin=54,
        topMargin=54,
        bottomMargin=54
    )
    
    styles = getSampleStyleSheet()
    
    # Custom styles
    primary_color = colors.HexColor("#0369a1")    # Brand blue
    secondary_color = colors.HexColor("#ea580c")  # Accent orange
    dark_text = colors.HexColor("#0f172a")
    body_text = colors.HexColor("#334155")
    card_bg = colors.HexColor("#f8fafc")
    border_color = colors.HexColor("#e2e8f0")
    highlight_box = colors.HexColor("#eff6ff")
    
    title_style = ParagraphStyle(
        'DocTitle',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=20,
        leading=24,
        textColor=primary_color,
        alignment=0,
        spaceAfter=6
    )
    
    subtitle_style = ParagraphStyle(
        'DocSubtitle',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=11,
        leading=15,
        textColor=secondary_color,
        spaceAfter=15
    )
    
    h1_style = ParagraphStyle(
        'Heading1_Custom',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=13,
        leading=17,
        textColor=primary_color,
        spaceBefore=14,
        spaceAfter=6,
        keepWithNext=True
    )
    
    h2_style = ParagraphStyle(
        'Heading2_Custom',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=10.5,
        leading=14,
        textColor=dark_text,
        spaceBefore=10,
        spaceAfter=4,
        keepWithNext=True
    )

    body = ParagraphStyle(
        'Body_Custom',
        parent=styles['Normal'],
        fontName='Helvetica',
        fontSize=9,
        leading=13,
        textColor=body_text,
        spaceAfter=6
    )

    body_bold = ParagraphStyle(
        'Body_Bold',
        parent=body,
        fontName='Helvetica-Bold',
        textColor=dark_text
    )

    script_dialogue = ParagraphStyle(
        'ScriptDialogue',
        parent=styles['Normal'],
        fontName='Helvetica-Oblique',
        fontSize=9,
        leading=13.5,
        textColor=colors.HexColor("#1e293b"),
        spaceAfter=6
    )

    code_snippet = ParagraphStyle(
        'CodeSnippet',
        parent=styles['Normal'],
        fontName='Courier',
        fontSize=8,
        leading=11,
        textColor=colors.HexColor("#094c72")
    )

    table_header = ParagraphStyle(
        'TableHeader',
        parent=styles['Normal'],
        fontName='Helvetica-Bold',
        fontSize=8.5,
        leading=11,
        textColor=colors.white,
        alignment=1
    )

    table_cell = ParagraphStyle(
        'TableCell',
        parent=styles['Normal'],
        fontName='Helvetica',
        fontSize=8,
        leading=11,
        textColor=dark_text
    )

    table_cell_bold = ParagraphStyle(
        'TableCellBold',
        parent=table_cell,
        fontName='Helvetica-Bold'
    )

    story = []

    # ---------------------------------------------------------
    # HEADER / PORTADA
    # ---------------------------------------------------------
    story.append(Paragraph("GUIÓN DE EXPOSICIÓN Y DEMOSTRACIÓN EN VIDEO", title_style))
    story.append(Paragraph("ACTIVIDAD: BUSCADOR DE PRODUCTOS POR NOMBRE CON JAVASCRIPT VANILLA", subtitle_style))
    
    # Info card table
    info_data = [
        [
            Paragraph("<b>Proyecto:</b> Red Comunitaria de Salud Pública", table_cell),
            Paragraph("<b>Materia:</b> Programación Web / Desarrollo de Apps", table_cell)
        ],
        [
            Paragraph("<b>Vista Blade:</b> resources/views/noticias.blade.php", table_cell),
            Paragraph("<b>Archivo JS:</b> public/js/buscador.js", table_cell)
        ],
        [
            Paragraph("<b>Archivos de Respaldo:</b> noticias_respaldo_act14.blade.php / subcategorias_respaldo.js", table_cell),
            Paragraph("<b>Requisitos de Video:</b> Res. &gt;= 720p • Sin empaquetar ni comprimir", table_cell)
        ]
    ]
    t_info = Table(info_data, colWidths=[250, 254])
    t_info.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,-1), card_bg),
        ('BOX', (0,0), (-1,-1), 1, border_color),
        ('INNERGRID', (0,0), (-1,-1), 0.5, border_color),
        ('TOPPADDING', (0,0), (-1,-1), 5),
        ('BOTTOMPADDING', (0,0), (-1,-1), 5),
        ('LEFTPADDING', (0,0), (-1,-1), 8),
        ('RIGHTPADDING', (0,0), (-1,-1), 8),
    ]))
    story.append(t_info)
    story.append(Spacer(1, 10))

    # ---------------------------------------------------------
    # SECCIÓN 1: LISTA DE VERIFICACIÓN DE REQUISITOS (RÚBRICA)
    # ---------------------------------------------------------
    story.append(Paragraph("1. Lista de Verificación y Cumplimiento de la Actividad", h1_style))
    story.append(Paragraph(
        "A continuación se detalla cómo cada uno de los lineamientos obligatorios establecidos por el docente ha sido implementado rigurosamente en el código fuente:",
        body
    ))

    rubric_data = [
        [
            Paragraph("Lineamiento Solicitado", table_header),
            Paragraph("Estado", table_header),
            Paragraph("Implementación Técnica Específica", table_header)
        ],
        [
            Paragraph("<b>1. Respaldo de archivos</b><br/>Guardar versión previa", table_cell),
            Paragraph("<font color='#059669'><b>CUMPLIDO</b></font>", table_cell_bold),
            Paragraph("Se crearon copias de seguridad: <code>noticias_respaldo_act14.blade.php</code> y <code>public/js/subcategorias_respaldo.js</code>.", table_cell)
        ],
        [
            Paragraph("<b>2. Buscador por nombre</b><br/>En la vista del catálogo", table_cell),
            Paragraph("<font color='#059669'><b>CUMPLIDO</b></font>", table_cell_bold),
            Paragraph("Caja de texto <code>#input-busqueda</code> en cabecera del catálogo, botón limpiar <code>#btn-limpiar</code>, contador <code>#contador-resultados</code> y sugerencias rápidas.", table_cell)
        ],
        [
            Paragraph("<b>3. Clases según productos</b><br/>Clase de producto y categoría", table_cell),
            Paragraph("<font color='#059669'><b>CUMPLIDO</b></font>", table_cell_bold),
            Paragraph("Cada división incluye clase <code>producto</code>, clase de categoría (<code>vacunacion</code>, <code>dental</code>, etc.) y clase nominal: <code>prod-influenza</code>, <code>prod-caries</code>, <code>prod-dengue</code>.", table_cell)
        ],
        [
            Paragraph("<b>4. Enlace ById</b><br/>document.getElementById", table_cell),
            Paragraph("<font color='#059669'><b>CUMPLIDO</b></font>", table_cell_bold),
            Paragraph("<code>document.getElementById('input-busqueda')</code>, <code>document.getElementById('btn-limpiar')</code>, <code>document.getElementById('contador-resultados')</code>.", table_cell)
        ],
        [
            Paragraph("<b>5. Enlace ClassName</b><br/>getElementsByClassName", table_cell),
            Paragraph("<font color='#059669'><b>CUMPLIDO</b></font>", table_cell_bold),
            Paragraph("<code>document.getElementsByClassName('producto')</code> para obtener la colección HTML interactiva de todas las 20 divisiones.", table_cell)
        ],
        [
            Paragraph("<b>6. Eventos con addEventListener</b><br/>Sin atributos HTML inline", table_cell),
            Paragraph("<font color='#059669'><b>CUMPLIDO</b></font>", table_cell_bold),
            Paragraph("<code>inputBusqueda.addEventListener('input', buscarProductos)</code>, evento <code>keyup</code> y <code>btnLimpiar.addEventListener('click', limpiarBusqueda)</code>.", table_cell)
        ],
        [
            Paragraph("<b>7. Ocultar / Mostrar display</b><br/>style.display y clases CSS", table_cell),
            Paragraph("<font color='#059669'><b>CUMPLIDO</b></font>", table_cell_bold),
            Paragraph("Uso explícito de <code>division.style.display = 'none'</code> y <code>division.style.display = ''</code>, complementado con <code>classList.add('hidden')</code>.", table_cell)
        ],
        [
            Paragraph("<b>8. Funciones explícitas</b><br/>Una función por cada acción", table_cell),
            Paragraph("<font color='#059669'><b>CUMPLIDO</b></font>", table_cell_bold),
            Paragraph("Funciones modulares: <code>buscarProductos()</code>, <code>mostrarDivision()</code>, <code>ocultarDivision()</code>, <code>mostrarTodosLosProductos()</code>, <code>actualizarContador()</code>, <code>limpiarBusqueda()</code>.", table_cell)
        ],
        [
            Paragraph("<b>9. Sin base de datos</b><br/>Lógica pura en cliente", table_cell),
            Paragraph("<font color='#059669'><b>CUMPLIDO</b></font>", table_cell_bold),
            Paragraph("100% JavaScript Vanilla en el navegador, filtrando el DOM en tiempo real con latencia cero.", table_cell)
        ]
    ]

    t_rubric = Table(rubric_data, colWidths=[130, 65, 309])
    t_rubric.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,0), primary_color),
        ('BOX', (0,0), (-1,-1), 1, border_color),
        ('INNERGRID', (0,0), (-1,-1), 0.5, border_color),
        ('VALIGN', (0,0), (-1,-1), 'MIDDLE'),
        ('TOPPADDING', (0,0), (-1,-1), 4),
        ('BOTTOMPADDING', (0,0), (-1,-1), 4),
        ('LEFTPADDING', (0,0), (-1,-1), 6),
        ('RIGHTPADDING', (0,0), (-1,-1), 6),
    ]))
    story.append(t_rubric)
    story.append(Spacer(1, 14))

    # ---------------------------------------------------------
    # SECCIÓN 2: ESTRUCTURA DEL VIDEO (TIEMPOS Y DEMOSTRACIÓN)
    # ---------------------------------------------------------
    story.append(Paragraph("2. Estructura y Cronograma del Video Demostrativo (3 a 5 min)", h1_style))
    story.append(Paragraph(
        "Para obtener la máxima calificación, el video debe grabarse en resolución mínima de <b>720p (1280x720)</b> o preferentemente <b>1080p</b>, mostrando claramente la pantalla del navegador y el editor de código:",
        body
    ))

    timeline_data = [
        [Paragraph("Tiempo", table_header), Paragraph("Etapa del Video", table_header), Paragraph("Acción en Pantalla y Objetivo", table_header)],
        [
            Paragraph("<b>0:00 - 0:35</b>", table_cell_bold),
            Paragraph("Presentación Personal y del Proyecto", table_cell),
            Paragraph("Cámara web o voz clara presentando nombres completos, materia, objetivo de la práctica y la plataforma web Red Comunitaria de Salud.", table_cell)
        ],
        [
            Paragraph("<b>0:35 - 1:45</b>", table_cell_bold),
            Paragraph("Demostración Funcional en Vivo", table_cell),
            Paragraph("Abrir <code>/noticias</code> en el navegador. Teclear 'influenza', 'caries', 'dengue', 'diabetes'. Mostrar cómo el contador cambia en tiempo real, probar el botón 'Limpiar' y forzar un término inexistente para ver la alerta de 'sin resultados'.", table_cell)
        ],
        [
            Paragraph("<b>1:45 - 2:50</b>", table_cell_bold),
            Paragraph("Explicación de la Vista Blade (HTML)", table_cell),
            Paragraph("Mostrar en VS Code el archivo <code>noticias.blade.php</code>: señalar el input con <code>id='input-busqueda'</code>, el botón <code>id='btn-limpiar'</code> y cómo cada tarjeta tiene la clase <code>producto</code> y nombres nominales como <code>prod-influenza</code>.", table_cell)
        ],
        [
            Paragraph("<b>2:50 - 4:15</b>", table_cell_bold),
            Paragraph("Explicación del Código JavaScript", table_cell),
            Paragraph("Abrir <code>buscador.js</code>: explicar el uso de <code>getElementById</code>, <code>getElementsByClassName</code>, <code>addEventListener</code>, las funciones explícitas y la alternancia con <code>style.display</code> y clases CSS.", table_cell)
        ],
        [
            Paragraph("<b>4:15 - 4:45</b>", table_cell_bold),
            Paragraph("Conclusión y Entrega", table_cell),
            Paragraph("Confirmar que no se usó base de datos, mostrar los archivos de respaldo generados y despedida formal.", table_cell)
        ]
    ]
    t_timeline = Table(timeline_data, colWidths=[65, 140, 299])
    t_timeline.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,0), colors.HexColor("#334155")),
        ('BOX', (0,0), (-1,-1), 1, border_color),
        ('INNERGRID', (0,0), (-1,-1), 0.5, border_color),
        ('VALIGN', (0,0), (-1,-1), 'MIDDLE'),
        ('TOPPADDING', (0,0), (-1,-1), 4),
        ('BOTTOMPADDING', (0,0), (-1,-1), 4),
        ('LEFTPADDING', (0,0), (-1,-1), 6),
        ('RIGHTPADDING', (0,0), (-1,-1), 6),
    ]))
    story.append(t_timeline)
    
    story.append(PageBreak())

    # ---------------------------------------------------------
    # SECCIÓN 3: GUIÓN LITERAL PASO A PASO (VOZ EN OFF O EN CLASE)
    # ---------------------------------------------------------
    story.append(Paragraph("3. Guión Literal para Grabar el Video o Exponer en Clase", h1_style))
    story.append(Paragraph("<i>(Lee o parafrasea este guión mientras realizas las acciones en pantalla)</i>", body))
    story.append(Spacer(1, 4))

    # Bloque 1
    story.append(Paragraph("▶ BLOQUE 1: INTRODUCCIÓN (0:00 - 0:35)", h2_style))
    intro_p = [
        "<b>[Voz del Estudiante]:</b> 'Hola, muy buenas tardes profesor y compañeros. En este video presento la actividad colaborativa de la materia, correspondiente a la implementación de un <b>buscador de productos y servicios por nombre utilizando JavaScript nativo</b> desde cero.<br/><br/>"
        "Tomando como base nuestra plataforma institucional <b>Red Comunitaria de Salud Pública</b>, agregamos al catálogo interactivo una barra de búsqueda en tiempo real que filtra las 20 divisiones de productos médicos y campañas oficiales sin necesidad de bases de datos ni recargas de página, cumpliendo estrictamente con los eventos, enlaces ById, enlace por ClassName y funciones explícitas solicitadas.'"
    ]
    t_box1 = Table([[Paragraph(intro_p[0], script_dialogue)]], colWidths=[504])
    t_box1.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,-1), highlight_box),
        ('BOX', (0,0), (-1,-1), 1, colors.HexColor("#bfdbfe")),
        ('TOPPADDING', (0,0), (-1,-1), 6),
        ('BOTTOMPADDING', (0,0), (-1,-1), 6),
        ('LEFTPADDING', (0,0), (-1,-1), 10),
        ('RIGHTPADDING', (0,0), (-1,-1), 10),
    ]))
    story.append(t_box1)
    story.append(Spacer(1, 8))

    # Bloque 2
    story.append(Paragraph("▶ BLOQUE 2: DEMOSTRACIÓN FUNCIONAL EN EL NAVEGADOR (0:35 - 1:45)", h2_style))
    demo_p = [
        "<b>[Voz del Estudiante - Mostrando pantalla del navegador en localhost:8000/noticias]:</b><br/>"
        "'Aquí podemos observar la vista del catálogo. En la parte superior encontramos el nuevo módulo de búsqueda con su caja de texto, botón de limpiar y el contador dinámico que inicialmente indica: <i>Mostrando 20 de 20 productos</i>.<br/><br/>"
        "<b>1. Prueba de Búsqueda 1:</b> Si escribo la palabra <b>\"influenza\"</b>, en tiempo real, conforme presiono cada tecla, el catálogo se actualiza al instante mostrando únicamente el comunicado de la Jornada Nacional de Vacunación contra la Influenza, y el contador indica <i>Mostrando 1 de 20 productos</i>.<br/><br/>"
        "<b>2. Prueba de Búsqueda 2:</b> Si ahora escribo <b>\"caries\"</b> o <b>\"dental\"</b>, el sistema localiza automáticamente los artículos relacionados con salud bucal, como la campaña escolar de detección de caries y las limpiezas dentales gratuitas.<br/><br/>"
        "<b>3. Prueba de Búsqueda 3:</b> Probemos con <b>\"dengue\"</b>. Al momento nos filtra la alerta epidemiológica preventiva contra criaderos de mosquitos.<br/><br/>"
        "<b>4. Prueba del Botón Limpiar:</b> Al presionar el botón <b>\"Limpiar\"</b>, el campo se vacía por completo, se le devuelve el foco al input y reaparecen las 20 divisiones de inmediato.<br/><br/>"
        "<b>5. Prueba de Búsqueda sin Coincidencias:</b> Si escribo un término que no existe en el catálogo, por ejemplo <b>\"radioterapia\"</b>, el sistema oculta todas las divisiones y despliega el mensaje de aviso: <i>\"No se encontraron productos coincidentes. Intente con otra palabra clave o haga clic en Limpiar\"</i>.'"
    ]
    t_box2 = Table([[Paragraph(demo_p[0], script_dialogue)]], colWidths=[504])
    t_box2.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,-1), highlight_box),
        ('BOX', (0,0), (-1,-1), 1, colors.HexColor("#bfdbfe")),
        ('TOPPADDING', (0,0), (-1,-1), 6),
        ('BOTTOMPADDING', (0,0), (-1,-1), 6),
        ('LEFTPADDING', (0,0), (-1,-1), 10),
        ('RIGHTPADDING', (0,0), (-1,-1), 10),
    ]))
    story.append(t_box2)
    story.append(Spacer(1, 8))

    # Bloque 3
    story.append(Paragraph("▶ BLOQUE 3: EXPLICACIÓN DE LA VISTA BLADE (1:45 - 2:50)", h2_style))
    blade_p = [
        "<b>[Voz del Estudiante - Cambiando a VS Code en resources/views/noticias.blade.php]:</b><br/>"
        "'Pasemos ahora a revisar el código fuente. Como primer paso de la actividad, creamos un respaldo íntegro de la versión previa en <code>noticias_respaldo_act14.blade.php</code>.<br/><br/>"
        "En nuestra vista actual <code>noticias.blade.php</code> estructuramos la interfaz con los siguientes identificadores clave:<br/>"
        "• El input de texto lleva el ID <code>id=\"input-busqueda\"</code>.<br/>"
        "• El botón de reseteo cuenta con el ID <code>id=\"btn-limpiar\"</code>.<br/>"
        "• El contador dinámico está etiquetado con <code>id=\"contador-resultados\"</code>.<br/>"
        "• El contenedor de aviso lleva <code>id=\"mensaje-sin-resultados\"</code>.<br/><br/>"
        "Cumpliendo con la instrucción de: <i>\"Definan nombres de clases de acuerdo a los nombres de los productos para poder realizar la búsqueda de las divisiones mediante el nombre de la categoría agregado al class\"</i>, cada una de las 20 divisiones del catálogo contiene:<br/>"
        "1. La clase general <b>producto</b> y <b>articulo</b>.<br/>"
        "2. La clase de su categoría: <b>vacunacion</b>, <b>dental</b>, <b>alerta</b> o <b>jornadas</b>.<br/>"
        "3. La clase nominal del producto: por ejemplo <b>prod-influenza</b>, <b>prod-caries-infantil</b>, <b>prod-dengue-zika</b>, junto con sus términos descriptivos asociados. Finalmente, al pie de la vista vinculamos nuestro script mediante <code>&lt;script src=\"{{ asset('js/buscador.js') }}\"&gt;&lt;/script&gt;</code>.'"
    ]
    t_box3 = Table([[Paragraph(blade_p[0], script_dialogue)]], colWidths=[504])
    t_box3.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,-1), highlight_box),
        ('BOX', (0,0), (-1,-1), 1, colors.HexColor("#bfdbfe")),
        ('TOPPADDING', (0,0), (-1,-1), 6),
        ('BOTTOMPADDING', (0,0), (-1,-1), 6),
        ('LEFTPADDING', (0,0), (-1,-1), 10),
        ('RIGHTPADDING', (0,0), (-1,-1), 10),
    ]))
    story.append(t_box3)
    
    story.append(PageBreak())

    # Bloque 4
    story.append(Paragraph("▶ BLOQUE 4: EXPLICACIÓN DETALLADA DEL JAVASCRIPT (2:50 - 4:15)", h2_style))
    js_p = [
        "<b>[Voz del Estudiante - Mostrando public/js/buscador.js en el editor]:</b><br/>"
        "'Ahora analicemos la lógica en JavaScript nativo en <code>buscador.js</code>, el cual está dividido en 4 secciones muy claras:<br/><br/>"
        "<b>1. Enlace a componentes mediante ById:</b><br/>"
        "Utilizamos <code>document.getElementById</code> para enlazar las referencias del input, del botón, del contador y de la alerta de resultados.<br/><br/>"
        "<b>2. Enlace a divisiones mediante ClassName:</b><br/>"
        "Con <code>document.getElementsByClassName(\"producto\")</code> capturamos la colección viva con las 20 divisiones de las tarjetas del catálogo.<br/><br/>"
        "<b>3. Funciones explícitas para cada acción:</b> En lugar de amontonar código, creamos funciones modulares con responsabilidades únicas:<br/>"
        "• <code>mostrarDivision(division)</code>: Restablece <code>division.style.display = \"\"</code> y retira la clase CSS <code>hidden</code>.<br/>"
        "• <code>ocultarDivision(division)</code>: Aplica <code>division.style.display = \"none\"</code> y agrega la clase CSS <code>hidden</code>.<br/>"
        "• <code>mostrarTodosLosProductos()</code>: Un ciclo for que muestra todas las divisiones.<br/>"
        "• <code>actualizarContador(visibles, total)</code>: Actualiza el texto en pantalla y conmuta la visibilidad de la alerta de sin resultados.<br/>"
        "• <code>buscarProductos()</code>: Es la función principal. Toma el valor del input en minúsculas con <code>.toLowerCase().trim()</code>, recorre las divisiones y compara con <code>indexOf()</code> si el texto coincide con las clases de la división (donde pusimos el nombre del producto y categoría) o con su contenido de texto. Si coincide llama a <code>mostrarDivision</code> e incrementa el contador; si no coincide llama a <code>ocultarDivision</code>.<br/>"
        "• <code>limpiarBusqueda()</code>: Limpia el texto, regresa el foco al input y restaura todas las divisiones.<br/><br/>"
        "<b>4. Asignación de eventos mediante addEventListener:</b><br/>"
        "Totalmente desacoplado del HTML, escuchamos el evento <b>input</b> y <b>keyup</b> sobre el campo de texto con <code>inputBusqueda.addEventListener(\"input\", buscarProductos)</code> para respuesta instantánea al escribir, y el evento <b>click</b> sobre el botón de limpiar con <code>btnLimpiar.addEventListener(\"click\", limpiarBusqueda)</code>.'"
    ]
    t_box4 = Table([[Paragraph(js_p[0], script_dialogue)]], colWidths=[504])
    t_box4.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,-1), highlight_box),
        ('BOX', (0,0), (-1,-1), 1, colors.HexColor("#bfdbfe")),
        ('TOPPADDING', (0,0), (-1,-1), 6),
        ('BOTTOMPADDING', (0,0), (-1,-1), 6),
        ('LEFTPADDING', (0,0), (-1,-1), 10),
        ('RIGHTPADDING', (0,0), (-1,-1), 10),
    ]))
    story.append(t_box4)
    story.append(Spacer(1, 8))

    # Bloque 5
    story.append(Paragraph("▶ BLOQUE 5: CIERRE Y CONCLUSIÓN (4:15 - 4:45)", h2_style))
    cierre_p = [
        "<b>[Voz del Estudiante - Mostrando vista general o cámara]:</b><br/>"
        "'Como podemos comprobar, la actividad cumple al 100% con todos los requisitos solicitados por el profesor:<br/>"
        "✓ Código simple, limpio y completamente explicable.<br/>"
        "✓ Enlace a componentes mediante ById y a divisiones por ClassName.<br/>"
        "✓ Asignación de eventos mediante addEventListener sin inline JS.<br/>"
        "✓ Ocultamiento y muestra mediante style.display y clases CSS.<br/>"
        "✓ Sin necesidad de base de datos.<br/>"
        "✓ Respaldo de los archivos de la actividad anterior.<br/>"
        "Adjunto al envío se entregan de manera individual y sin comprimir los archivos <code>buscador.js</code> y <code>noticias.blade.php</code>, así como este video demostrativo. Muchas gracias por su atención.'"
    ]
    t_box5 = Table([[Paragraph(cierre_p[0], script_dialogue)]], colWidths=[504])
    t_box5.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,-1), highlight_box),
        ('BOX', (0,0), (-1,-1), 1, colors.HexColor("#bfdbfe")),
        ('TOPPADDING', (0,0), (-1,-1), 6),
        ('BOTTOMPADDING', (0,0), (-1,-1), 6),
        ('LEFTPADDING', (0,0), (-1,-1), 10),
        ('RIGHTPADDING', (0,0), (-1,-1), 10),
    ]))
    story.append(t_box5)
    story.append(Spacer(1, 14))

    # ---------------------------------------------------------
    # SECCIÓN 4: PREGUNTAS FRECUENTES DEL PROFESOR
    # ---------------------------------------------------------
    story.append(Paragraph("4. Banco de Respuestas a Preguntas del Profesor en Clase", h1_style))
    story.append(Paragraph(
        "Si el docente te realiza preguntas técnicas durante la presentación o revisión, aquí tienes las respuestas fundamentadas:",
        body
    ))

    faq_data = [
        [
            Paragraph("Pregunta Probable del Docente", table_header),
            Paragraph("Respuesta Técnica Recomendada", table_header)
        ],
        [
            Paragraph("<b>¿Por qué usaron <code>getElementsByClassName</code> en lugar de <code>querySelectorAll</code>?</b>", table_cell),
            Paragraph("Porque <code>getElementsByClassName</code> devuelve un <i>HTMLCollection</i> en vivo que representa directamente la colección de divisiones en el DOM con alto rendimiento y apego estricto a la rúbrica pedagógica de la materia.", table_cell)
        ],
        [
            Paragraph("<b>¿Qué diferencia hay entre escuchar el evento <code>input</code> vs <code>keyup</code>?</b>", table_cell),
            Paragraph("<code>keyup</code> se dispara al soltar una tecla física del teclado, mientras que <code>input</code> se activa ante cualquier cambio en el valor, incluyendo pegado de texto con el mouse (clic derecho o Ctrl+V) o borrado rápido. Implementamos ambos para máxima robustez.", table_cell)
        ],
        [
            Paragraph("<b>¿Cómo se realiza la búsqueda por clases de productos?</b>", table_cell),
            Paragraph("Al leer <code>division.className.toLowerCase()</code>, obtenemos una cadena con todas las clases de la división (ej. <i>'articulo producto vacunacion prod-influenza influenza'</i>). Usamos <code>indexOf(textoBusqueda) !== -1</code> para verificar si el texto buscado coincide con la categoría o con la clase del producto.", table_cell)
        ],
        [
            Paragraph("<b>¿Cómo manejaron la visibilidad de los elementos?</b>", table_cell),
            Paragraph("Cumpliendo la rúbrica de mostrar y ocultar mediante display y clases CSS, en <code>ocultarDivision</code> asignamos <code>style.display = 'none'</code> y agregamos la clase <code>hidden</code>; en <code>mostrarDivision</code> reasignamos <code>style.display = ''</code> y removemos <code>hidden</code>.", table_cell)
        ]
    ]

    t_faq = Table(faq_data, colWidths=[180, 324])
    t_faq.setStyle(TableStyle([
        ('BACKGROUND', (0,0), (-1,0), primary_color),
        ('BOX', (0,0), (-1,-1), 1, border_color),
        ('INNERGRID', (0,0), (-1,-1), 0.5, border_color),
        ('VALIGN', (0,0), (-1,-1), 'TOP'),
        ('TOPPADDING', (0,0), (-1,-1), 5),
        ('BOTTOMPADDING', (0,0), (-1,-1), 5),
        ('LEFTPADDING', (0,0), (-1,-1), 6),
        ('RIGHTPADDING', (0,0), (-1,-1), 6),
    ]))
    story.append(t_faq)

    doc.build(story, canvasmaker=NumberedCanvas)
    print(f"PDF generado exitosamente: {filename}")

if __name__ == "__main__":
    build_pdf()
