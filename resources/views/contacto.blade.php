@extends('layouts.app')

@section('title', 'Contacto y Atención Ciudadana')

@section('content')
<!-- Header de la Sección -->
<div class="bg-brand-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-brand-200 mb-2">
            <a href="/" class="hover:underline">Inicio</a> &gt; <span class="text-white">Contacto</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-black tracking-tight">Atención Ciudadana y Buzón de Contacto</h1>
        <p class="text-brand-100 text-base sm:text-lg mt-2 max-w-3xl font-medium">
            Estamos para servirte. Envíanos tus dudas, comentarios o sugerencias sobre el servicio recibido en cualquiera de las 8 unidades médicas.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
        
        <!-- Formulario de Contacto (7 columnas) -->
        <div class="lg:col-span-7 bg-white rounded-2xl p-6 sm:p-8 shadow-sm border-2 border-slate-200">
            <h2 class="text-2xl font-black text-slate-900 mb-1">Envíanos un Mensaje Directo</h2>
            <p class="text-sm text-slate-600 mb-6 font-medium">Tu mensaje será canalizado directamente a la Coordinación Médica de Atención Ciudadana.</p>

            <form action="#" method="GET" onsubmit="event.preventDefault(); alert('¡Gracias por ponerte en contacto! Hemos recibido tu mensaje con folio: ATN-2026-8812. Te responderemos a la brevedad posible.');" class="space-y-4">
                
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-800 mb-1">Nombre Completo *</label>
                        <input type="text" required placeholder="Tu nombre y apellidos" 
                               class="w-full px-4 py-3 text-sm sm:text-base rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 bg-slate-50">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-800 mb-1">Correo Electrónico *</label>
                        <input type="email" required placeholder="correo@ejemplo.com" 
                               class="w-full px-4 py-3 text-sm sm:text-base rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 bg-slate-50">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-bold text-slate-800 mb-1">Teléfono de Contacto *</label>
                        <input type="tel" required placeholder="55 1234 5678" 
                               class="w-full px-4 py-3 text-sm sm:text-base rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 bg-slate-50">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-800 mb-1">Unidad Médica Relacionada</label>
                        <select class="w-full px-4 py-3 text-sm sm:text-base font-semibold rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 bg-slate-50">
                            <option value="general">Información General (Todas las Clínicas)</option>
                            <option value="1">1. Hospital Comunitario San Jerónimo (Centro)</option>
                            <option value="2">2. Clínica Materno Benito Juárez (Norte)</option>
                            <option value="3">3. Centro de Salud Los Olivos (Oriente)</option>
                            <option value="4">4. Unidad Integral Las Torres (Poniente)</option>
                            <option value="5">5. Hospital Esperanza Viva (Sur)</option>
                            <option value="6">6. Clínica Familiar Valle Verde (Norte)</option>
                            <option value="7">7. Centro Guadalupe Hidalgo (Oriente)</option>
                            <option value="8">8. Unidad Rural El Roble (Rural)</option>
                        </select>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-800 mb-1">Tipo de Solicitud *</label>
                    <select required class="w-full px-4 py-3 text-sm sm:text-base font-semibold rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 bg-slate-50">
                        <option value="duda">Información sobre horarios o requisitos de consulta</option>
                        <option value="cita">Ayuda para agendar o reprogramar una cita</option>
                        <option value="felicitacion">Felicitación al personal médico o administrativo</option>
                        <option value="queja">Sugerencia o queja sobre la atención recibida</option>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-800 mb-1">Mensaje o Detalle *</label>
                    <textarea rows="4" required placeholder="Explica detalladamente tu consulta o comentario..." 
                              class="w-full px-4 py-2.5 text-sm sm:text-base rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 bg-slate-50"></textarea>
                </div>

                <div class="pt-3 flex flex-col sm:flex-row items-center justify-between gap-4">
                    <span class="text-xs sm:text-sm text-slate-600 font-medium">Respuesta garantizada en menos de 24 horas hábiles.</span>
                    <button type="submit" class="w-full sm:w-auto bg-brand-600 hover:bg-brand-700 text-white font-black text-sm sm:text-base px-8 py-3.5 rounded-xl shadow-lg transition flex items-center justify-center gap-2">
                        <i class="fa-solid fa-paper-plane"></i>
                        <span>Enviar Mensaje</span>
                    </button>
                </div>

            </form>
        </div>

        <!-- Información de Oficinas y Mapa (5 columnas) -->
        <div class="lg:col-span-5 space-y-6">
            
            <!-- Tarjetas de Información Rápida -->
            <div class="bg-slate-50 rounded-2xl p-6 border-2 border-slate-200 space-y-4">
                <h3 class="text-lg font-black text-slate-900 mb-3">Oficina Central de Coordinación Municipal</h3>
                
                <div class="flex items-start gap-3.5 text-sm text-slate-700 font-medium">
                    <div class="w-9 h-9 rounded-xl bg-brand-100 text-brand-600 flex items-center justify-center text-base flex-shrink-0 font-bold">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <strong class="text-slate-900 block font-bold">Dirección General:</strong>
                        Av. Salud y Bienestar #450, Centro Cívico Hospitalario, C.P. 54000
                    </div>
                </div>

                <div class="flex items-start gap-3.5 text-sm text-slate-700 font-medium">
                    <div class="w-9 h-9 rounded-xl bg-brand-100 text-brand-600 flex items-center justify-center text-base flex-shrink-0 font-bold">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <div>
                        <strong class="text-slate-900 block font-bold">Teléfonos Directos:</strong>
                        Conmutador: (55) 5123-4567<br>
                        Línea Gratuita Nacional: 800-72583-00
                    </div>
                </div>

                <div class="flex items-start gap-3.5 text-sm text-slate-700 font-medium">
                    <div class="w-9 h-9 rounded-xl bg-brand-100 text-brand-600 flex items-center justify-center text-base flex-shrink-0 font-bold">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <strong class="text-slate-900 block font-bold">Correo Electrónico:</strong>
                        atencion@clinicascomunitarias.gob.mx
                    </div>
                </div>
            </div>

            <!-- Mapa Embebido -->
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200">
                <div class="p-3.5 bg-slate-100 border-b border-slate-200 text-sm font-bold text-slate-800">
                    <i class="fa-solid fa-map mr-1.5 text-brand-600"></i> Ubicación de la Sede Administrativa
                </div>
                <div class="h-64 w-full bg-slate-200">
                    <iframe class="w-full h-full border-0" 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120440.54877717618!2d-99.20816999999999!3d19.4326077!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff35f5bd1563%3A0x6c366f0e2de02ff7!2sHospital%20General%20de%20M%C3%A9xico!5e0!3m2!1ses-419!2smx!4v1696000000000!5m2!1ses-419!2smx" 
                            loading="lazy" 
                            title="Ubicación de la Sede Administrativa de Clínicas Comunitarias"
                            referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection