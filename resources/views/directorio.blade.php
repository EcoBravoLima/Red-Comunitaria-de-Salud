@extends('layouts.app')

@section('title', 'Directorio de Hospitales y Clínicas')

@section('content')
<!-- Encabezado de Sección -->
<div class="bg-brand-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <nav class="text-xs text-brand-200 mb-2">
                    <a href="/" class="hover:underline">Inicio</a> &gt; <span class="text-white">Directorio de Clínicas</span>
                </nav>
                <h1 class="text-3xl sm:text-4xl font-black tracking-tight">Directorio Municipal de Hospitales y Clínicas</h1>
                <p class="text-brand-100 text-base mt-1.5 font-medium">8 unidades médicas y hospitales comunitarios distribuidos en todos los sectores del municipio.</p>
            </div>
            <div>
                <a href="/citas" class="bg-accent-500 hover:bg-accent-600 text-white font-extrabold text-sm sm:text-base px-6 py-3.5 rounded-xl shadow-lg inline-flex items-center gap-2">
                    <i class="fa-solid fa-calendar-plus"></i> Agendar Cita en Línea
                </a>
            </div>
        </div>
    </div>
</div>

<!-- BARRA INTEGRAL DE FILTROS EN TIEMPO REAL -->
<div class="bg-white border-b-2 border-slate-200 shadow-md sticky top-20 z-40 py-5">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
        
        <!-- Fila 1 de Filtros: Buscador + Selectores -->
        <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            
            <!-- Buscador de texto -->
            <div class="sm:col-span-5 relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-slate-400 text-base"></i>
                <input type="text" id="filter-search" 
                       placeholder="Buscar por nombre, calle, colonia o servicio..." 
                       class="w-full pl-11 pr-4 py-2.5 text-sm sm:text-base font-medium rounded-xl border-2 border-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:border-brand-500 bg-slate-50">
            </div>

            <!-- Filtro por Zona -->
            <div class="sm:col-span-3">
                <select id="filter-zone" class="w-full py-2.5 px-3.5 text-sm sm:text-base font-semibold rounded-xl border-2 border-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500 bg-slate-50">
                    <option value="">Todas las Zonas (Norte, Sur, Oriente...)</option>
                    <option value="centro">Sector Centro</option>
                    <option value="norte">Sector Norte</option>
                    <option value="sur">Sector Sur</option>
                    <option value="oriente">Sector Oriente</option>
                    <option value="poniente">Sector Poniente</option>
                    <option value="rural">Sector Rural</option>
                </select>
            </div>

            <!-- Filtro por Especialidad -->
            <div class="sm:col-span-3">
                <select id="filter-specialty" class="w-full py-2.5 px-3.5 text-sm sm:text-base font-semibold rounded-xl border-2 border-slate-300 focus:outline-none focus:ring-2 focus:ring-brand-500 bg-slate-50">
                    <option value="">Todas las Especialidades</option>
                    <option value="general">Medicina General</option>
                    <option value="urgencias">Urgencias 24h</option>
                    <option value="dental">Odontología</option>
                    <option value="pediatria">Pediatría</option>
                    <option value="ginecologia">Ginecología</option>
                    <option value="laboratorio">Laboratorio Clínico</option>
                    <option value="nutricion">Nutrición</option>
                </select>
            </div>

            <!-- Botón de Limpiar Filtros -->
            <div class="sm:col-span-1">
                <button type="button" id="btn-reset-filters" class="w-full py-2.5 px-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs sm:text-sm rounded-xl border border-slate-300 transition" title="Restablecer filtros">
                    <i class="fa-solid fa-rotate-left"></i> Limpiar
                </button>
            </div>

        </div>

        <!-- Fila 2 de Filtros: Etiquetas Rápidas (Pills) -->
        <div class="flex flex-wrap items-center justify-between gap-2 pt-1 border-t border-slate-100 text-xs sm:text-sm">
            <div class="flex flex-wrap items-center gap-2">
                <span class="font-bold text-slate-700 mr-1"><i class="fa-solid fa-filter text-brand-600"></i> Filtros Rápidos:</span>
                <button type="button" onclick="setQuickFilter('')" class="pill-filter px-3 py-1 rounded-full font-bold bg-brand-600 text-white shadow-sm transition">Todos</button>
                <button type="button" onclick="setQuickFilter('urgencias')" class="pill-filter px-3 py-1 rounded-full font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 transition">Urgencias 24 Horas</button>
                <button type="button" onclick="setQuickFilter('laboratorio')" class="pill-filter px-3 py-1 rounded-full font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 transition">Con Laboratorio</button>
                <button type="button" onclick="setQuickFilter('dental')" class="pill-filter px-3 py-1 rounded-full font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 transition">Odontología</button>
                <button type="button" onclick="setQuickFilter('norte')" class="pill-filter px-3 py-1 rounded-full font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 transition">Sector Norte</button>
            </div>

            <div class="font-bold text-brand-700 bg-brand-50 px-3 py-1 rounded-lg border border-brand-200">
                <span id="clinicas-count">Mostrando 8 unidades médicas</span>
            </div>
        </div>

    </div>
