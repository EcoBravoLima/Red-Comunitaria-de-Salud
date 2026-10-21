@extends('layouts.app')

@section('title', 'Agendar Cita Médica')

@section('content')
<!-- Header de la Sección -->
<div class="bg-brand-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-brand-200 mb-2">
            <a href="/" class="hover:underline">Inicio</a> &gt; <span class="text-white">Agendar Cita</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-black tracking-tight">Sistema Digital de Citas Comunitarias</h1>
        <p class="text-brand-100 text-base sm:text-lg mt-2 font-medium">Programa tu consulta médica en 3 sencillos pasos de forma gratuita y sin hacer filas.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    
    <!-- Stepper de Progreso -->
    <div class="mb-10 max-w-3xl mx-auto">
        <div class="flex items-center justify-between relative">
            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-full h-1 bg-slate-300 -z-0"></div>
            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-1/2 h-1 bg-brand-500 -z-0"></div>

            <!-- Paso 1 -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-12 h-12 rounded-full bg-brand-600 text-white font-black flex items-center justify-center text-base shadow-lg">
                    1
                </div>
                <span class="text-xs sm:text-sm font-extrabold text-brand-700 mt-2">1. Datos del Paciente</span>
            </div>

            <!-- Paso 2 -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-12 h-12 rounded-full bg-brand-600 text-white font-black flex items-center justify-center text-base shadow-lg ring-4 ring-brand-100">
                    2
                </div>
                <span class="text-xs sm:text-sm font-extrabold text-slate-900 mt-2">2. Hospital y Turno</span>
            </div>

            <!-- Paso 3 -->
            <div class="relative z-10 flex flex-col items-center">
                <div class="w-12 h-12 rounded-full bg-slate-200 text-slate-500 font-bold flex items-center justify-center text-base">
                    3
                </div>
                <span class="text-xs sm:text-sm font-bold text-slate-400 mt-2">3. Ficha con Folio</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Formulario Principal (8 columnas) -->
        <div class="lg:col-span-8 bg-white rounded-2xl p-6 sm:p-8 shadow-sm border-2 border-slate-200">
            <div class="border-b border-slate-100 pb-4 mb-6">
                <h2 class="text-2xl font-black text-slate-900">Formulario de Registro de Cita Médica</h2>
                <p class="text-sm text-slate-600 mt-1 font-medium">Ingresa los datos del paciente para emitir su ficha oficial con número de folio.</p>
            </div>

            <form id="cita-form" class="space-y-6">
                
                <!-- Sección 1: Datos Personales con Letras Claras -->
                <div>
                    <h3 class="text-sm font-black text-brand-600 uppercase tracking-wider mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-user"></i> 1. Información del Solicitante
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-1.5">Nombre(s) del Paciente *</label>
                            <input type="text" id="paciente-nombre" required placeholder="Ej. Juan Carlos" 
                                   class="w-full px-4 py-3 text-sm sm:text-base rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 focus:border-brand-500 bg-slate-50">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-1.5">Apellidos Completos *</label>
                            <input type="text" id="paciente-apellidos" required placeholder="Ej. Hernández López" 
                                   class="w-full px-4 py-3 text-sm sm:text-base rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 focus:border-brand-500 bg-slate-50">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-1.5">CURP (18 caracteres) *</label>
                            <input type="text" id="paciente-curp" required maxlength="18" placeholder="XXXX000000XXXXXX00" 
                                   class="w-full uppercase px-4 py-3 text-sm sm:text-base font-mono rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 focus:border-brand-500 bg-slate-50">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-1.5">Teléfono de Contacto (WhatsApp) *</label>
                            <input type="tel" id="paciente-tel" required placeholder="Ej. 55 1234 5678" 
                                   class="w-full px-4 py-3 text-sm sm:text-base rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 focus:border-brand-500 bg-slate-50">
                        </div>
                    </div>
                </div>

                <!-- Sección 2: Selección de Hospital y Especialidad -->
                <div class="pt-5 border-t border-slate-200">
                    <h3 class="text-sm font-black text-brand-600 uppercase tracking-wider mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-hospital-user"></i> 2. Selección de Hospital y Servicio
                    </h3>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-1.5">Hospital o Clínica (8 Unidades) *</label>
                            <select id="paciente-clinica" required class="w-full px-4 py-3 text-sm sm:text-base font-semibold rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 bg-slate-50">
                                <option value="">-- Elige la unidad médica --</option>
                                <option value="Hospital Comunitario San Jerónimo">1. Hosp. San Jerónimo (Sector Centro)</option>
                                <option value="Clínica Materno Benito Juárez">2. Clínica Benito Juárez (Sector Norte)</option>
                                <option value="Centro de Salud Los Olivos">3. Centro Los Olivos (Sector Oriente)</option>
                                <option value="Unidad Integral Las Torres">4. Unidad Las Torres (Sector Poniente)</option>
                                <option value="Hospital Esperanza Viva">5. Hosp. Esperanza Viva (Sector Sur)</option>
                                <option value="Clínica Familiar Valle Verde">6. Clínica Valle Verde (Sector Norte)</option>
                                <option value="Centro Médico Guadalupe Hidalgo">7. Centro Guadalupe Hidalgo (Sector Oriente)</option>
                                <option value="Unidad Rural El Roble">8. Unidad Rural El Roble (Sector Rural)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-1.5">Especialidad Requerida *</label>
                            <select id="paciente-servicio" required class="w-full px-4 py-3 text-sm sm:text-base font-semibold rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 bg-slate-50">
                                <option value="">-- Elige la especialidad --</option>
                                <option value="Medicina General">Medicina General y Familiar</option>
                                <option value="Pediatría">Pediatría (Menores de 14 años)</option>
                                <option value="Odontología">Odontología y Salud Bucal</option>
                                <option value="Ginecología">Ginecología y Control Prenatal</option>
                                <option value="Nutrición">Nutrición y Control de Diabetes</option>
                                <option value="Psicología">Psicología y Salud Mental</option>
                                <option value="Traumatología">Traumatología y Ortopedia</option>
                                <option value="Geriatría">Geriatría y Adulto Mayor</option>
                                <option value="Cardiología Preventiva">Cardiología Preventiva</option>
                                <option value="Laboratorio Clínico">Laboratorio Clínico y Análisis</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-1.5">Fecha de Consulta *</label>
                            <input type="date" id="paciente-fecha" required value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}"
                                   class="w-full px-4 py-3 text-sm sm:text-base font-semibold rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 bg-slate-50">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-slate-800 mb-1.5">Turno de Atención *</label>
                            <select id="paciente-turno" required class="w-full px-4 py-3 text-sm sm:text-base font-semibold rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 bg-slate-50">
                                <option value="Turno Matutino (07:00 a 14:00 hrs)">Turno Matutino (07:00 a 14:00 hrs)</option>
                                <option value="Turno Vespertino (14:00 a 20:00 hrs)">Turno Vespertino (14:00 a 20:00 hrs)</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-5">
                        <label class="block text-sm font-bold text-slate-800 mb-1.5">Motivo de Consulta o Síntomas (Opcional)</label>
                        <textarea rows="3" id="paciente-motivo" placeholder="Describe brevemente tus síntomas o el trámite que requieres..." 
                                  class="w-full px-4 py-2.5 text-sm sm:text-base rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 bg-slate-50"></textarea>
                    </div>
                </div>

                <!-- Botón de Envío -->
                <div class="pt-5 border-t border-slate-200 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <p class="text-xs sm:text-sm text-slate-600 font-medium">
                        <i class="fa-solid fa-lock text-emerald-600 mr-1.5"></i> Trámite 100% gratuito protegido por la ley de confidencialidad.
                    </p>
                    <button type="submit" class="w-full sm:w-auto bg-accent-500 hover:bg-accent-600 text-white font-black text-base px-8 py-4 rounded-xl shadow-xl hover:shadow-2xl transition flex items-center justify-center gap-2">
                        <i class="fa-solid fa-check text-lg"></i>
                        <span>Generar Ficha de Cita</span>
                    </button>
                </div>

            </form>
        </div>

        <!-- Columna Lateral: Requisitos y Asistencia (4 columnas) -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- Tarjeta de Documentos Obligatorios -->
            <div class="bg-slate-50 rounded-2xl p-6 border-2 border-slate-200">
                <h4 class="text-base font-bold text-slate-900 mb-3 flex items-center gap-2">
                    <i class="fa-solid fa-circle-exclamation text-amber-500 text-lg"></i> Documentos Indispensables
                </h4>
                <p class="text-xs sm:text-sm text-slate-600 mb-4 leading-relaxed font-medium">
                    El día de tu cita deberás presentar en ventanilla de recepción los siguientes documentos originales:
                </p>
                <ul class="space-y-3 text-xs sm:text-sm text-slate-800 font-semibold">
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check text-emerald-600 mt-1"></i>
                        <span><strong>Identificación oficial:</strong> INE vigente, pasaporte o cartilla militar.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check text-emerald-600 mt-1"></i>
                        <span><strong>CURP certificada:</strong> Impresa en hoja blanca.</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check text-emerald-600 mt-1"></i>
                        <span><strong>Comprobante de domicilio:</strong> CFE, agua o predial (reciente).</span>
                    </li>
                    <li class="flex items-start gap-2.5">
                        <i class="fa-solid fa-check text-emerald-600 mt-1"></i>
                        <span><strong>Menores de edad:</strong> Acta de nacimiento y cartilla de salud.</span>
                    </li>
                </ul>
            </div>

            <!-- Asistencia Telefónica Oficial -->
            <div class="bg-brand-50 rounded-2xl p-6 border-2 border-brand-200">
                <h4 class="text-base font-bold text-brand-900 mb-2">¿Prefieres agendar por teléfono?</h4>
                <p class="text-xs sm:text-sm text-brand-800 leading-relaxed mb-4 font-medium">
                    Comunícate a nuestra central telefónica gratuita en horario de 7:00 a 20:00 hrs.
                </p>
                <a href="tel:8007258300" class="block w-full text-center bg-brand-600 hover:bg-brand-700 text-white font-extrabold text-sm py-3 rounded-xl transition shadow">
                    <i class="fa-solid fa-phone mr-1.5"></i> Llamar al 800-72583-00
                </a>
            </div>

        </div>

    </div>

