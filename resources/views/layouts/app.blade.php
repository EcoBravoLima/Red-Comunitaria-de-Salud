<!DOCTYPE html>
<html lang="es" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal de Clínicas Comunitarias') - Red de Salud Pública</title>

    <!-- Tailwind CSS CDN con configuración personalizada -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0284c7',
                            600: '#0369a1',
                            700: '#075985',
                            800: '#0c4a6e',
                            900: '#082f49'
                        },
                        accent: {
                            500: '#f97316',
                            600: '#ea580c'
                        }
                    }
                }
            }
        }
    </script>

    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Fuentes Google: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        /* Tipografía Fluida y Adaptativa Automática (Mobile-First) */
        html {
            /* En pantallas de celular (320px - 640px) el tamaño base es cómodo y compacto para no desbordar */
            font-size: 14.5px;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
        }

        /* En tablets y laptops intermedias (>= 768px) escala progresivamente */
        @media (min-width: 768px) {
            html {
                font-size: 15.5px;
            }
        }

        /* En pantallas de escritorio y laptops normales (>= 1024px) */
        @media (min-width: 1024px) {
            html {
                font-size: 16px;
            }
        }

        /* En monitores amplios (>= 1440px) */
        @media (min-width: 1440px) {
            html {
                font-size: 16.5px;
            }
        }

        /* Ajuste de lectura óptima en celulares para evitar desbordes */
        p, span, li, input, select, textarea {
            line-height: 1.6;
        }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col antialiased">

    <!-- Barra Superior Limpia e Institucional (Sin botones innecesarios) -->
    <div class="bg-brand-900 text-white text-xs py-2 px-4 border-b border-brand-800">
        <div class="max-w-7xl mx-auto flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-4 text-center sm:text-left">
                <span><i class="fa-solid fa-phone-volume text-accent-500 mr-1.5"></i> <strong>Línea Gratuita de Urgencias:</strong> 800-72583-00</span>
                <span class="hidden md:inline text-slate-400">|</span>
                <span class="hidden md:inline"><i class="fa-regular fa-clock text-brand-100 mr-1.5"></i> Lun - Vie: 7:00 a 20:00 hrs</span>
            </div>
            <div class="flex items-center gap-3">
                <span class="bg-emerald-600/90 text-white text-[11px] px-2.5 py-0.5 rounded font-bold uppercase tracking-wider">
                    <i class="fa-solid fa-shield-heart mr-1"></i> Servicio 100% Público y Gratuito
                </span>
            </div>
        </div>
    </div>

    <!-- Header y Navegación Principal -->
    <header class="bg-brand-600 shadow-md sticky top-0 z-50 transition-all border-b border-brand-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- Logo -->
                <a href="/" class="flex items-center gap-3 group">
                    <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-white flex items-center justify-center text-brand-600 shadow-md group-hover:scale-105 transition flex-shrink-0">
                        <i class="fa-solid fa-hospital text-xl sm:text-2xl text-brand-600"></i>
                    </div>
                    <div>
                        <span class="block text-lg sm:text-2xl font-black text-white tracking-tight leading-none">Clínicas Comunitarias</span>
                        <span class="text-[11px] sm:text-xs text-brand-100 font-semibold tracking-wide">Red de Salud y Atención Integral</span>
                    </div>
                </a>

                <!-- Navegación Desktop -->
                <nav class="hidden lg:flex items-center gap-1.5">
                    <a href="/" class="px-3.5 py-2 text-sm font-bold rounded-lg transition {{ request()->is('/') ? 'bg-brand-800 text-white shadow-inner' : 'text-white/95 hover:bg-brand-500 hover:text-white' }}">Inicio</a>
                    <a href="/directorio" class="px-3.5 py-2 text-sm font-bold rounded-lg transition {{ request()->is('directorio') ? 'bg-brand-800 text-white shadow-inner' : 'text-white/95 hover:bg-brand-500 hover:text-white' }}">Hospitales y Clínicas</a>
                    <a href="/servicios" class="px-3.5 py-2 text-sm font-bold rounded-lg transition {{ request()->is('servicios') ? 'bg-brand-800 text-white shadow-inner' : 'text-white/95 hover:bg-brand-500 hover:text-white' }}">Servicios</a>
                    <a href="/directorio-medico" class="px-3.5 py-2 text-sm font-bold rounded-lg transition {{ request()->is('directorio-medico') ? 'bg-brand-800 text-white shadow-inner' : 'text-white/95 hover:bg-brand-500 hover:text-white' }}">Doctores</a>
                    <a href="/guia-paciente" class="px-3.5 py-2 text-sm font-bold rounded-lg transition {{ request()->is('guia-paciente') || request()->is('horarios') ? 'bg-brand-800 text-white shadow-inner' : 'text-white/95 hover:bg-brand-500 hover:text-white' }}">Horarios</a>
                    <a href="/noticias" class="px-3.5 py-2 text-sm font-bold rounded-lg transition {{ request()->is('noticias') ? 'bg-brand-800 text-white shadow-inner' : 'text-white/95 hover:bg-brand-500 hover:text-white' }}">Noticias</a>
                    <a href="/preguntas" class="px-3.5 py-2 text-sm font-bold rounded-lg transition {{ request()->is('preguntas') ? 'bg-brand-800 text-white shadow-inner' : 'text-white/95 hover:bg-brand-500 hover:text-white' }}">FAQ</a>
                    <a href="/contacto" class="px-3.5 py-2 text-sm font-bold rounded-lg transition {{ request()->is('contacto') ? 'bg-brand-800 text-white shadow-inner' : 'text-white/95 hover:bg-brand-500 hover:text-white' }}">Contacto</a>
                </nav>

                <!-- Botón de Acción Principal (CTA) -->
                <div class="hidden lg:flex items-center">
                    <a href="/citas" class="bg-accent-500 hover:bg-accent-600 text-white font-extrabold text-sm px-5 py-3 rounded-xl shadow-lg hover:shadow-xl transition transform hover:-translate-y-0.5 flex items-center gap-2">
                        <i class="fa-solid fa-calendar-check text-base"></i>
                        <span>Agendar Cita</span>
                    </a>
                </div>

                <!-- Botón Hamburguesa Móvil -->
                <div class="lg:hidden flex items-center">
                    <button id="mobile-menu-btn" type="button" class="text-white hover:text-brand-100 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-white" aria-expanded="false" aria-label="Abrir menú">
                        <i id="menu-icon" class="fa-solid fa-bars text-2xl"></i>
                    </button>
                </div>

            </div>
        </div>

        <!-- Menú Móvil Desplegable -->
        <div id="mobile-menu" class="hidden lg:hidden bg-brand-800 border-t border-brand-500 px-4 pt-3 pb-6 space-y-2">
            <a href="/" class="block px-3 py-2.5 rounded-lg text-base font-bold text-white hover:bg-brand-700">Inicio</a>
            <a href="/directorio" class="block px-3 py-2.5 rounded-lg text-base font-bold text-white hover:bg-brand-700">Hospitales y Clínicas (8)</a>
            <a href="/servicios" class="block px-3 py-2.5 rounded-lg text-base font-bold text-white hover:bg-brand-700">Servicios y Especialidades</a>
            <a href="/directorio-medico" class="block px-3 py-2.5 rounded-lg text-base font-bold text-white hover:bg-brand-700">Directorio de Doctores (12)</a>
            <a href="/guia-paciente" class="block px-3 py-2.5 rounded-lg text-base font-bold text-white hover:bg-brand-700">Horarios y Requisitos</a>
            <a href="/noticias" class="block px-3 py-2.5 rounded-lg text-base font-bold text-white hover:bg-brand-700">Noticias y Vacunación</a>
            <a href="/preguntas" class="block px-3 py-2.5 rounded-lg text-base font-bold text-white hover:bg-brand-700">Preguntas Frecuentes</a>
            <a href="/contacto" class="block px-3 py-2.5 rounded-lg text-base font-bold text-white hover:bg-brand-700">Contacto y Buzón</a>
            <div class="pt-3">
                <a href="/citas" class="w-full text-center bg-accent-500 hover:bg-accent-600 text-white font-extrabold py-3.5 rounded-xl block shadow-lg text-base">
                    <i class="fa-solid fa-calendar-check mr-2"></i> Agendar Cita Médica
                </a>
            </div>
        </div>
    </header>

    <!-- Contenido Dinámico de la Página -->
    <main class="flex-grow" id="main-content">
        @yield('content')
    </main>

    <!-- Footer Institucional Limpio y Formal -->
    <footer class="bg-slate-900 text-slate-200 pt-12 pb-8 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-10">
                
                <!-- Columna 1: Info Institucional -->
                <div>
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-lg bg-brand-500 flex items-center justify-center text-white">
                            <i class="fa-solid fa-hospital text-xl"></i>
                        </div>
                        <span class="text-lg font-bold text-white">Clínicas Comunitarias</span>
                    </div>
                    <p class="text-sm text-slate-300 leading-relaxed mb-4">
                        Red municipal de salud pública dedicada a brindar atención médica oportuna, humana y gratuita para todas las familias de la comunidad.
                    </p>
                    <div class="p-3 bg-slate-800/80 rounded-xl border border-slate-700 text-xs text-amber-300 font-semibold flex items-center gap-2">
                        <i class="fa-solid fa-shield-halved text-base"></i>
                        <span>Red de Salud Pública Municipal Certificada</span>
                    </div>
                </div>

                <!-- Columna 2: Navegación -->
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-wider text-white mb-4 border-l-4 border-brand-500 pl-3">Directorio y Vistas</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/" class="hover:text-white transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-brand-400"></i> Inicio</a></li>
                        <li><a href="/directorio" class="hover:text-white transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-brand-400"></i> 8 Hospitales y Clínicas</a></li>
                        <li><a href="/servicios" class="hover:text-white transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-brand-400"></i> Especialidades y Consultas</a></li>
                        <li><a href="/directorio-medico" class="hover:text-white transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-brand-400"></i> 12 Médicos Certificados</a></li>
                        <li><a href="/citas" class="hover:text-white transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-brand-400"></i> Sistema de Citas</a></li>
                    </ul>
                </div>

                <!-- Columna 3: Información al Paciente -->
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-wider text-white mb-4 border-l-4 border-brand-500 pl-3">Atención al Usuario</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="/guia-paciente" class="hover:text-white transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-brand-400"></i> Horarios de Atención</a></li>
                        <li><a href="/guia-paciente" class="hover:text-white transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-brand-400"></i> Requisitos para Laboratorio</a></li>
                        <li><a href="/preguntas" class="hover:text-white transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-brand-400"></i> Preguntas Frecuentes</a></li>
                        <li><a href="/noticias" class="hover:text-white transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-brand-400"></i> Campañas de Vacunación</a></li>
                        <li><a href="/contacto" class="hover:text-white transition flex items-center gap-2"><i class="fa-solid fa-angle-right text-xs text-brand-400"></i> Buzón de Atención Ciudadana</a></li>
                    </ul>
                </div>

                <!-- Columna 4: Contacto y Urgencias -->
                <div>
                    <h4 class="text-sm font-bold uppercase tracking-wider text-white mb-4 border-l-4 border-accent-500 pl-3">Canales Oficiales</h4>
                    <div class="space-y-2.5 text-sm text-slate-300">
                        <div class="flex items-start gap-2.5">
                            <i class="fa-solid fa-location-dot text-accent-500 mt-1"></i>
                            <span>Av. Salud y Bienestar #450, Centro Cívico Hospitalario</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <i class="fa-solid fa-phone text-accent-500"></i>
                            <span>Línea Gratuita: 800-72583-00</span>
                        </div>
                        <div class="flex items-center gap-2.5">
                            <i class="fa-solid fa-envelope text-accent-500"></i>
                            <span>atencion@clinicascomunitarias.gob.mx</span>
                        </div>
                        <div class="pt-2">
                            <span class="inline-block bg-slate-800 text-xs px-3 py-1.5 rounded-lg border border-slate-700 text-emerald-400 font-bold">
                                <i class="fa-solid fa-circle text-[8px] mr-1.5 animate-pulse"></i> Sistema en Línea Activo
                            </span>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Barra Inferior de Derechos -->
            <div class="border-t border-slate-800 pt-6 flex flex-col sm:flex-row justify-between items-center text-xs text-slate-400 gap-3">
                <p>&copy; {{ date('Y') }} Red de Clínicas Comunitarias. Prototipo Estático Funcional desarrollado con Laravel y Tailwind CSS.</p>
                <div class="flex gap-4">
                    <a href="/nosotros" class="hover:text-white">Aviso de Privacidad</a>
                    <a href="/guia-paciente" class="hover:text-white">Derechos del Paciente</a>
                    <a href="/contacto" class="hover:text-white">Soporte Técnico</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Script para Toggle de Menú Móvil -->
    <script>
        const menuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');

        if(menuBtn && mobileMenu) {
            menuBtn.addEventListener('click', () => {
                const isHidden = mobileMenu.classList.toggle('hidden');
                menuBtn.setAttribute('aria-expanded', !isHidden);
                if (isHidden) {
                    menuIcon.classList.remove('fa-xmark');
                    menuIcon.classList.add('fa-bars');
                } else {
                    menuIcon.classList.remove('fa-bars');
                    menuIcon.classList.add('fa-xmark');
                }
            });
        }
    </script>
</body>
</html>