</div>

<!-- Contenido Principal: Listado de 8 Hospitales/Clínicas + Mapa -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Columna Izquierda: Tarjetas de Clínicas (7 columnas) -->
        <div class="lg:col-span-7 space-y-6" id="clinicas-container">
            
            <!-- Clínica 1 -->
            <article class="clinica-card bg-white rounded-2xl shadow-sm border-2 border-slate-200 p-5 hover:border-brand-500 hover:shadow-xl transition flex flex-col sm:flex-row gap-5"
                     data-name="Hospital Comunitario San Jerónimo" data-zone="centro" data-specialties="general pediatria dental laboratorio urgencias">
                <img src="{{ asset('img/clinicas/clinica1.jpg') }}" 
                     alt="Hospital Comunitario San Jerónimo" 
                     class="w-full sm:w-48 h-40 rounded-xl object-cover flex-shrink-0">
                <div class="flex-grow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start">
                            <span class="text-xs font-black uppercase tracking-wider text-brand-600">Sector Centro • Módulo 01</span>
                            <span class="bg-red-100 text-red-700 text-xs font-black px-2.5 py-0.5 rounded-full">Urgencias 24h</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mt-1">Hospital Comunitario San Jerónimo</h3>
                        <p class="text-sm text-slate-600 mt-1 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-location-dot text-brand-500"></i> Calle Independencia #102, Col. San Jerónimo
                        </p>
                        <p class="text-sm text-slate-600 mt-0.5 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-phone text-slate-400"></i> Tel: (55) 5890-1122
                        </p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-200 flex flex-wrap items-center justify-between gap-2">
                        <div class="flex flex-wrap gap-1.5 text-xs font-semibold">
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">General</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Dental</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Laboratorio</span>
                        </div>
                        <a href="/citas" class="text-sm font-extrabold text-brand-600 hover:text-brand-800 flex items-center gap-1">
                            Agendar Cita <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Clínica 2 -->
            <article class="clinica-card bg-white rounded-2xl shadow-sm border-2 border-slate-200 p-5 hover:border-brand-500 hover:shadow-xl transition flex flex-col sm:flex-row gap-5"
                     data-name="Clínica Materno Benito Juárez" data-zone="norte" data-specialties="general ginecologia pediatria">
                <img src="{{ asset('img/clinicas/clinica2.jpg') }}" 
                     alt="Clínica Materno Benito Juárez" 
                     class="w-full sm:w-48 h-40 rounded-xl object-cover flex-shrink-0">
                <div class="flex-grow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start">
                            <span class="text-xs font-black uppercase tracking-wider text-brand-600">Sector Norte • Módulo 02</span>
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-black px-2.5 py-0.5 rounded-full">Abierto 7-20h</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mt-1">Clínica Materno Benito Juárez</h3>
                        <p class="text-sm text-slate-600 mt-1 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-location-dot text-brand-500"></i> Av. De los Maestros #240, Col. Libertad
                        </p>
                        <p class="text-sm text-slate-600 mt-0.5 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-phone text-slate-400"></i> Tel: (55) 5890-4455
                        </p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-200 flex flex-wrap items-center justify-between gap-2">
                        <div class="flex flex-wrap gap-1.5 text-xs font-semibold">
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Ginecología</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Pediatría</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Vacunas</span>
                        </div>
                        <a href="/citas" class="text-sm font-extrabold text-brand-600 hover:text-brand-800 flex items-center gap-1">
                            Agendar Cita <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Clínica 3 -->
            <article class="clinica-card bg-white rounded-2xl shadow-sm border-2 border-slate-200 p-5 hover:border-brand-500 hover:shadow-xl transition flex flex-col sm:flex-row gap-5"
                     data-name="Centro de Salud Los Olivos" data-zone="oriente" data-specialties="general laboratorio nutricion">
                <img src="{{ asset('img/clinicas/clinica3.jpg') }}" 
                     alt="Centro de Salud Los Olivos" 
                     class="w-full sm:w-48 h-40 rounded-xl object-cover flex-shrink-0">
                <div class="flex-grow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start">
                            <span class="text-xs font-black uppercase tracking-wider text-brand-600">Sector Oriente • Módulo 03</span>
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-black px-2.5 py-0.5 rounded-full">Abierto 7-20h</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mt-1">Centro de Salud Los Olivos</h3>
                        <p class="text-sm text-slate-600 mt-1 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-location-dot text-brand-500"></i> Calzada de las Palmas #880, Col. Olivos
                        </p>
                        <p class="text-sm text-slate-600 mt-0.5 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-phone text-slate-400"></i> Tel: (55) 5890-7788
                        </p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-200 flex flex-wrap items-center justify-between gap-2">
                        <div class="flex flex-wrap gap-1.5 text-xs font-semibold">
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Medicina General</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Laboratorio</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Nutrición</span>
                        </div>
                        <a href="/citas" class="text-sm font-extrabold text-brand-600 hover:text-brand-800 flex items-center gap-1">
                            Agendar Cita <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Clínica 4 -->
            <article class="clinica-card bg-white rounded-2xl shadow-sm border-2 border-slate-200 p-5 hover:border-brand-500 hover:shadow-xl transition flex flex-col sm:flex-row gap-5"
                     data-name="Unidad Integral Las Torres" data-zone="poniente" data-specialties="general dental urgencias">
                <img src="{{ asset('img/clinicas/clinica4.jpg') }}" 
                     alt="Unidad Integral Las Torres" 
                     class="w-full sm:w-48 h-40 rounded-xl object-cover flex-shrink-0">
                <div class="flex-grow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start">
                            <span class="text-xs font-black uppercase tracking-wider text-brand-600">Sector Poniente • Módulo 04</span>
                            <span class="bg-red-100 text-red-700 text-xs font-black px-2.5 py-0.5 rounded-full">Urgencias 24h</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mt-1">Unidad Integral Las Torres</h3>
                        <p class="text-sm text-slate-600 mt-1 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-location-dot text-brand-500"></i> Av. Tecnológico #510, Fracc. Las Torres
                        </p>
                        <p class="text-sm text-slate-600 mt-0.5 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-phone text-slate-400"></i> Tel: (55) 5890-9900
                        </p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-200 flex flex-wrap items-center justify-between gap-2">
                        <div class="flex flex-wrap gap-1.5 text-xs font-semibold">
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Odontología</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Psicología</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Urgencias</span>
                        </div>
                        <a href="/citas" class="text-sm font-extrabold text-brand-600 hover:text-brand-800 flex items-center gap-1">
                            Agendar Cita <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Clínica 5 (NUEVA: Hospital Comunitario Esperanza Viva) -->
            <article class="clinica-card bg-white rounded-2xl shadow-sm border-2 border-slate-200 p-5 hover:border-brand-500 hover:shadow-xl transition flex flex-col sm:flex-row gap-5"
                     data-name="Hospital Comunitario Esperanza Viva" data-zone="sur" data-specialties="general pediatria ginecologia urgencias laboratorio">
                <img src="{{ asset('img/clinicas/clinica5.jpg') }}" 
                     alt="Hospital Comunitario Esperanza Viva" 
                     class="w-full sm:w-48 h-40 rounded-xl object-cover flex-shrink-0">
                <div class="flex-grow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start">
                            <span class="text-xs font-black uppercase tracking-wider text-brand-600">Sector Sur • Módulo 05</span>
                            <span class="bg-red-100 text-red-700 text-xs font-black px-2.5 py-0.5 rounded-full">Urgencias 24h</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mt-1">Hospital Comunitario Esperanza Viva</h3>
                        <p class="text-sm text-slate-600 mt-1 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-location-dot text-brand-500"></i> Calzada del Sur #1200, Col. Esperanza
                        </p>
                        <p class="text-sm text-slate-600 mt-0.5 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-phone text-slate-400"></i> Tel: (55) 5891-2233
                        </p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-200 flex flex-wrap items-center justify-between gap-2">
                        <div class="flex flex-wrap gap-1.5 text-xs font-semibold">
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Ginecología</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Pediatría</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Laboratorio</span>
                        </div>
                        <a href="/citas" class="text-sm font-extrabold text-brand-600 hover:text-brand-800 flex items-center gap-1">
                            Agendar Cita <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Clínica 6 (NUEVA: Clínica de Atención Valle Verde) -->
            <article class="clinica-card bg-white rounded-2xl shadow-sm border-2 border-slate-200 p-5 hover:border-brand-500 hover:shadow-xl transition flex flex-col sm:flex-row gap-5"
                     data-name="Clínica Familiar Valle Verde" data-zone="norte" data-specialties="general dental nutricion">
                <img src="{{ asset('img/clinicas/clinica6.jpg') }}" 
                     alt="Clínica Familiar Valle Verde" 
                     class="w-full sm:w-48 h-40 rounded-xl object-cover flex-shrink-0">
                <div class="flex-grow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start">
                            <span class="text-xs font-black uppercase tracking-wider text-brand-600">Sector Norte • Módulo 06</span>
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-black px-2.5 py-0.5 rounded-full">Abierto 7-19h</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mt-1">Clínica Familiar Valle Verde</h3>
                        <p class="text-sm text-slate-600 mt-1 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-location-dot text-brand-500"></i> Blvd. Los Pinos #45, Fracc. Valle Verde
                        </p>
                        <p class="text-sm text-slate-600 mt-0.5 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-phone text-slate-400"></i> Tel: (55) 5891-6677
                        </p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-200 flex flex-wrap items-center justify-between gap-2">
                        <div class="flex flex-wrap gap-1.5 text-xs font-semibold">
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">General</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Odontología</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Nutrición</span>
                        </div>
                        <a href="/citas" class="text-sm font-extrabold text-brand-600 hover:text-brand-800 flex items-center gap-1">
                            Agendar Cita <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Clínica 7 (NUEVA: Centro Médico Guadalupe Hidalgo) -->
            <article class="clinica-card bg-white rounded-2xl shadow-sm border-2 border-slate-200 p-5 hover:border-brand-500 hover:shadow-xl transition flex flex-col sm:flex-row gap-5"
                     data-name="Centro Médico Guadalupe Hidalgo" data-zone="oriente" data-specialties="general pediatria dental">
                <img src="{{ asset('img/clinicas/clinica7.jpg') }}" 
                     alt="Centro Médico Guadalupe Hidalgo" 
                     class="w-full sm:w-48 h-40 rounded-xl object-cover flex-shrink-0">
                <div class="flex-grow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start">
                            <span class="text-xs font-black uppercase tracking-wider text-brand-600">Sector Oriente • Módulo 07</span>
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-black px-2.5 py-0.5 rounded-full">Abierto 7-20h</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mt-1">Centro Médico Guadalupe Hidalgo</h3>
                        <p class="text-sm text-slate-600 mt-1 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-location-dot text-brand-500"></i> Av. Hidalgo #330, Barrio Guadalupe
                        </p>
                        <p class="text-sm text-slate-600 mt-0.5 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-phone text-slate-400"></i> Tel: (55) 5891-8899
                        </p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-200 flex flex-wrap items-center justify-between gap-2">
                        <div class="flex flex-wrap gap-1.5 text-xs font-semibold">
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Medicina Familiar</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Salud Bucal</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Pediatría</span>
                        </div>
                        <a href="/citas" class="text-sm font-extrabold text-brand-600 hover:text-brand-800 flex items-center gap-1">
                            Agendar Cita <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Clínica 8 (NUEVA: Unidad Rural El Roble) -->
            <article class="clinica-card bg-white rounded-2xl shadow-sm border-2 border-slate-200 p-5 hover:border-brand-500 hover:shadow-xl transition flex flex-col sm:flex-row gap-5"
                     data-name="Unidad Rural de Atención El Roble" data-zone="rural" data-specialties="general urgencias vacunas">
                <img src="{{ asset('img/clinicas/clinica8.jpg') }}" 
                     alt="Unidad Rural de Atención El Roble" 
                     class="w-full sm:w-48 h-40 rounded-xl object-cover flex-shrink-0">
                <div class="flex-grow flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start">
                            <span class="text-xs font-black uppercase tracking-wider text-brand-600">Sector Rural • Módulo 08</span>
                            <span class="bg-emerald-100 text-emerald-800 text-xs font-black px-2.5 py-0.5 rounded-full">Abierto 8-18h</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mt-1">Unidad Rural de Atención El Roble</h3>
                        <p class="text-sm text-slate-600 mt-1 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-location-dot text-brand-500"></i> Carretera Nacional Km 14, Ejido El Roble
                        </p>
                        <p class="text-sm text-slate-600 mt-0.5 flex items-center gap-1.5 font-medium">
                            <i class="fa-solid fa-phone text-slate-400"></i> Tel: (55) 5892-0011
                        </p>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-200 flex flex-wrap items-center justify-between gap-2">
                        <div class="flex flex-wrap gap-1.5 text-xs font-semibold">
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Medicina General</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Vacunación</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-0.5 rounded">Urgencias Menores</span>
                        </div>
                        <a href="/citas" class="text-sm font-extrabold text-brand-600 hover:text-brand-800 flex items-center gap-1">
                            Agendar Cita <i class="fa-solid fa-arrow-right text-xs"></i>
                        </a>
                    </div>
                </div>
            </article>

            <!-- Mensaje de no resultados cuando se filtra -->
            <div id="no-results" class="hidden p-8 bg-amber-50 rounded-2xl border-2 border-amber-200 text-center">
                <i class="fa-solid fa-triangle-exclamation text-3xl text-amber-500 mb-2"></i>
                <h4 class="text-lg font-bold text-slate-900">No se encontraron unidades con ese criterio</h4>
                <p class="text-sm text-slate-600 mt-1">Intenta con otra palabra clave o restablece los filtros para ver las 8 clínicas disponibles.</p>
                <button type="button" onclick="resetAllFilters()" class="mt-4 px-4 py-2 bg-brand-600 text-white font-bold text-xs rounded-lg shadow">
                    Restablecer Filtros
                </button>
            </div>

        </div>

        <!-- Columna Derecha: Mapa y Módulo de Asistencia (5 columnas - Sticky) -->
        <div class="lg:col-span-5 space-y-6 lg:sticky lg:top-44">
            
            <!-- Contenedor del Mapa -->
            <div class="bg-white rounded-2xl shadow-sm border-2 border-slate-200 overflow-hidden">
                <div class="p-4 bg-slate-100 border-b border-slate-200 flex justify-between items-center">
                    <span class="text-sm font-bold text-slate-800 flex items-center gap-2">
                        <i class="fa-solid fa-map-location-dot text-brand-600 text-base"></i> Red Municipal en Mapa
                    </span>
                    <span class="text-xs text-slate-500 font-semibold">8 ubicaciones activas</span>
                </div>
                
                <div class="relative h-88 w-full bg-slate-200">
                    <iframe class="w-full h-full border-0" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120440.54877717618!2d-99.20816999999999!3d19.4326077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff35f5bd1563%3A0x6c366f0e2de02ff7!2sHospital%20General%20de%20M%C3%A9xico!5e0!3m2!1ses-419!2smx!4v1696000000000!5m2!1ses-419!2smx" 
                            loading="lazy" 
                            title="Mapa de localización de hospitales y clínicas"
                            referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <div class="p-4 bg-slate-50 text-xs sm:text-sm text-slate-700 border-t border-slate-200">
                    <div class="flex items-center justify-between font-semibold">
                        <span><i class="fa-solid fa-circle text-emerald-500 text-[10px] mr-1"></i> Abierta</span>
                        <span><i class="fa-solid fa-ambulance text-red-500 text-[10px] mr-1"></i> Urgencias 24h</span>
                        <span><i class="fa-solid fa-location-dot text-brand-600 text-[10px] mr-1"></i> 8 Módulos</span>
                    </div>
                </div>
            </div>

            <!-- Tarjeta de Asistencia Telefónica Inmediata -->
            <div class="bg-gradient-to-br from-brand-700 to-brand-900 rounded-2xl p-6 text-white shadow-xl">
                <div class="flex items-start gap-3.5">
                    <div class="w-11 h-11 rounded-xl bg-white/15 flex items-center justify-center text-accent-500 text-2xl flex-shrink-0">
                        <i class="fa-solid fa-headset"></i>
                    </div>
                    <div>
                        <h4 class="text-base font-bold">¿Dudas sobre qué clínica te corresponde?</h4>
                        <p class="text-xs sm:text-sm text-brand-100 mt-1 leading-relaxed">
                            Llama a nuestra mesa de orientación ciudadana. Con tu código postal o colonia te canalizamos a la clínica correcta.
                        </p>
                        <div class="mt-4">
                            <a href="tel:8007258300" class="inline-flex items-center gap-2 bg-accent-500 hover:bg-accent-600 text-white font-extrabold text-xs sm:text-sm px-4 py-2.5 rounded-xl transition shadow">
                                <i class="fa-solid fa-phone"></i> 800-72583-00 (Sin Costo)
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