</div>

<!-- MODAL COMPROBANTE OFICIAL DE CITA MÉDICA -->
<div id="modal-comprobante" class="fixed inset-0 bg-slate-950/70 backdrop-blur-sm z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl max-w-lg w-full p-8 shadow-2xl border-2 border-slate-200 relative">
        
        <div class="text-center pb-4 border-b border-slate-100">
            <div class="w-16 h-16 bg-emerald-100 text-emerald-600 rounded-2xl flex items-center justify-center text-3xl mx-auto mb-3">
                <i class="fa-solid fa-circle-check"></i>
            </div>
            <span class="text-xs font-black uppercase tracking-widest text-brand-600">Comprobante Oficial de Cita</span>
            <h3 class="text-2xl font-black text-slate-900 mt-1">¡Cita Registrada con Éxito!</h3>
            <p class="text-xs text-slate-500 font-medium">Red Municipal de Clínicas Comunitarias</p>
        </div>

        <div class="my-6 p-4 bg-slate-50 rounded-2xl border border-slate-200 space-y-2.5 text-sm">
            <div class="flex justify-between items-center pb-2 border-b border-slate-200">
                <span class="text-xs text-slate-500 font-bold uppercase">Folio de Atención:</span>
                <span class="text-base font-black text-brand-700 font-mono" id="folio-display">CC-2026-9812</span>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-600 font-medium">Paciente:</span>
                <strong class="text-slate-900" id="res-nombre">Juan Carlos Hernández</strong>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-600 font-medium">CURP:</span>
                <strong class="text-slate-900 font-mono" id="res-curp">XXXX000000XXXXXX00</strong>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-600 font-medium">Unidad Médica:</span>
                <strong class="text-slate-900 text-right text-xs" id="res-clinica">Hospital San Jerónimo</strong>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-600 font-medium">Especialidad:</span>
                <strong class="text-slate-900" id="res-servicio">Medicina General</strong>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-600 font-medium">Fecha y Turno:</span>
                <strong class="text-brand-600" id="res-fecha">2026-10-18 (Matutino)</strong>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-3">
            <button onclick="window.print()" class="w-full sm:w-1/2 bg-slate-900 hover:bg-slate-800 text-white font-extrabold text-sm py-3 rounded-xl transition flex items-center justify-center gap-2">
                <i class="fa-solid fa-print"></i> Imprimir Ficha
            </button>
            <button onclick="cerrarModal()" class="w-full sm:w-1/2 bg-brand-600 hover:bg-brand-700 text-white font-extrabold text-sm py-3 rounded-xl transition">
                Aceptar y Salir
            </button>
        </div>

    </div>
</div>

<!-- SCRIPT DEL MODAL Y GENERACIÓN DE FOLIO -->
<script>
    const form = document.getElementById('cita-form');
    const modal = document.getElementById('modal-comprobante');

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        const nombre = document.getElementById('paciente-nombre').value + ' ' + document.getElementById('paciente-apellidos').value;
        const curp = document.getElementById('paciente-curp').value.toUpperCase();
        const clinica = document.getElementById('paciente-clinica').value;
        const servicio = document.getElementById('paciente-servicio').value;
        const fecha = document.getElementById('paciente-fecha').value;
        const turno = document.getElementById('paciente-turno').value;

        const randomNum = Math.floor(1000 + Math.random() * 9000);
        document.getElementById('folio-display').textContent = `CC-2026-${randomNum}`;
        document.getElementById('res-nombre').textContent = nombre;
        document.getElementById('res-curp').textContent = curp;
        document.getElementById('res-clinica').textContent = clinica;
        document.getElementById('res-servicio').textContent = servicio;
        document.getElementById('res-fecha').textContent = `${fecha} • ${turno}`;

        modal.classList.remove('hidden');
    });

    function cerrarModal() {
        modal.classList.add('hidden');
        form.reset();
    }
</script>
@endsection