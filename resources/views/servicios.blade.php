@extends('layouts.app')

@section('title', 'Servicios y Especialidades')

@section('content')
<!-- Header de la Sección -->
<div class="bg-brand-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-brand-200 mb-2">
            <a href="/" class="hover:underline">Inicio</a> &gt; <span class="text-white">Servicios y Especialidades</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-black tracking-tight">Catálogo Integral de Servicios Médicos Gratuitos</h1>
        <p class="text-brand-100 text-base sm:text-lg mt-2 max-w-3xl font-medium">
            Atención preventiva, diagnóstico clínico, salud bucal y consultas especializadas distribuidas en las 8 unidades médicas.
        </p>
    </div>
</div>

<!-- BARRA DE FILTRADO POR CATEGORÍA DE SERVICIOS -->
<div class="bg-white border-b-2 border-slate-200 py-4 shadow-sm sticky top-20 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap items-center justify-between gap-3">
        <div class="flex flex-wrap items-center gap-2">
            <span class="font-bold text-slate-700 text-sm"><i class="fa-solid fa-filter text-brand-600"></i> Filtrar Servicio:</span>
            <button onclick="filterServices('')" class="service-pill px-3.5 py-1 text-xs sm:text-sm font-bold bg-brand-600 text-white rounded-full">Todos (8)</button>
            <button onclick="filterServices('basica')" class="service-pill px-3.5 py-1 text-xs sm:text-sm font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full">Consulta Básica</button>
            <button onclick="filterServices('infantil')" class="service-pill px-3.5 py-1 text-xs sm:text-sm font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full">Infantil</button>
            <button onclick="filterServices('materna')" class="service-pill px-3.5 py-1 text-xs sm:text-sm font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full">Salud Materna</button>
            <button onclick="filterServices('laboratorio')" class="service-pill px-3.5 py-1 text-xs sm:text-sm font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full">Laboratorio</button>
            <button onclick="filterServices('mental')" class="service-pill px-3.5 py-1 text-xs sm:text-sm font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full">Salud Mental</button>
        </div>
        <div class="text-xs sm:text-sm font-bold text-emerald-700 bg-emerald-50 px-3 py-1 rounded-lg border border-emerald-200">
            <i class="fa-solid fa-circle-check text-xs mr-1"></i> Catálogo 100% Gratuito
        </div>
    </div>
</div>