<!-- SCRIPT DE FILTRADO EN TIEMPO REAL -->
<script>
    const searchInput = document.getElementById('filter-search');
    const zoneSelect = document.getElementById('filter-zone');
    const specialtySelect = document.getElementById('filter-specialty');
    const cards = document.querySelectorAll('.clinica-card');
    const noResults = document.getElementById('no-results');
    const countDisplay = document.getElementById('clinicas-count');
    const btnReset = document.getElementById('btn-reset-filters');

    function applyFilters() {
        const query = (searchInput.value || '').toLowerCase().trim();
        const zone = (zoneSelect.value || '').toLowerCase();
        const specialty = (specialtySelect.value || '').toLowerCase();

        let visibleCount = 0;

        cards.forEach(card => {
            const cardName = card.getAttribute('data-name').toLowerCase();
            const cardZone = card.getAttribute('data-zone').toLowerCase();
            const cardSpecs = card.getAttribute('data-specialties').toLowerCase();
            const textContent = card.innerText.toLowerCase();

            const matchesQuery = !query || textContent.includes(query) || cardName.includes(query);
            const matchesZone = !zone || cardZone === zone;
            const matchesSpecialty = !specialty || cardSpecs.includes(specialty);

            if (matchesQuery && matchesZone && matchesSpecialty) {
                card.classList.remove('hidden');
                visibleCount++;
            } else {
                card.classList.add('hidden');
            }
        });

        countDisplay.textContent = `Mostrando ${visibleCount} de ${cards.length} unidades médicas`;
        if (visibleCount === 0) {
            noResults.classList.remove('hidden');
        } else {
            noResults.classList.add('hidden');
        }
    }

    searchInput.addEventListener('input', applyFilters);
    zoneSelect.addEventListener('change', applyFilters);
    specialtySelect.addEventListener('change', applyFilters);

    function setQuickFilter(term) {
        if (!term) {
            resetAllFilters();
            return;
        }
        if (['centro', 'norte', 'sur', 'oriente', 'poniente', 'rural'].includes(term)) {
            zoneSelect.value = term;
            specialtySelect.value = '';
        } else {
            specialtySelect.value = term;
            zoneSelect.value = '';
        }
        applyFilters();
    }

    function resetAllFilters() {
        searchInput.value = '';
        zoneSelect.value = '';
        specialtySelect.value = '';
        applyFilters();
    }

    btnReset.addEventListener('click', resetAllFilters);
</script>
@endsection