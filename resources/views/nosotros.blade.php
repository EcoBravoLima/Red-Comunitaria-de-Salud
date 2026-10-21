@extends('layouts.app')

@section('title', 'Sobre Nosotros')

@section('content')
<!-- Header de la Sección -->
<div class="bg-brand-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-brand-200 mb-2">
            <a href="/" class="hover:underline">Inicio</a> &gt; <span class="text-white">Sobre Nosotros</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-black tracking-tight">Comprometidos con la Salud de Nuestra Comunidad</h1>
        <p class="text-brand-100 text-base sm:text-lg mt-2 max-w-3xl font-medium">
            Conoce los principios, historia y equipo humano que hacen posible la atención médica accesible, gratuita y de calidad para miles de familias.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-16">
    
    <!-- Sección de Historia y Misión con Foto Local -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-6 space-y-5">
            <span class="text-xs sm:text-sm font-extrabold text-brand-600 uppercase tracking-widest">Nuestra Razón de Ser</span>
            <h2 class="text-3xl sm:text-4xl font-black text-slate-900 leading-tight">
                Salud Pública Universal: Un Derecho, No un Privilegio
            </h2>
            <p class="text-base text-slate-600 leading-relaxed font-medium">
                La Red de Clínicas Comunitarias nació en 2018 con el objetivo prioritario de acercar médicos calificados, medicamentos e instalaciones dignas a las colonias y comunidades más alejadas de los centros hospitalarios tradicionales.
            </p>
            <p class="text-base text-slate-600 leading-relaxed font-medium">
                Hoy contamos con 8 unidades médicas en operación, más de 12 profesionales con cédula oficial y programas permanentes de vacunación, nutrición y salud bucal que impactan positivamente en el bienestar de toda la población.
            </p>
            
            <div class="pt-2 flex gap-8 text-slate-800">
                <div>
                    <span class="block text-3xl font-black text-brand-600">6+</span>
                    <span class="text-xs sm:text-sm font-bold text-slate-500">Años de Servicio</span>
                </div>
                <div>
                    <span class="block text-3xl font-black text-brand-600">8</span>
                    <span class="text-xs sm:text-sm font-bold text-slate-500">Hospitales y Clínicas</span>
                </div>
                <div>
                    <span class="block text-3xl font-black text-brand-600">100%</span>
                    <span class="text-xs sm:text-sm font-bold text-slate-500">Gratuito</span>
                </div>
            </div>
        </div>

        <div class="lg:col-span-6">
            <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-white">
                <img src="{{ asset('img/general/equipo.jpg') }}" 
                     alt="Equipo de Médicos Comunitarios" 
                     class="w-full h-88 object-cover">
            </div>
        </div>
    </div>

    <!-- Misión, Visión y Valores -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div class="bg-white rounded-2xl p-7 shadow-sm border-2 border-slate-200">
            <div class="w-14 h-14 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-2xl mb-4 font-bold">
                <i class="fa-solid fa-bullseye"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-2">Misión Institucional</h3>
            <p class="text-sm text-slate-600 leading-relaxed font-medium">
                Brindar servicios médicos preventivos, odontológicos y de especialidad básica con enfoque humanista y sin costo, garantizando el bienestar de los sectores más vulnerables.
            </p>
        </div>

        <div class="bg-white rounded-2xl p-7 shadow-sm border-2 border-slate-200">
            <div class="w-14 h-14 rounded-xl bg-accent-50 text-accent-600 flex items-center justify-center text-2xl mb-4 font-bold">
                <i class="fa-solid fa-eye"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-2">Visión de Futuro</h3>
            <p class="text-sm text-slate-600 leading-relaxed font-medium">
                Consolidarnos como el modelo de salud comunitaria de primer nivel más eficiente y confiable de la región, destacando por la calidez en el trato y la innovación preventiva.
            </p>
        </div>

        <div class="bg-white rounded-2xl p-7 shadow-sm border-2 border-slate-200">
            <div class="w-14 h-14 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-2xl mb-4 font-bold">
                <i class="fa-solid fa-hand-holding-heart"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-2">Valores Fundamentales</h3>
            <p class="text-sm text-slate-600 leading-relaxed font-medium">
                Empatía con el paciente, honestidad en el manejo de insumos públicos, equidad sin distinción alguna, confidencialidad médica y compromiso social permanente.
            </p>
        </div>

    </div>

    <!-- Sección de Transparencia y Normatividad -->
    <div class="bg-slate-100 rounded-2xl p-8 border-2 border-slate-200">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-6">
            <div>
                <span class="text-xs sm:text-sm font-extrabold text-brand-600 uppercase tracking-widest">Compromiso Cívico</span>
                <h3 class="text-xl font-bold text-slate-900 mt-1">Transparencia y Normatividad Sanitaria</h3>
                <p class="text-sm text-slate-600">Toda nuestra operación cumple con las Normas Oficiales Mexicanas de Salud.</p>
            </div>
            <a href="/contacto" class="text-sm font-extrabold bg-brand-600 hover:bg-brand-700 text-white px-5 py-3 rounded-xl transition shadow">
                Buzón Ciudadano de Transparencia
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-sm font-medium">
            <div class="bg-white p-4 rounded-xl border border-slate-200 flex items-center justify-between">
                <div>
                    <strong class="block text-slate-900 font-bold">NOM-004-SSA3-2012</strong>
                    <span class="text-xs text-slate-500">Expediente Clínico</span>
                </div>
                <i class="fa-solid fa-file-pdf text-red-500 text-xl"></i>
            </div>
            <div class="bg-white p-4 rounded-xl border border-slate-200 flex items-center justify-between">
                <div>
                    <strong class="block text-slate-900 font-bold">NOM-005-SSA3-2010</strong>
                    <span class="text-xs text-slate-500">Infraestructura Médica</span>
                </div>
                <i class="fa-solid fa-file-pdf text-red-500 text-xl"></i>
            </div>
            <div class="bg-white p-4 rounded-xl border border-slate-200 flex items-center justify-between">
                <div>
                    <strong class="block text-slate-900 font-bold">Reglamento Ético</strong>
                    <span class="text-xs text-slate-500">Trato Digno al Paciente</span>
                </div>
                <i class="fa-solid fa-file-pdf text-red-500 text-xl"></i>
            </div>
        </div>
    </div>

</div>
@endsection