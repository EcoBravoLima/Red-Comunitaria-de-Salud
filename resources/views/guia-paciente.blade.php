@extends('layouts.app')

@section('title', 'Horarios y Guía del Paciente')

@section('content')
<!-- Header de la Sección -->
<div class="bg-brand-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-brand-200 mb-2">
            <a href="/" class="hover:underline">Inicio</a> &gt; <span class="text-white">Horarios y Guía de Atención</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-black tracking-tight">Horarios Oficiales y Guía del Paciente</h1>
        <p class="text-brand-100 text-base sm:text-lg mt-2 max-w-3xl font-medium">
            Consulta los turnos matutino, vespertino y de urgencias de los 8 hospitales y clínicas comunitarias, así como los requisitos para análisis clínicos.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12">
    
    <!-- Sección 1: Tabla Responsiva de Horarios de las 8 Clínicas -->
    <div class="bg-white rounded-2xl shadow-sm border-2 border-slate-200 overflow-hidden">
        <div class="p-6 border-b border-slate-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-slate-50">
            <div>
                <h2 class="text-2xl font-black text-slate-900">Rol Oficial de Turnos en las 8 Unidades Médicas</h2>
                <p class="text-sm text-slate-600 mt-1 font-medium">Vigente para el presente ciclo de salud pública comunitaria.</p>
            </div>
            <div class="flex items-center gap-2 text-xs sm:text-sm">
                <span class="inline-flex items-center gap-1.5 bg-emerald-100 text-emerald-800 px-3.5 py-1.5 rounded-full font-bold border border-emerald-300">
                    <span class="w-2.5 h-2.5 rounded-full bg-emerald-600 animate-pulse"></span> Sistema en Tiempo Real
                </span>
            </div>
        </div>

        <!-- Tabla con Scroll Horizontal Responsivo y Letras Grandes -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-700">
                <thead class="bg-slate-100 text-slate-900 font-black uppercase text-xs tracking-wider border-b-2 border-slate-300">
                    <tr>
                        <th class="py-4 px-6">Hospital o Clínica</th>
                        <th class="py-4 px-6">Sector / Ubicación</th>
                        <th class="py-4 px-6">Turno Matutino</th>
                        <th class="py-4 px-6">Turno Vespertino</th>
                        <th class="py-4 px-6">Laboratorio</th>
                        <th class="py-4 px-6 text-center">Urgencias</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 font-medium">
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6 font-bold text-slate-900">1. Hosp. San Jerónimo</td>
                        <td class="py-4 px-6 text-slate-600">Sector Centro</td>
                        <td class="py-4 px-6">07:00 - 14:00 hrs</td>
                        <td class="py-4 px-6">14:00 - 20:00 hrs</td>
                        <td class="py-4 px-6 text-brand-600 font-bold">07:00 - 09:30 hrs</td>
                        <td class="py-4 px-6 text-center"><span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full font-black">24 Horas</span></td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6 font-bold text-slate-900">2. Clínica Benito Juárez</td>
                        <td class="py-4 px-6 text-slate-600">Sector Norte</td>
                        <td class="py-4 px-6">07:00 - 14:00 hrs</td>
                        <td class="py-4 px-6">14:00 - 20:00 hrs</td>
                        <td class="py-4 px-6 text-brand-600 font-bold">07:30 - 10:00 hrs</td>
                        <td class="py-4 px-6 text-center"><span class="bg-slate-100 text-slate-700 text-xs px-2.5 py-1 rounded-full font-bold">Hasta 22:00</span></td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6 font-bold text-slate-900">3. Centro Los Olivos</td>
                        <td class="py-4 px-6 text-slate-600">Sector Oriente</td>
                        <td class="py-4 px-6">08:00 - 14:30 hrs</td>
                        <td class="py-4 px-6">14:30 - 20:00 hrs</td>
                        <td class="py-4 px-6 text-brand-600 font-bold">07:00 - 09:00 hrs</td>
                        <td class="py-4 px-6 text-center"><span class="bg-slate-100 text-slate-700 text-xs px-2.5 py-1 rounded-full font-bold">Hasta 20:00</span></td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6 font-bold text-slate-900">4. Unidad Las Torres</td>
                        <td class="py-4 px-6 text-slate-600">Sector Poniente</td>
                        <td class="py-4 px-6">07:00 - 14:00 hrs</td>
                        <td class="py-4 px-6">14:00 - 19:30 hrs</td>
                        <td class="py-4 px-6 text-brand-600 font-bold">07:00 - 09:30 hrs</td>
                        <td class="py-4 px-6 text-center"><span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full font-black">24 Horas</span></td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6 font-bold text-slate-900">5. Hosp. Esperanza Viva</td>
                        <td class="py-4 px-6 text-slate-600">Sector Sur</td>
                        <td class="py-4 px-6">07:00 - 14:00 hrs</td>
                        <td class="py-4 px-6">14:00 - 20:00 hrs</td>
                        <td class="py-4 px-6 text-brand-600 font-bold">07:00 - 09:30 hrs</td>
                        <td class="py-4 px-6 text-center"><span class="bg-red-100 text-red-700 text-xs px-3 py-1 rounded-full font-black">24 Horas</span></td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6 font-bold text-slate-900">6. Clínica Valle Verde</td>
                        <td class="py-4 px-6 text-slate-600">Sector Norte</td>
                        <td class="py-4 px-6">07:00 - 14:00 hrs</td>
                        <td class="py-4 px-6">14:00 - 19:00 hrs</td>
                        <td class="py-4 px-6 text-brand-600 font-bold">07:30 - 09:30 hrs</td>
                        <td class="py-4 px-6 text-center"><span class="bg-slate-100 text-slate-700 text-xs px-2.5 py-1 rounded-full font-bold">Hasta 20:00</span></td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6 font-bold text-slate-900">7. Centro Guadalupe Hidalgo</td>
                        <td class="py-4 px-6 text-slate-600">Sector Oriente</td>
                        <td class="py-4 px-6">08:00 - 14:30 hrs</td>
                        <td class="py-4 px-6">14:30 - 20:00 hrs</td>
                        <td class="py-4 px-6 text-brand-600 font-bold">07:00 - 09:00 hrs</td>
                        <td class="py-4 px-6 text-center"><span class="bg-slate-100 text-slate-700 text-xs px-2.5 py-1 rounded-full font-bold">Hasta 20:00</span></td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition">
                        <td class="py-4 px-6 font-bold text-slate-900">8. Unidad Rural El Roble</td>
                        <td class="py-4 px-6 text-slate-600">Sector Rural</td>
                        <td class="py-4 px-6">08:00 - 14:00 hrs</td>
                        <td class="py-4 px-6">14:00 - 18:00 hrs</td>
                        <td class="py-4 px-6 text-brand-600 font-bold">Módulo de toma semanal</td>
                        <td class="py-4 px-6 text-center"><span class="bg-slate-100 text-slate-700 text-xs px-2.5 py-1 rounded-full font-bold">Guardia</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-5 bg-slate-50 border-t border-slate-200 text-sm text-slate-600 flex flex-col sm:flex-row justify-between items-center gap-3 font-semibold">
            <span>* Sábados y domingos atención en módulos de guardia de 08:00 a 16:00 hrs.</span>
            <a href="/citas" class="text-brand-600 hover:text-brand-800 font-black text-sm">Agendar cita médica para cualquier unidad &rarr;</a>
        </div>
    </div>

    <!-- Sección 2: Recomendaciones y Derechos del Paciente -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        
        <div class="bg-white rounded-2xl p-7 shadow-sm border-2 border-slate-200">
            <div class="w-14 h-14 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-3xl mb-4 font-bold">
                <i class="fa-solid fa-flask-vial"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-2">Preparación para Análisis de Laboratorio</h3>
            <p class="text-sm text-slate-600 leading-relaxed mb-4 font-medium">
                Para garantizar la precisión de tus resultados de sangre y orina, sigue estrictamente las siguientes medidas previas:
            </p>
            <ul class="space-y-3.5 text-sm text-slate-800 font-medium">
                <li class="flex items-start gap-2.5">
                    <i class="fa-solid fa-clock text-amber-600 mt-1"></i>
                    <span><strong>Ayuno de 8 a 12 horas:</strong> No consumir alimentos sólidos ni bebidas azucaradas la noche anterior (solo agua natural permitida).</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <i class="fa-solid fa-ban text-amber-600 mt-1"></i>
                    <span><strong>Sin alcohol ni tabaco:</strong> Evitar bebidas alcohólicas y cigarrillo 24 horas previas al examen.</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <i class="fa-solid fa-prescription-bottle text-amber-600 mt-1"></i>
                    <span><strong>Medicamentos habituales:</strong> Si tomas medicamento para la presión, tómalo con un sorbo de agua a su hora habitual.</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <i class="fa-solid fa-vial text-amber-600 mt-1"></i>
                    <span><strong>Muestras de orina:</strong> Recolectar la primera orina de la mañana en un frasco estéril de farmacia, desechando el primer chorro.</span>
                </li>
            </ul>
        </div>

        <!-- Derechos del Paciente -->
        <div class="bg-white rounded-2xl p-7 shadow-sm border-2 border-slate-200">
            <div class="w-14 h-14 rounded-xl bg-brand-50 text-brand-600 flex items-center justify-center text-3xl mb-4 font-bold">
                <i class="fa-solid fa-scale-balanced"></i>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-2">Carta de Derechos del Paciente</h3>
            <p class="text-sm text-slate-600 leading-relaxed mb-4 font-medium">
                En toda la red comunitaria nos regimos por los principios de dignidad, equidad y respeto irrestricto a tus garantías de salud:
            </p>
            <ul class="space-y-3.5 text-sm text-slate-800 font-medium">
                <li class="flex items-start gap-2.5">
                    <i class="fa-solid fa-shield-check text-brand-600 mt-1"></i>
                    <span><strong>Trato digno y respetuoso:</strong> Ser atendido sin discriminación por origen, género, religión o condición social.</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <i class="fa-solid fa-comment-medical text-brand-600 mt-1"></i>
                    <span><strong>Información clara y oportuna:</strong> Conocer tu diagnóstico, pronóstico y alternativas de tratamiento en lenguaje accesible.</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <i class="fa-solid fa-user-lock text-brand-600 mt-1"></i>
                    <span><strong>Confidencialidad absoluta:</strong> Tu expediente clínico está resguardado bajo estricto secreto profesional y ley de protección de datos.</span>
                </li>
                <li class="flex items-start gap-2.5">
                    <i class="fa-solid fa-hand-holding-heart text-brand-600 mt-1"></i>
                    <span><strong>Atención 100% gratuita:</strong> Ningún personal médico o administrativo puede cobrar cuotas por consultas del catálogo oficial.</span>
                </li>
            </ul>
        </div>

    </div>

</div>
@endsection