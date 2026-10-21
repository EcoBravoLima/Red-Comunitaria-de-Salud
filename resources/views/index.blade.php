@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<!-- Hero Section Principal con Imagen Local -->
<section class="relative bg-gradient-to-r from-brand-700 via-brand-600 to-brand-800 text-white overflow-hidden py-16 lg:py-24">
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px]"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            
            <!-- Columna Izquierda: Mensaje y Acciones -->
            <div class="lg:col-span-7 space-y-6">
                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-brand-500/40 border border-brand-400 text-brand-100 text-xs sm:text-sm font-bold uppercase tracking-wider">
                    <span class="w-2.5 h-2.5 rounded-full bg-accent-500 animate-ping"></span>
                    Servicio Público de Salud Abierto a Toda la Comunidad
                </div>

                <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight">
                    Atención Médica Comunitaria Cercana, Oportuna y Gratuita
                </h1>

                <p class="text-base sm:text-xl text-brand-100 leading-relaxed max-w-2xl font-medium">
                    Facilitamos el acceso universal a servicios de consulta general, especialidades pediátricas, odontología y laboratorios en todas las unidades del municipio.
                </p>

                <!-- Botones de Acción Llamativos -->
                <div class="flex flex-wrap gap-4 pt-2">
                    <a href="/citas" class="bg-accent-500 hover:bg-accent-600 text-white font-extrabold text-base px-7 py-4 rounded-xl shadow-lg hover:shadow-2xl transition transform hover:-translate-y-0.5 flex items-center gap-2.5">
                        <i class="fa-solid fa-calendar-plus text-lg"></i>
                        <span>Agendar Cita en Línea</span>
                    </a>
                    <a href="/directorio" class="bg-white/15 hover:bg-white/25 text-white border-2 border-white/40 font-bold text-base px-7 py-4 rounded-xl backdrop-blur-sm transition flex items-center gap-2.5">
                        <i class="fa-solid fa-hospital text-lg"></i>
                        <span>Ver Hospitales y Clínicas</span>
                    </a>
                </div>

                <!-- Puntos Clave Rápidos con Letras Visibles -->
                <div class="grid grid-cols-3 gap-4 pt-6 border-t border-brand-500/50 text-xs sm:text-sm text-brand-100 font-semibold">
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-shield-heart text-accent-500 text-xl"></i>
                        <span>Atención 100% Gratuita</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-user-doctor text-accent-500 text-xl"></i>
                        <span>12 Médicos Certificados</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fa-solid fa-clock text-accent-500 text-xl"></i>
                        <span>Turnos 7:00 a 20:00 hrs</span>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Tarjeta Visual Destacada (Imagen Local) -->
            <div class="lg:col-span-5">
                <div class="relative mx-auto max-w-md lg:max-w-none">
                    <div class="relative rounded-2xl shadow-2xl overflow-hidden border-4 border-white/30">
                        <img src="{{ asset('img/general/hero.jpg') }}" 
                             alt="Instalaciones del Hospital Comunitario" 
                             class="w-full h-88 object-cover object-center transform hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/95 via-slate-900/40 to-transparent flex flex-col justify-end p-6">
                            <span class="text-xs font-bold text-accent-500 uppercase tracking-wider mb-1">Módulo Central</span>
                            <h3 class="text-2xl font-bold text-white">Hospital Comunitario San Jerónimo</h3>
                            <p class="text-sm text-slate-200 mt-1"><i class="fa-solid fa-location-dot text-brand-400 mr-1.5"></i> Calle Independencia #102, Zona Centro</p>
                            <div class="mt-3 flex items-center gap-2 text-sm text-emerald-400 font-bold">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span> Consultas Disponibles Hoy
                            </div>
                        </div>
                    </div>

                    <!-- Tarjeta flotante de estadística -->
                    <div class="absolute -bottom-6 -left-6 bg-white text-slate-900 p-4 rounded-xl shadow-2xl border border-slate-200 hidden sm:flex items-center gap-3">
                        <div class="w-12 h-12 rounded-lg bg-emerald-100 text-emerald-600 flex items-center justify-center text-2xl font-bold">
                            <i class="fa-solid fa-hospital-user"></i>
                        </div>
                        <div>
                            <span class="block text-2xl font-black text-slate-900">+15,400</span>
                            <span class="text-xs text-slate-600 font-bold">Consultas brindadas</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Banner de Alerta / Campaña (Fiel al banner naranja del Figma) -->
