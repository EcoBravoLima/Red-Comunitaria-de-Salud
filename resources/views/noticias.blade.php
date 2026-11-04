@extends('layouts.app')

@section('title', 'Noticias y Alertas Comunitarias')

@section('content')
<!-- Header de la Sección -->
<div class="bg-brand-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-brand-200 mb-2">
            <a href="/" class="hover:underline">Inicio</a> &gt; <span class="text-white">Noticias y Alertas</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-black tracking-tight">Comunicados, Campañas y Salud Pública</h1>
        <p class="text-brand-100 text-base sm:text-lg mt-2 max-w-3xl font-medium">
            Mantente informado sobre las jornadas de vacunación, brigadas médicas en colonias y avisos epidemiológicos de nuestra comunidad.
        </p>
    </div>
</div>

<!-- Menú de Categorías para Filtrado -->
<div class="bg-white border-b-2 border-slate-200 py-4 shadow-sm sticky top-20 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap items-center justify-between gap-3">
        <div class="flex flex-wrap items-center gap-2" id="menu-categorias">
            <span class="font-bold text-slate-700 text-sm"><i class="fa-solid fa-filter text-brand-600"></i> Categoría:</span>
            
            <!-- Botones del menú con identificadores únicos id y atributos data-categoria -->
            <button id="btn-todas" class="btn-categoria px-3.5 py-1 text-xs sm:text-sm font-bold bg-brand-600 text-white rounded-full transition" data-categoria="todas">
                Todas
            </button>
            <button id="btn-vacunacion" class="btn-categoria px-3.5 py-1 text-xs sm:text-sm font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full transition" data-categoria="vacunacion">
                Vacunación
            </button>
            <button id="btn-dental" class="btn-categoria px-3.5 py-1 text-xs sm:text-sm font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full transition" data-categoria="dental">
                Salud Dental
            </button>
            <button id="btn-alerta" class="btn-categoria px-3.5 py-1 text-xs sm:text-sm font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full transition" data-categoria="alerta">
                Alertas
            </button>
            <button id="btn-jornadas" class="btn-categoria px-3.5 py-1 text-xs sm:text-sm font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full transition" data-categoria="jornadas">
                Jornadas
            </button>
        </div>
        <div class="text-xs sm:text-sm font-bold text-slate-500">
            Actualizaciones oficiales del sector salud
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12">
    
    <!-- ============================================================== -->
    <!-- CATEGORÍA 1: VACUNACIÓN (Artículo 1 - Banner Destacado)        -->
    <!-- ============================================================== -->
    <div class="articulo vacunacion bg-gradient-to-r from-amber-500 via-amber-600 to-orange-600 rounded-2xl overflow-hidden shadow-xl text-white" data-categoria="vacunacion">
        <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
            
            <div class="p-8 lg:p-12 lg:col-span-7 space-y-4">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-black/25 text-white text-xs sm:text-sm font-black uppercase tracking-wider">
                    <i class="fa-solid fa-bullhorn animate-bounce"></i> Campaña Prioritaria Activa
                </div>
                <h2 class="text-2xl sm:text-4xl font-black leading-tight">
                    Jornada Nacional de Vacunación contra Influenza, COVID-19 y Neumococo
                </h2>
                <p class="text-amber-50 text-base leading-relaxed font-medium">
                    Del 15 de octubre al 30 de noviembre en todas las 8 unidades médicas. Dirigida especialmente a niños de 6 meses a 5 años, mujeres embarazadas, adultos mayores de 60 años y personas con diabetes o hipertensión.
                </p>
                <div class="pt-2 flex flex-wrap gap-4 items-center text-xs sm:text-sm font-bold">
                    <span><i class="fa-solid fa-calendar mr-1.5"></i> Vigente todo el mes</span>
                    <span><i class="fa-solid fa-clock mr-1.5"></i> 08:00 a 18:00 hrs</span>
                    <span><i class="fa-solid fa-shield mr-1.5"></i> 100% Gratuita</span>
                </div>
            </div>

            <div class="lg:col-span-5 h-72 lg:h-full min-h-[320px] overflow-hidden">
                <img src="{{ asset('img/noticias/noticia1.jpg') }}" 
                     alt="Vacunación Comunitaria en Clínica" 
                     class="w-full h-full object-cover">
            </div>

        </div>
    </div>

    <!-- Grid de Artículos del Catálogo -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="grid-articulos">
        
        <!-- ========================================================== -->
        <!-- CATEGORÍA 1: VACUNACIÓN (Artículos 2 al 5)                 -->
        <!-- ========================================================== -->
        
        <!-- Vacunación 2 -->
        <article class="articulo vacunacion bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="vacunacion">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion2.jpg') }}" alt="Vacunación Infantil" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-amber-50 text-amber-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Esquema Básico</span>
                        <span class="text-slate-400 font-semibold">Lunes a Viernes</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Módulos de Refuerzo de Cartilla Infantil Nacional
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Aplicación continua de vacunas hexavalente, rotavirus y triple viral (SRP) para menores de 6 años sin necesidad de cita previa.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-syringe mr-1 text-amber-500"></i> Pediatría</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Vacunación 3 -->
        <article class="articulo vacunacion bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="vacunacion">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion3.jpg') }}" alt="Vacunación VPH" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-amber-50 text-amber-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Prevención Escolar</span>
                        <span class="text-slate-400 font-semibold">Esta Semana</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Campaña de Vacunación contra el Virus del Papiloma Humano (VPH)
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Brigadas escolares recorren primarias y secundarias municipales aplicando dosis protectoras contra el cáncer cervicouterino.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-shield-virus mr-1 text-amber-500"></i> Salud Escolar</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Vacunación 4 -->
        <article class="articulo vacunacion bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="vacunacion">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion4.jpg') }}" alt="Vacunación Antirrábica" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-amber-50 text-amber-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Zoonosis</span>
                        <span class="text-slate-400 font-semibold">Fin de semana</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Jornada Municipal de Vacunación Antirrábica Canina y Felina
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Instalación de puestos móviles en parques comunitarios para inmunización gratuita de perros y gatos a partir del primer mes de vida.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-paw mr-1 text-amber-500"></i> Bienestar Animal</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Vacunación 5 -->
        <article class="articulo vacunacion bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="vacunacion">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion5.jpg') }}" alt="Vacunación Adultos" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-amber-50 text-amber-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Salud Ocupacional</span>
                        <span class="text-slate-400 font-semibold">Permanente</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Dosis de Refuerzo de Tétanos y Hepatitis B para Adultos
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Campaña enfocada en comerciantes, trabajadores manuales y del campo con módulos especiales en turnos matutino y vespertino.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-user-shield mr-1 text-amber-500"></i> Medicina Preventiva</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>


        <!-- ========================================================== -->
        <!-- CATEGORÍA 2: SALUD DENTAL (5 Artículos)                    -->
        <!-- ========================================================== -->

        <!-- Dental 1 -->
        <article class="articulo dental bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/noticia2.jpg') }}" alt="Brigada de Salud Bucal" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-teal-50 text-teal-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Odontología Infantil</span>
                        <span class="text-slate-400 font-semibold">Hace 2 días</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Semana de Detección y Prevención de Caries en Escuelas Primarias
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Nuestras brigadas odontológicas visitaron 8 escuelas del municipio brindando aplicación de flúor y kits dentales gratuitos a más de 1,200 niños.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-tooth mr-1 text-teal-600"></i> Coord. Odontología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Dental 2 -->
        <article class="articulo dental bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental2.jpg') }}" alt="Limpiezas Dentales" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-teal-50 text-teal-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Ultrasonido</span>
                        <span class="text-slate-400 font-semibold">Hace 5 días</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Programa de Limpiezas Dentales con Ultrasonido y Resinas Sin Costo
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Atención restaurativa para personas de escasos recursos y adultos mayores en los consultorios odontológicos de la red municipal.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-tooth mr-1 text-teal-600"></i> Clínica Central</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Dental 3 -->
        <article class="articulo dental bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental3.jpg') }}" alt="Técnica de Cepillado" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-teal-50 text-teal-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Educación Bucal</span>
                        <span class="text-slate-400 font-semibold">Miércoles</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Talleres Prácticos de Técnica Correcta de Cepillado y Uso de Hilo Dental
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Charlas demostrativas en salas de espera sobre hábitos de higiene bucal, uso de enjuagues y nutrición libre de azúcares cariogénicos.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-teeth mr-1 text-teal-600"></i> Promoción de la Salud</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Dental 4 -->
        <article class="articulo dental bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental4.jpg') }}" alt="Cirugía Bucal" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-teal-50 text-teal-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Urgencias Dentales</span>
                        <span class="text-slate-400 font-semibold">Horario Ampliado</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Jornada de Extracciones Simples y Alivio del Dolor Dental Agudo
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Atención prioritaria para infecciones dentales, abscesos y extracciones no complejas con instrumental completamente esterilizado.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-tooth mr-1 text-teal-600"></i> Módulo Sur</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Dental 5 -->
        <article class="articulo dental bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental5.jpg') }}" alt="Periodoncia" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-teal-50 text-teal-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Periodoncia</span>
                        <span class="text-slate-400 font-semibold">Mes de la Salud</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Diagnóstico Oportuno de Gingivitis y Enfermedad Periodontal en Diabéticos
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Revisiones dirigidas a pacientes con padecimientos crónicos para prevenir pérdida prematura de piezas dentales e infecciones bucales.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-tooth mr-1 text-teal-600"></i> Salud Integral</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>


        <!-- ========================================================== -->
        <!-- CATEGORÍA 3: ALERTAS SANITARIAS (5 Artículos)              -->
        <!-- ========================================================== -->

        <!-- Alerta 1 -->
        <article class="articulo alerta bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/noticia3.jpg') }}" alt="Alerta Dengue" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-red-50 text-red-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Alerta Sanitaria</span>
                        <span class="text-slate-400 font-semibold">Hace 4 días</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Recomendaciones para Evitar Criaderos de Mosquitos del Dengue
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Se invita a la ciudadanía a lavar, tapar, voltear y tirar recipientes que acumulen agua en patios y techos ante el incremento de lluvias recientes.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-triangle-exclamation mr-1 text-red-600"></i> Epidemiología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Alerta 2 -->
        <article class="articulo alerta bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta2.jpg') }}" alt="Alerta Bajas Temperaturas" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-red-50 text-red-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Frente Frío</span>
                        <span class="text-slate-400 font-semibold">Aviso Activo</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Aviso por Descenso Térmico e Infecciones Respiratorias Agudas
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Medidas preventivas ante frentes fríos: abrigo adecuado, consumo de vitamina C y acudir de inmediato al centro de salud si se presenta fiebre alta.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-shield-virus mr-1 text-red-600"></i> Protección Civil</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Alerta 3 -->
        <article class="articulo alerta bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta3.jpg') }}" alt="Golpe de Calor" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-red-50 text-red-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Hidratación</span>
                        <span class="text-slate-400 font-semibold">Temporada Cálida</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Aviso Preventivo: Síntomas y Manejo Inmediato del Golpe de Calor
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Distribución gratuita de sobres de Vida Suero Oral en todas las clínicas comunitarias y recomendaciones de hidratación permanente.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-sun mr-1 text-red-600"></i> Salud Preventiva</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Alerta 4 -->
        <article class="articulo alerta bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta4.jpg') }}" alt="Higiene del Agua" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-red-50 text-red-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Inocuidad</span>
                        <span class="text-slate-400 font-semibold">Aviso Sanitario</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Protocolo de Cloración de Agua y Desinfección de Alimentos Crudos
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Medidas para prevenir brotes de salmonelosis y cólera en época de calor: hervir agua de consumo y lavar minuciosamente frutas y legumbres.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-faucet-detergent mr-1 text-red-600"></i> Regulación Sanitaria</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Alerta 5 -->
        <article class="articulo alerta bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta5.jpg') }}" alt="Calidad del Aire" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-red-50 text-red-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Medio Ambiente</span>
                        <span class="text-slate-400 font-semibold">Actual</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Alerta Ambiental por Calidad del Aire y Protección para Pacientes Asmáticos
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Recomendación de suspensión de actividades cívicas al aire libre para grupos vulnerables y disponibilidad de inhaladores en salas de urgencias.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-wind mr-1 text-red-600"></i> Neumología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>


        <!-- ========================================================== -->
        <!-- CATEGORÍA 4: JORNADAS ESPECIALES (5 Artículos)             -->
        <!-- ========================================================== -->

        <!-- Jornadas 1 -->
        <article class="articulo jornadas bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="jornadas">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/noticia4.jpg') }}" alt="Salud Visual" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-emerald-50 text-emerald-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Jornada Especial</span>
                        <span class="text-slate-400 font-semibold">Hace 1 semana</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Próxima Jornada de Salud Visual: Examen de la Vista y Lentes
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Este fin de semana en el Centro Comunitario Las Torres se realizarán exámenes de optometría computarizada y entrega de anteojos graduados.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-glasses mr-1 text-emerald-600"></i> DIF y Salud</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Jornadas 2 -->
        <article class="articulo jornadas bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="jornadas">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas2.jpg') }}" alt="Mastografías" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-emerald-50 text-emerald-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Salud de la Mujer</span>
                        <span class="text-slate-400 font-semibold">Próximo Sábado</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Feria de Mastografías Gratuitas y Detección de Cáncer de Mama
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Unidad radiológica móvil para mujeres de 40 a 69 años en la Explanada Municipal con mastografías de alta definición.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-ribbon mr-1 text-emerald-600"></i> Salud Femenina</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Jornadas 3 -->
        <article class="articulo jornadas bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="jornadas">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas3.jpg') }}" alt="Brigada Rural" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-emerald-50 text-emerald-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Caravana Móvil</span>
                        <span class="text-slate-400 font-semibold">Domingo</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Brigada Médica Rural en Ejidos y Zonas Comunitarias Alejadas
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Consultas de medicina familiar, entrega gratuita de fármacos de cuadro básico y canalizaciones a especialistas hospitalarios.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-truck-medical mr-1 text-emerald-600"></i> Caravana Comunitaria</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Jornadas 4 -->
        <article class="articulo jornadas bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="jornadas">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas4.jpg') }}" alt="Detección Diabetes" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-emerald-50 text-emerald-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Enfermedades Crónicas</span>
                        <span class="text-slate-400 font-semibold">Jueves</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Jornada de Detección Temprana de Diabetes e Hipertensión Arterial
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Toma masiva de glucosa capilar en ayuno, perfil lipídico, medición de presión arterial y consulta nutricional personalizada.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-heart-pulse mr-1 text-emerald-600"></i> Medicina Interna</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Jornadas 5 -->
        <article class="articulo jornadas bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="jornadas">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas5.jpg') }}" alt="Salud Mental" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-emerald-50 text-emerald-800 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Bienestar Emocional</span>
                        <span class="text-slate-400 font-semibold">Viernes</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Jornada de Salud Emocional y Talleres de Manejo de Ansiedad y Duelo
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Sesiones de orientación psicológica comunitaria, círculos de apoyo emocional y prevención de adicciones para jóvenes y adultos.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-brain mr-1 text-emerald-600"></i> Psicología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

    </div>

</div>

<!-- Enlace al archivo JavaScript externo de la Actividad 13 -->
<script src="{{ asset('js/categorias.js') }}"></script>
@endsection