<!-- Grid de Especialidades con Letras Grandes y Legibles -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6" id="services-container">
        
        <!-- Servicio 1: Medicina General -->
        <div class="service-card bg-white rounded-2xl p-6 shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition group flex flex-col justify-between" data-category="basica">
            <div>
                <div class="w-14 h-14 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-3xl mb-4 group-hover:bg-brand-600 group-hover:text-white transition">
                    <i class="fa-solid fa-stethoscope"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Medicina General</h3>
                <p class="text-sm text-slate-600 leading-relaxed mb-4 font-medium">
                    Diagnóstico inicial, control de enfermedades comunes, toma de signos vitales y prescripción de tratamientos del cuadro básico.
                </p>
                <div class="space-y-2 text-xs sm:text-sm text-slate-700 font-semibold border-t border-slate-100 pt-3">
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Consulta para todas las edades</div>
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Certificados médicos oficiales</div>
                </div>
            </div>
            <div class="mt-6 pt-4 border-t border-slate-100">
                <a href="/citas" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-extrabold text-sm py-3 rounded-xl text-center block transition shadow">
                    Agendar Consulta
                </a>
            </div>
        </div>

        <!-- Servicio 2: Pediatría -->
        <div class="service-card bg-white rounded-2xl p-6 shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition group flex flex-col justify-between" data-category="infantil">
            <div>
                <div class="w-14 h-14 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-3xl mb-4 group-hover:bg-purple-600 group-hover:text-white transition">
                    <i class="fa-solid fa-baby"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Pediatría Integral</h3>
                <p class="text-sm text-slate-600 leading-relaxed mb-4 font-medium">
                    Control del niño sano, seguimiento de crecimiento y peso, atención a infecciones respiratorias y cuadro digestivo infantil.
                </p>
                <div class="space-y-2 text-xs sm:text-sm text-slate-700 font-semibold border-t border-slate-100 pt-3">
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> De 0 a 14 años cumplidos</div>
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Sellado en cartilla nacional</div>
                </div>
            </div>
            <div class="mt-6 pt-4 border-t border-slate-100">
                <a href="/citas" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-extrabold text-sm py-3 rounded-xl text-center block transition shadow">
                    Agendar Consulta
                </a>
            </div>
        </div>

        <!-- Servicio 3: Odontología -->
        <div class="service-card bg-white rounded-2xl p-6 shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition group flex flex-col justify-between" data-category="basica">
            <div>
                <div class="w-14 h-14 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center text-3xl mb-4 group-hover:bg-teal-600 group-hover:text-white transition">
                    <i class="fa-solid fa-tooth"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Odontología Integral</h3>
                <p class="text-sm text-slate-600 leading-relaxed mb-4 font-medium">
                    Limpiezas dentales con ultrasonido, aplicación de flúor protector, resinas, curaciones y extracciones simples sin costo.
                </p>
                <div class="space-y-2 text-xs sm:text-sm text-slate-700 font-semibold border-t border-slate-100 pt-3">
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Material 100% esterilizado</div>
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Atención a niños y adultos</div>
                </div>
            </div>
            <div class="mt-6 pt-4 border-t border-slate-100">
                <a href="/citas" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-extrabold text-sm py-3 rounded-xl text-center block transition shadow">
                    Agendar Consulta
                </a>
            </div>
        </div>

        <!-- Servicio 4: Ginecología -->
        <div class="service-card bg-white rounded-2xl p-6 shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition group flex flex-col justify-between" data-category="materna">
            <div>
                <div class="w-14 h-14 rounded-xl bg-pink-50 text-pink-600 flex items-center justify-center text-3xl mb-4 group-hover:bg-pink-600 group-hover:text-white transition">
                    <i class="fa-solid fa-person-breastfeeding"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Salud Materna</h3>
                <p class="text-sm text-slate-600 leading-relaxed mb-4 font-medium">
                    Control prenatal mes con mes, tamizaje de Papanicolaou, métodos de planificación familiar y ultrasonidos básicos.
                </p>
                <div class="space-y-2 text-xs sm:text-sm text-slate-700 font-semibold border-t border-slate-100 pt-3">
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Prevención de cáncer cervical</div>
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Suplementos vitamínicos gratis</div>
                </div>
            </div>
            <div class="mt-6 pt-4 border-t border-slate-100">
                <a href="/citas" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-extrabold text-sm py-3 rounded-xl text-center block transition shadow">
                    Agendar Consulta
                </a>
            </div>
        </div>

        <!-- Servicio 5: Laboratorio Clínico -->
        <div class="service-card bg-white rounded-2xl p-6 shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition group flex flex-col justify-between" data-category="laboratorio">
            <div>
                <div class="w-14 h-14 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-3xl mb-4 group-hover:bg-amber-600 group-hover:text-white transition">
                    <i class="fa-solid fa-vial-virus"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Laboratorio Clínico</h3>
                <p class="text-sm text-slate-600 leading-relaxed mb-4 font-medium">
                    Biometría hemática completa, glucosa en sangre, colesterol, triglicéridos, examen general de orina y pruebas rápidas de antígenos.
                </p>
                <div class="space-y-2 text-xs sm:text-sm text-slate-700 font-semibold border-t border-slate-100 pt-3">
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Tomas de 07:00 a 09:30 hrs</div>
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Entrega el mismo día hábil</div>
                </div>
            </div>
            <div class="mt-6 pt-4 border-t border-slate-100">
                <a href="/citas" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-extrabold text-sm py-3 rounded-xl text-center block transition shadow">
                    Agendar Turno
                </a>
            </div>
        </div>

        <!-- Servicio 6: Nutrición y Diabetes -->
        <div class="service-card bg-white rounded-2xl p-6 shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition group flex flex-col justify-between" data-category="basica">
            <div>
                <div class="w-14 h-14 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center text-3xl mb-4 group-hover:bg-emerald-600 group-hover:text-white transition">
                    <i class="fa-solid fa-apple-whole"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Nutrición y Diabetes</h3>
                <p class="text-sm text-slate-600 leading-relaxed mb-4 font-medium">
                    Planes de alimentación para pacientes con diabetes, hipertensión o sobrepeso. Evaluación de composición corporal gratuita.
                </p>
                <div class="space-y-2 text-xs sm:text-sm text-slate-700 font-semibold border-t border-slate-100 pt-3">
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Monitoreo de glucosa en ayuno</div>
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Guías dietéticas personalizadas</div>
                </div>
            </div>
            <div class="mt-6 pt-4 border-t border-slate-100">
                <a href="/citas" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-extrabold text-sm py-3 rounded-xl text-center block transition shadow">
                    Agendar Consulta
                </a>
            </div>
        </div>

        <!-- Servicio 7: Psicología -->
        <div class="service-card bg-white rounded-2xl p-6 shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition group flex flex-col justify-between" data-category="mental">
            <div>
                <div class="w-14 h-14 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center text-3xl mb-4 group-hover:bg-indigo-600 group-hover:text-white transition">
                    <i class="fa-solid fa-brain"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Salud Mental y Psicología</h3>
                <p class="text-sm text-slate-600 leading-relaxed mb-4 font-medium">
                    Orientación psicológica individual, apoyo en duelo, manejo de estrés, depresión, prevención de adicciones y terapia familiar.
                </p>
                <div class="space-y-2 text-xs sm:text-sm text-slate-700 font-semibold border-t border-slate-100 pt-3">
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Sesiones de 45 minutos</div>
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Total confidencialidad médica</div>
                </div>
            </div>
            <div class="mt-6 pt-4 border-t border-slate-100">
                <a href="/citas" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-extrabold text-sm py-3 rounded-xl text-center block transition shadow">
                    Agendar Consulta
                </a>
            </div>
        </div>

        <!-- Servicio 8: Vacunación -->
        <div class="service-card bg-white rounded-2xl p-6 shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition group flex flex-col justify-between" data-category="infantil">
            <div>
                <div class="w-14 h-14 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center text-3xl mb-4 group-hover:bg-rose-600 group-hover:text-white transition">
                    <i class="fa-solid fa-syringe"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">Vacunación Universal</h3>
                <p class="text-sm text-slate-600 leading-relaxed mb-4 font-medium">
                    Dosis del esquema nacional: Hexavalente, Rotavirus, Neumococo, SRP, Influenza y tétanos para niños, jóvenes y adultos mayores.
                </p>
                <div class="space-y-2 text-xs sm:text-sm text-slate-700 font-semibold border-t border-slate-100 pt-3">
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Sin necesidad de cita previa</div>
                    <div class="flex items-center gap-1.5"><i class="fa-solid fa-check text-emerald-600"></i> Presentar cartilla de salud</div>
                </div>
            </div>
            <div class="mt-6 pt-4 border-t border-slate-100">
                <a href="/guia-paciente" class="w-full bg-brand-600 hover:bg-brand-700 text-white font-extrabold text-sm py-3 rounded-xl text-center block transition shadow">
                    Ver Calendario
                </a>
            </div>
        </div>

    </div>

</div>

<!-- SCRIPT DE FILTRADO DE SERVICIOS -->
<script>
    function filterServices(category) {
        const cards = document.querySelectorAll('.service-card');
        const pills = document.querySelectorAll('.service-pill');

        pills.forEach(p => {
            p.classList.remove('bg-brand-600', 'text-white');
            p.classList.add('bg-slate-100', 'text-slate-800');
        });
        event.target.classList.add('bg-brand-600', 'text-white');
        event.target.classList.remove('bg-slate-100', 'text-slate-800');

        cards.forEach(card => {
            const cat = card.getAttribute('data-category');
            if (!category || cat === category) {
                card.classList.remove('hidden');
            } else {
                card.classList.add('hidden');
            }
        });
    }
</script>
@endsection