<section class="bg-amber-500 text-slate-950 py-4 px-4 border-y border-amber-600 shadow-inner">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-3 text-center md:text-left">
            <span class="w-11 h-11 rounded-full bg-white text-amber-600 flex items-center justify-center text-xl flex-shrink-0 font-black shadow">
                <i class="fa-solid fa-bullhorn"></i>
            </span>
            <div>
                <strong class="text-base sm:text-lg font-black uppercase tracking-wide">Campaña Activa de Vacunación Invernal:</strong>
                <span class="text-sm font-semibold ml-1">Dosis gratuitas contra Influenza, COVID-19 y Neumococo en todas las unidades médicas.</span>
            </div>
        </div>
        <a href="/noticias" class="bg-slate-900 hover:bg-slate-800 text-white text-sm font-extrabold px-5 py-2.5 rounded-xl transition whitespace-nowrap shadow-md">
            Ver Módulos de Vacunación <i class="fa-solid fa-arrow-right ml-1"></i>
        </a>
    </div>
</section>

<!-- Sección: Proceso de Atención en 3 Pasos con Letras Grandes -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-12">
            <span class="text-xs sm:text-sm font-extrabold text-brand-600 uppercase tracking-widest">Guía Fácil para el Ciudadano</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-2">¿Cómo acceder al servicio médico?</h2>
            <p class="text-slate-600 text-base mt-2">Sigue estos tres sencillos pasos para recibir consulta o estudios de manera rápida y sin complicaciones.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            <!-- Paso 1 -->
            <div class="bg-slate-50 rounded-2xl p-7 border-2 border-slate-200 hover:border-brand-500 hover:shadow-xl transition group">
                <div class="w-14 h-14 rounded-xl bg-brand-500 text-white flex items-center justify-center text-2xl font-bold mb-5 shadow-md group-hover:scale-110 transition">
                    <i class="fa-solid fa-map-pin"></i>
                </div>
                <div class="text-xs font-black text-brand-600 uppercase tracking-wider mb-1">Paso 1</div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">1. Ubica tu clínica</h3>
                <p class="text-sm text-slate-600 leading-relaxed mb-4 font-medium">
                    Consulta nuestro directorio municipal y localiza la unidad de salud asignada a tu colonia o sector de residencia.
                </p>
                <a href="/directorio" class="text-brand-600 hover:text-brand-800 font-extrabold text-sm inline-flex items-center gap-1.5">
                    Ver las 8 clínicas y hospitales <i class="fa-solid fa-chevron-right text-xs"></i>
                </a>
            </div>

            <!-- Paso 2 -->
            <div class="bg-slate-50 rounded-2xl p-7 border-2 border-slate-200 hover:border-accent-500 hover:shadow-xl transition group">
                <div class="w-14 h-14 rounded-xl bg-accent-500 text-white flex items-center justify-center text-2xl font-bold mb-5 shadow-md group-hover:scale-110 transition">
                    <i class="fa-solid fa-id-card"></i>
                </div>
                <div class="text-xs font-black text-accent-600 uppercase tracking-wider mb-1">Paso 2</div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">2. Revisa requisitos</h3>
                <p class="text-sm text-slate-600 leading-relaxed mb-4 font-medium">
                    Presenta identificación oficial (INE), CURP y comprobante de domicilio reciente para abrir tu expediente clínico.
                </p>
                <a href="/guia-paciente" class="text-accent-600 hover:text-accent-700 font-extrabold text-sm inline-flex items-center gap-1.5">
                    Ver guía de documentación <i class="fa-solid fa-chevron-right text-xs"></i>
                </a>
            </div>

            <!-- Paso 3 -->
            <div class="bg-slate-50 rounded-2xl p-7 border-2 border-slate-200 hover:border-emerald-500 hover:shadow-xl transition group">
                <div class="w-14 h-14 rounded-xl bg-emerald-600 text-white flex items-center justify-center text-2xl font-bold mb-5 shadow-md group-hover:scale-110 transition">
                    <i class="fa-solid fa-stethoscope"></i>
                </div>
                <div class="text-xs font-black text-emerald-600 uppercase tracking-wider mb-1">Paso 3</div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">3. Acude a consulta</h3>
                <p class="text-sm text-slate-600 leading-relaxed mb-4 font-medium">
                    Preséntate con 15 minutos de anticipación o genera tu ficha previa con folio digital desde nuestra plataforma.
                </p>
                <a href="/citas" class="text-emerald-600 hover:text-emerald-700 font-extrabold text-sm inline-flex items-center gap-1.5">
                    Agendar cita previa en línea <i class="fa-solid fa-chevron-right text-xs"></i>
                </a>
            </div>

        </div>

    </div>
