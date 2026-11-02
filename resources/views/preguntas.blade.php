@extends('layouts.app')

@section('title', 'Preguntas Frecuentes')

@section('content')
<!-- Header de la Sección -->
<div class="bg-brand-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <nav class="text-xs text-brand-200 mb-2">
            <a href="/" class="hover:underline">Inicio</a> &gt; <span class="text-white">Preguntas Frecuentes</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-black tracking-tight">Centro de Ayuda y Preguntas Frecuentes</h1>
        <p class="text-brand-100 text-base sm:text-lg mt-2 font-medium">
            Resolvemos las dudas más habituales sobre consultas, requisitos, gratuidad y trámites en nuestra red comunitaria.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Columna Izquierda: Acordeón de Preguntas (8 columnas) -->
        <div class="lg:col-span-8 space-y-4" id="faq-list">
            
            <!-- Pregunta y Respuesta 1 -->
            <div class="bg-white rounded-2xl border-2 border-slate-200 overflow-hidden shadow-sm">
                <div id="pregunta1" class="cursor-pointer p-5 flex justify-between items-center gap-4 hover:bg-slate-50 transition select-none">
                    <span class="font-bold text-slate-900 text-base sm:text-lg flex items-center gap-3">
                        <i class="fa-solid fa-circle-question text-brand-600 text-xl"></i>
                        ¿La consulta médica y los medicamentos tienen algún costo?
                    </span>
                    <i class="fa-solid fa-chevron-down text-slate-400 text-base"></i>
                </div>
                <div id="respuesta1" class="hidden px-6 pb-6 pt-2 text-sm sm:text-base text-slate-700 leading-relaxed border-t border-slate-100 font-medium">
                    <strong class="text-slate-900 font-black">No, la atención médica de primer contacto es 100% gratuita.</strong> Esto incluye la valoración del médico general, control del niño sano, vacunas, ginecología y los medicamentos esenciales del catálogo básico municipal. Ningún empleado tiene autorización de cobrarte cuota alguna.
                </div>
            </div>

            <!-- Pregunta y Respuesta 2 -->
            <div class="bg-white rounded-2xl border-2 border-slate-200 overflow-hidden shadow-sm">
                <div id="pregunta2" class="cursor-pointer p-5 flex justify-between items-center gap-4 hover:bg-slate-50 transition select-none">
                    <span class="font-bold text-slate-900 text-base sm:text-lg flex items-center gap-3">
                        <i class="fa-solid fa-circle-question text-brand-600 text-xl"></i>
                        ¿Puedo atenderme si no tengo IMSS, ISSSTE ni seguro médico?
                    </span>
                    <i class="fa-solid fa-chevron-down text-slate-400 text-base"></i>
                </div>
                <div id="respuesta2" class="hidden px-6 pb-6 pt-2 text-sm sm:text-base text-slate-700 leading-relaxed border-t border-slate-100 font-medium">
                    <strong class="text-slate-900 font-black">¡Por supuesto!</strong> El objetivo primordial de la Red de Clínicas Comunitarias es atender precisamente a la población sin derechohabiencia laboral. Cualquier persona que viva en el municipio tiene derecho a la consulta presentando únicamente su identificación y comprobante de domicilio.
                </div>
            </div>

            <!-- Pregunta y Respuesta 3 -->
            <div class="bg-white rounded-2xl border-2 border-slate-200 overflow-hidden shadow-sm">
                <div id="pregunta3" class="cursor-pointer p-5 flex justify-between items-center gap-4 hover:bg-slate-50 transition select-none">
                    <span class="font-bold text-slate-900 text-base sm:text-lg flex items-center gap-3">
                        <i class="fa-solid fa-circle-question text-brand-600 text-xl"></i>
                        ¿Qué documentos debo presentar en mi primera consulta?
                    </span>
                    <i class="fa-solid fa-chevron-down text-slate-400 text-base"></i>
                </div>
                <div id="respuesta3" class="hidden px-6 pb-6 pt-2 text-sm sm:text-base text-slate-700 leading-relaxed border-t border-slate-100 font-medium">
                    Para abrir tu expediente clínico permanente debes presentar en ventanilla:
                    <ul class="list-disc list-inside mt-2.5 space-y-1.5 font-semibold text-slate-800">
                        <li>Identificación oficial con foto (INE, pasaporte o cartilla).</li>
                        <li>CURP impresa en formato reciente.</li>
                        <li>Comprobante de domicilio (no mayor a 90 días).</li>
                        <li>En el caso de menores de edad, su Cartilla Nacional de Vacunación.</li>
                    </ul>
                </div>
            </div>

            <!-- Pregunta y Respuesta 4 -->
            <div class="bg-white rounded-2xl border-2 border-slate-200 overflow-hidden shadow-sm">
                <div id="pregunta4" class="cursor-pointer p-5 flex justify-between items-center gap-4 hover:bg-slate-50 transition select-none">
                    <span class="font-bold text-slate-900 text-base sm:text-lg flex items-center gap-3">
                        <i class="fa-solid fa-circle-question text-brand-600 text-xl"></i>
                        ¿Qué hago en caso de una urgencia médica grave?
                    </span>
                    <i class="fa-solid fa-chevron-down text-slate-400 text-base"></i>
                </div>
                <div id="respuesta4" class="hidden px-6 pb-6 pt-2 text-sm sm:text-base text-slate-700 leading-relaxed border-t border-slate-100 font-medium">
                    En nuestras clínicas atendemos <strong class="text-slate-900 font-black">urgencias menores las 24 horas</strong> (suturas, deshidratación, curaciones, fiebre alta). Si se trata de una urgencia crítica (infarto, traumatismo mayor o pérdida de conocimiento), comunícate inmediatamente al <strong class="text-red-600 font-black">911</strong> o acude al área de urgencias del Hospital General de la ciudad.
                </div>
            </div>

            <!-- Pregunta y Respuesta 5 -->
            <div class="bg-white rounded-2xl border-2 border-slate-200 overflow-hidden shadow-sm">
                <div id="pregunta5" class="cursor-pointer p-5 flex justify-between items-center gap-4 hover:bg-slate-50 transition select-none">
                    <span class="font-bold text-slate-900 text-base sm:text-lg flex items-center gap-3">
                        <i class="fa-solid fa-circle-question text-brand-600 text-xl"></i>
                        ¿Puedo agendar citas para mis familiares (hijos o abuelos)?
                    </span>
                    <i class="fa-solid fa-chevron-down text-slate-400 text-base"></i>
                </div>
                <div id="respuesta5" class="hidden px-6 pb-6 pt-2 text-sm sm:text-base text-slate-700 leading-relaxed border-t border-slate-100 font-medium">
                    <strong class="text-slate-900 font-black">Sí.</strong> En nuestro sistema digital de citas puedes ingresar el nombre y CURP del paciente beneficiario, y registrar tu propio número de teléfono para recibir el comprobante con el número de folio asignado.
                </div>
            </div>

        </div>

        <!-- Columna Derecha: Tarjeta de Atención Telefónica Oficial (4 columnas) -->
        <div class="lg:col-span-4 space-y-6">
            
            <div class="bg-gradient-to-br from-brand-700 to-brand-900 rounded-3xl p-7 text-white shadow-xl">
                <div class="w-12 h-12 rounded-2xl bg-white/20 text-accent-500 flex items-center justify-center text-2xl mb-4 font-bold">
                    <i class="fa-solid fa-headset"></i>
                </div>
                <h3 class="text-xl font-bold">¿Aún tienes dudas?</h3>
                <p class="text-sm text-brand-100 mt-2 leading-relaxed font-medium">
                    Comunícate directamente a nuestra línea ciudadana gratuita o utiliza nuestro buzón digital de contacto.
                </p>
                <div class="mt-6 space-y-3">
                    <a href="tel:8007258300" class="w-full bg-accent-500 hover:bg-accent-600 text-white font-extrabold text-sm py-3.5 rounded-xl text-center block transition shadow-lg">
                        <i class="fa-solid fa-phone mr-1.5"></i> Llamar al 800-72583-00
                    </a>
                    <a href="/contacto" class="w-full bg-white/10 hover:bg-white/20 text-white font-bold text-sm py-3.5 rounded-xl text-center block border border-white/30 transition">
                        Buzón de Atención y Dudas
                    </a>
                </div>
            </div>

            <!-- Horarios de Recepción -->
            <div class="bg-slate-50 rounded-2xl p-6 border-2 border-slate-200 text-sm text-slate-700 space-y-3 font-medium">
                <h4 class="font-bold text-slate-900 flex items-center gap-2 text-base">
                    <i class="fa-solid fa-clock text-brand-600"></i> Horario de Atención Telefónica
                </h4>
                <p>Lunes a Viernes: 07:00 a 20:00 hrs<br>Sábados y Domingos: 08:00 a 14:00 hrs</p>
                <p class="text-brand-600 font-bold">Línea directa: (55) 5123-4567</p>
            </div>

        </div>

    </div>
</div>

<!-- Enlace al archivo JavaScript externo de la actividad -->
<script src="{{ asset('js/preguntas.js') }}"></script>
@endsection
