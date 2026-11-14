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

<!-- ==================================================================== -->
<!-- PANEL DE FILTRADO POR CATEGORÍAS Y SUBCATEGORÍAS CON CHECKBOXES       -->
<!-- ==================================================================== -->
<div class="bg-white border-b-2 border-slate-200 py-6 shadow-sm sticky top-20 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
        
        <!-- Fila Superior: Título y Checkbox "Ver Todos" -->
        <div class="flex flex-wrap items-center justify-between gap-3 pb-3 border-b border-slate-100">
            <div class="flex items-center gap-2">
                <span class="w-8 h-8 rounded-lg bg-brand-50 text-brand-600 flex items-center justify-center text-base">
                    <i class="fa-solid fa-sliders"></i>
                </span>
                <div>
                    <h2 class="text-sm sm:text-base font-black text-slate-900 leading-tight">Filtro Avanzado por Subcategorías</h2>
                    <p class="text-xs text-slate-500 font-medium">Inclusión dentro de la misma categoría (OR) • Exclusión entre categorías diferentes (AND)</p>
                </div>
            </div>

            <!-- Checkbox General para Ver Todos -->
            <label for="check-todos" class="inline-flex items-center gap-2 px-4 py-2 bg-brand-50 hover:bg-brand-100 rounded-xl border border-brand-200 cursor-pointer transition select-none">
                <input type="checkbox" id="check-todos" checked class="w-4 h-4 text-brand-600 rounded focus:ring-brand-500 cursor-pointer">
                <span class="text-xs sm:text-sm font-black text-brand-700">Ver Todos los Artículos</span>
            </label>
        </div>

        <!-- Fila de Grupos: 3 Categorías con 3 Subcategorías cada una -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs sm:text-sm">
            
            <!-- DIVISIÓN 1: Tipo de Atención / Especialidad -->
            <div class="bg-slate-50 p-3.5 rounded-xl border border-slate-200">
                <h3 class="font-bold text-slate-800 text-xs uppercase tracking-wider mb-2.5 flex items-center gap-1.5">
                    <i class="fa-solid fa-stethoscope text-brand-600"></i> 1. Tipo de Atención
                </h3>
                <div class="space-y-1.5">
                    <label class="flex items-center gap-2 text-slate-700 font-medium cursor-pointer hover:text-slate-900 select-none">
                        <input type="checkbox" id="check-vacunacion" class="w-4 h-4 text-brand-600 rounded focus:ring-brand-500 cursor-pointer">
                        <span>Vacunación</span>
                    </label>
                    <label class="flex items-center gap-2 text-slate-700 font-medium cursor-pointer hover:text-slate-900 select-none">
                        <input type="checkbox" id="check-dental" class="w-4 h-4 text-brand-600 rounded focus:ring-brand-500 cursor-pointer">
                        <span>Salud Dental</span>
                    </label>
                    <label class="flex items-center gap-2 text-slate-700 font-medium cursor-pointer hover:text-slate-900 select-none">
                        <input type="checkbox" id="check-alerta" class="w-4 h-4 text-brand-600 rounded focus:ring-brand-500 cursor-pointer">
                        <span>Alertas y Preventiva</span>
                    </label>
                </div>
            </div>

            <!-- DIVISIÓN 2: Población Dirigida -->
            <div class="bg-slate-50 p-3.5 rounded-xl border border-slate-200">
                <h3 class="font-bold text-slate-800 text-xs uppercase tracking-wider mb-2.5 flex items-center gap-1.5">
                    <i class="fa-solid fa-users text-purple-600"></i> 2. Población Objetivo
                </h3>
                <div class="space-y-1.5">
                    <label class="flex items-center gap-2 text-slate-700 font-medium cursor-pointer hover:text-slate-900 select-none">
                        <input type="checkbox" id="check-infantil" class="w-4 h-4 text-purple-600 rounded focus:ring-purple-500 cursor-pointer">
                        <span>Infantil y Escolar</span>
                    </label>
                    <label class="flex items-center gap-2 text-slate-700 font-medium cursor-pointer hover:text-slate-900 select-none">
                        <input type="checkbox" id="check-adultos" class="w-4 h-4 text-purple-600 rounded focus:ring-purple-500 cursor-pointer">
                        <span>Adultos y Trabajadores</span>
                    </label>
                    <label class="flex items-center gap-2 text-slate-700 font-medium cursor-pointer hover:text-slate-900 select-none">
                        <input type="checkbox" id="check-mayor" class="w-4 h-4 text-purple-600 rounded focus:ring-purple-500 cursor-pointer">
                        <span>Adultos Mayores</span>
                    </label>
                </div>
            </div>

            <!-- DIVISIÓN 3: Modalidad de Atención -->
            <div class="bg-slate-50 p-3.5 rounded-xl border border-slate-200">
                <h3 class="font-bold text-slate-800 text-xs uppercase tracking-wider mb-2.5 flex items-center gap-1.5">
                    <i class="fa-solid fa-location-dot text-emerald-600"></i> 3. Modalidad / Sede
                </h3>
                <div class="space-y-1.5">
                    <label class="flex items-center gap-2 text-slate-700 font-medium cursor-pointer hover:text-slate-900 select-none">
                        <input type="checkbox" id="check-clinica" class="w-4 h-4 text-emerald-600 rounded focus:ring-emerald-500 cursor-pointer">
                        <span>Unidad Médica Fija</span>
                    </label>
                    <label class="flex items-center gap-2 text-slate-700 font-medium cursor-pointer hover:text-slate-900 select-none">
                        <input type="checkbox" id="check-brigada" class="w-4 h-4 text-emerald-600 rounded focus:ring-emerald-500 cursor-pointer">
                        <span>Brigada Móvil / Parques</span>
                    </label>
                    <label class="flex items-center gap-2 text-slate-700 font-medium cursor-pointer hover:text-slate-900 select-none">
                        <input type="checkbox" id="check-escuela" class="w-4 h-4 text-emerald-600 rounded focus:ring-emerald-500 cursor-pointer">
                        <span>Planteles Escolares</span>
                    </label>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- ==================================================================== -->