</section>

<!-- SECCIÓN MULTIMEDIA OBLIGATORIA: VIDEO INSTITUCIONAL OFICIAL DE SALUD PÚBLICA -->
<section class="py-16 bg-slate-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            
            <div class="lg:col-span-5 space-y-5">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-accent-500/20 border border-accent-500/40 text-accent-400 text-xs sm:text-sm font-bold uppercase tracking-wider">
                    <i class="fa-solid fa-circle-play"></i> Recorrido Multimedia Oficial
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold leading-tight">
                    Conoce el Funcionamiento y las Áreas de Atención
                </h2>
                <p class="text-slate-300 text-base leading-relaxed">
                    Te presentamos una breve guía audiovisual donde se explican los servicios de atención primaria, los protocolos de prevención y la atención en consultorios y farmacias comunitarias.
                </p>
                <div class="space-y-3 pt-2 text-sm text-slate-300 font-medium">
                    <div class="flex items-center gap-2.5">
                        <i class="fa-solid fa-check-circle text-emerald-400 text-base"></i>
                        <span>Recorrido por consultorios y farmacia comunitaria</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <i class="fa-solid fa-check-circle text-emerald-400 text-base"></i>
                        <span>Instrucciones para toma de muestras de laboratorio</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <i class="fa-solid fa-check-circle text-emerald-400 text-base"></i>
                        <span>Derechos de confidencialidad y trato digno</span>
                    </div>
                </div>
                <div class="pt-2">
                    <a href="/guia-paciente" class="inline-flex items-center gap-2 text-base text-brand-300 hover:text-white font-bold underline">
                        <span>Descargar horarios e información en PDF</span>
                        <i class="fa-solid fa-file-arrow-down"></i>
                    </a>
                </div>
            </div>

            <!-- Video Embed Responsive (Video Oficial OPS/OMS) -->
            <div class="lg:col-span-7">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl border-4 border-slate-700 bg-slate-800 aspect-video">
                    <iframe class="w-full h-full object-cover" 
                            src="https://www.youtube-nocookie.com/embed/AUnqJ45eZ2k?controls=1&rel=0" 
                            title="Video Oficial de Atención Primaria de Salud - OPS/OMS" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </div>
                <p class="text-xs text-slate-400 mt-2.5 text-center font-medium">
                    <i class="fa-solid fa-film mr-1 text-accent-500"></i> Video Institucional Oficial • Atención Primaria de Salud
                </p>
            </div>

        </div>
    </div>
</section>