<!-- CATÁLOGO DE ARTÍCULOS CON CLASES DE SUBCATEGORÍAS ASIGNADAS          -->
<!-- ==================================================================== -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12">
    
    <!-- Artículo 1 (Banner Destacado): Vacunación + Adultos Mayores + Clínica Fija -->
    <div class="articulo sub-vacunacion sub-mayor sub-clinica bg-gradient-to-r from-amber-500 via-amber-600 to-orange-600 rounded-2xl overflow-hidden shadow-xl text-white" data-categoria="vacunacion">
        <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
            
            <div class="p-8 lg:p-12 lg:col-span-7 space-y-4">
                <div class="flex flex-wrap gap-2 items-center">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-black/25 text-white text-xs font-black uppercase tracking-wider">
                        <i class="fa-solid fa-bullhorn"></i> Campaña Prioritaria
                    </span>
                    <span class="px-2.5 py-0.5 rounded-full bg-white/20 text-white text-xs font-bold">Adultos Mayores</span>
                    <span class="px-2.5 py-0.5 rounded-full bg-white/20 text-white text-xs font-bold">Clínica Fija</span>
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
        <!-- CATEGORÍA: VACUNACIÓN (Artículos 2 al 5)                   -->
        <!-- ========================================================== -->
        
        <!-- Artículo 2: Vacunación + Infantil + Clínica Fija -->
        <article class="articulo sub-vacunacion sub-infantil sub-clinica bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="vacunacion">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion2.jpg') }}" alt="Vacunación Infantil" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Módulos de Refuerzo de Cartilla Infantil Nacional
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Aplicación continua de vacunas hexavalente, rotavirus y triple viral (SRP) para menores de 6 años en las 8 unidades médicas.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-syringe mr-1 text-amber-500"></i> Pediatría</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 3: Vacunación + Infantil + Escuelas -->
        <article class="articulo sub-vacunacion sub-infantil sub-escuela bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="vacunacion">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion3.jpg') }}" alt="Vacunación VPH" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil / Escolar</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
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

        <!-- Artículo 4: Vacunación + Adultos + Brigada Móvil -->
        <article class="articulo sub-vacunacion sub-adultos sub-brigada bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="vacunacion">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion4.jpg') }}" alt="Vacunación Antirrábica" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos y Familias</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
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

        <!-- Artículo 5: Vacunación + Adultos + Clínica Fija -->
        <article class="articulo sub-vacunacion sub-adultos sub-clinica bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="vacunacion">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion5.jpg') }}" alt="Vacunación Adultos" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
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
        <!-- CATEGORÍA: SALUD DENTAL (5 Artículos)                      -->
        <!-- ========================================================== -->

        <!-- Artículo 6: Dental + Infantil + Escuelas -->
        <article class="articulo sub-dental sub-infantil sub-escuela bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/noticia2.jpg') }}" alt="Brigada de Salud Bucal" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil / Escolar</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
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

        <!-- Artículo 7: Dental + Adultos Mayores + Clínica Fija -->
        <article class="articulo sub-dental sub-mayor sub-clinica bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental2.jpg') }}" alt="Limpiezas Dentales" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
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

        <!-- Artículo 8: Dental + Infantil + Brigada Móvil -->
        <article class="articulo sub-dental sub-infantil sub-brigada bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental3.jpg') }}" alt="Técnica de Cepillado" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil y Familias</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Talleres Prácticos de Técnica Correcta de Cepillado y Uso de Hilo Dental
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Charlas demostrativas en plazas públicas sobre higiene bucal, uso de enjuagues y nutrición libre de azúcares cariogénicos.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-teeth mr-1 text-teal-600"></i> Promoción de la Salud</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 9: Dental + Adultos + Clínica Fija -->
        <article class="articulo sub-dental sub-adultos sub-clinica bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental4.jpg') }}" alt="Cirugía Bucal" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
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

        <!-- Artículo 10: Dental + Adultos Mayores + Clínica Fija -->
        <article class="articulo sub-dental sub-mayor sub-clinica bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental5.jpg') }}" alt="Periodoncia" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
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
        <!-- CATEGORÍA: ALERTAS Y MEDICINA PREVENTIVA (10 Artículos)    -->
        <!-- ========================================================== -->

        <!-- Artículo 11: Alerta + Adultos + Brigada Móvil -->
        <article class="articulo sub-alerta sub-adultos sub-brigada bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/noticia3.jpg') }}" alt="Alerta Dengue" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos / Hogares</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
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

        <!-- Artículo 12: Alerta + Adultos Mayores + Clínica Fija -->
        <article class="articulo sub-alerta sub-mayor sub-clinica bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta2.jpg') }}" alt="Alerta Bajas Temperaturas" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
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

        <!-- Artículo 13: Alerta + Adultos + Brigada Móvil -->
        <article class="articulo sub-alerta sub-adultos sub-brigada bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta3.jpg') }}" alt="Golpe de Calor" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos y Trabajadores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Aviso Preventivo: Síntomas y Manejo Inmediato del Golpe de Calor
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Distribución gratuita de sobres de Vida Suero Oral en módulos móviles comunitarios y recomendaciones de hidratación permanente.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-sun mr-1 text-red-600"></i> Salud Preventiva</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 14: Alerta + Adultos + Planteles Escolares -->
        <article class="articulo sub-alerta sub-adultos sub-escuela bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta4.jpg') }}" alt="Higiene del Agua" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos / Familias</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Protocolo de Cloración de Agua y Desinfección de Alimentos Crudos
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Talleres en cooperativas escolares para prevenir brotes de salmonelosis y cólera: hervir agua de consumo y lavar minuciosamente alimentos.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-faucet-detergent mr-1 text-red-600"></i> Regulación Sanitaria</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 15: Alerta + Infantil + Planteles Escolares -->
        <article class="articulo sub-alerta sub-infantil sub-escuela bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta5.jpg') }}" alt="Calidad del Aire" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Alerta Ambiental por Calidad del Aire y Protección para Pacientes Asmáticos
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Recomendación de suspensión de actividades cívicas al aire libre en escuelas para niños vulnerables y disponibilidad de inhaladores.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-wind mr-1 text-red-600"></i> Neumología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 16: Alerta + Adultos Mayores + Brigada Móvil -->
        <article class="articulo sub-alerta sub-mayor sub-brigada bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/noticia4.jpg') }}" alt="Salud Visual" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
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

        <!-- Artículo 17: Alerta + Adultos + Brigada Móvil -->
        <article class="articulo sub-alerta sub-adultos sub-brigada bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas2.jpg') }}" alt="Mastografías" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos / Mujeres</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
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

        <!-- Artículo 18: Vacunación + Adultos Mayores + Brigada Móvil -->
        <article class="articulo sub-vacunacion sub-mayor sub-brigada bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="vacunacion">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas3.jpg') }}" alt="Brigada Rural" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Brigada Médica Rural en Ejidos y Zonas Comunitarias Alejadas
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Consultas de medicina familiar, vacunación geriátrica y entrega gratuita de fármacos de cuadro básico en unidades móviles.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-truck-medical mr-1 text-emerald-600"></i> Caravana Comunitaria</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 19: Alerta + Adultos Mayores + Clínica Fija -->
        <article class="articulo sub-alerta sub-mayor sub-clinica bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas4.jpg') }}" alt="Detección Diabetes" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
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

        <!-- Artículo 20: Alerta + Infantil + Planteles Escolares -->
        <article class="articulo sub-alerta sub-infantil sub-escuela bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas5.jpg') }}" alt="Salud Mental" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil y Jóvenes</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Jornada de Salud Emocional y Talleres de Manejo de Ansiedad y Duelo
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Sesiones de orientación psicológica comunitaria, círculos de apoyo emocional y prevención de adicciones en secundarias.
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

<!-- Enlace al archivo JavaScript externo de la Actividad de Subcategorías -->
<script src="{{ asset('js/subcategorias.js') }}"></script>
@endsection