<!-- Sección: Módulos Hospitalarios Destacados con Fotos Locales -->
<section class="py-16 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-10 gap-4">
            <div>
                <span class="text-xs sm:text-sm font-extrabold text-brand-600 uppercase tracking-widest">Nuestra Cobertura</span>
                <h2 class="text-3xl sm:text-4xl font-black text-slate-900 mt-1">Hospitales y Clínicas Principales</h2>
            </div>
            <a href="/directorio" class="text-brand-600 hover:text-brand-800 font-extrabold text-base inline-flex items-center gap-2 group">
                <span>Ver las 8 unidades municipales</span>
                <i class="fa-solid fa-arrow-right text-sm group-hover:translate-x-1 transition"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Clínica 1 (Local) -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition border-2 border-slate-200 flex flex-col">
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ asset('img/clinicas/clinica1.jpg') }}" 
                         alt="Hospital Comunitario San Jerónimo" 
                         class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white text-xs font-black px-3 py-1 rounded-full uppercase">Abierto Hoy</span>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-bold text-brand-600 uppercase">Sector Centro • Módulo 01</span>
                        <h3 class="text-xl font-bold text-slate-900 mt-1">Hospital Comunitario San Jerónimo</h3>
                        <p class="text-sm text-slate-600 mt-1.5 flex items-center gap-1.5">
                            <i class="fa-solid fa-location-dot text-brand-500"></i> Calle Independencia #102, Zona Centro
                        </p>
                        <div class="mt-4 flex flex-wrap gap-2 text-xs font-semibold">
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-1 rounded-md">Medicina General</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-1 rounded-md">Pediatría</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-1 rounded-md">Urgencias 24h</span>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-200 flex items-center justify-between">
                        <span class="text-xs sm:text-sm text-slate-500 font-medium"><i class="fa-regular fa-clock mr-1"></i> 24 Horas</span>
                        <a href="/citas" class="text-sm font-extrabold text-brand-600 hover:text-brand-800">Agendar Cita &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Clínica 2 (Local) -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition border-2 border-slate-200 flex flex-col">
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ asset('img/clinicas/clinica2.jpg') }}" 
                         alt="Clínica Materno Benito Juárez" 
                         class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white text-xs font-black px-3 py-1 rounded-full uppercase">Abierto Hoy</span>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-bold text-brand-600 uppercase">Sector Norte • Módulo 02</span>
                        <h3 class="text-xl font-bold text-slate-900 mt-1">Clínica Materno Benito Juárez</h3>
                        <p class="text-sm text-slate-600 mt-1.5 flex items-center gap-1.5">
                            <i class="fa-solid fa-location-dot text-brand-500"></i> Av. De los Maestros #240, Col. Libertad
                        </p>
                        <div class="mt-4 flex flex-wrap gap-2 text-xs font-semibold">
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-1 rounded-md">Ginecología</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-1 rounded-md">Pediatría</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-1 rounded-md">Vacunación</span>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-200 flex items-center justify-between">
                        <span class="text-xs sm:text-sm text-slate-500 font-medium"><i class="fa-regular fa-clock mr-1"></i> 7:00 - 20:00 hrs</span>
                        <a href="/citas" class="text-sm font-extrabold text-brand-600 hover:text-brand-800">Agendar Cita &rarr;</a>
                    </div>
                </div>
            </div>

            <!-- Clínica 3 (Local) -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-2xl transition border-2 border-slate-200 flex flex-col">
                <div class="relative h-52 overflow-hidden">
                    <img src="{{ asset('img/clinicas/clinica3.jpg') }}" 
                         alt="Centro de Salud Los Olivos" 
                         class="w-full h-full object-cover hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white text-xs font-black px-3 py-1 rounded-full uppercase">Abierto Hoy</span>
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <div>
                        <span class="text-xs font-bold text-brand-600 uppercase">Sector Oriente • Módulo 03</span>
                        <h3 class="text-xl font-bold text-slate-900 mt-1">Centro de Salud Los Olivos</h3>
                        <p class="text-sm text-slate-600 mt-1.5 flex items-center gap-1.5">
                            <i class="fa-solid fa-location-dot text-brand-500"></i> Calzada de las Palmas #880, Col. Olivos
                        </p>
                        <div class="mt-4 flex flex-wrap gap-2 text-xs font-semibold">
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-1 rounded-md">Odontología</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-1 rounded-md">Laboratorio</span>
                            <span class="bg-slate-100 text-slate-800 px-2.5 py-1 rounded-md">Nutrición</span>
                        </div>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-200 flex items-center justify-between">
                        <span class="text-xs sm:text-sm text-slate-500 font-medium"><i class="fa-regular fa-clock mr-1"></i> 7:00 - 19:30 hrs</span>
                        <a href="/citas" class="text-sm font-extrabold text-brand-600 hover:text-brand-800">Agendar Cita &rarr;</a>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

<!-- Sección de Cifras con Texto Grande y Visible -->
<section class="py-14 bg-brand-700 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <span class="block text-4xl sm:text-5xl font-black text-accent-500">8</span>
                <span class="text-sm sm:text-base text-brand-100 font-bold mt-1 block">Hospitales y Clínicas</span>
            </div>
            <div>
                <span class="block text-4xl sm:text-5xl font-black text-white">12</span>
                <span class="text-sm sm:text-base text-brand-100 font-bold mt-1 block">Médicos Especialistas</span>
            </div>
            <div>
                <span class="block text-4xl sm:text-5xl font-black text-white">100%</span>
                <span class="text-sm sm:text-base text-brand-100 font-bold mt-1 block">Medicamentos Gratuitos</span>
            </div>
            <div>
                <span class="block text-4xl sm:text-5xl font-black text-accent-500">24/7</span>
                <span class="text-sm sm:text-base text-brand-100 font-bold mt-1 block">Atención a Urgencias</span>
            </div>
        </div>
    </div>
</section>
@endsection