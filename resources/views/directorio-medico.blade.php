@extends('layouts.app')

@section('title', 'Directorio Médico y Especialistas')

@section('content')
<!-- Header de la Sección -->
<div class="bg-brand-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-brand-200 mb-2">
            <a href="/" class="hover:underline">Inicio</a> &gt; <span class="text-white">Directorio Médico</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-black tracking-tight">Cuerpo Médico de 12 Especialistas Comunitarios</h1>
        <p class="text-brand-100 text-base sm:text-lg mt-2 max-w-3xl font-medium">
            Conoce a nuestro equipo de médicos titulados, odontólogos, pediatras y psicólogos con cédula profesional verificable al servicio de tu salud.
        </p>
    </div>
</div>

<!-- BARRA DE FILTRADO AVANZADO DE DOCTORES EN TIEMPO REAL -->
<div class="bg-white border-b-2 border-slate-200 py-5 shadow-md sticky top-20 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
        
        <div class="grid grid-cols-1 sm:grid-cols-12 gap-3 items-center">
            
            <!-- Buscador por nombre o cédula -->
            <div class="sm:col-span-5 relative">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3.5 text-slate-400 text-base"></i>
                <input type="text" id="doc-search" placeholder="Buscar por nombre, especialidad o cédula profesional..." 
                       class="w-full pl-11 pr-4 py-2.5 text-sm sm:text-base font-medium rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 bg-slate-50">
            </div>

            <!-- Filtro por Especialidad -->
            <div class="sm:col-span-4">
                <select id="doc-specialty" class="w-full py-2.5 px-3.5 text-sm sm:text-base font-semibold rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 bg-slate-50">
                    <option value="">Todas las Especialidades Médicas</option>
                    <option value="general">Medicina General y Familiar</option>
                    <option value="pediatria">Pediatría Integral</option>
                    <option value="dental">Odontología y Cirugía Bucal</option>
                    <option value="ginecologia">Ginecología y Obstetricia</option>
                    <option value="nutricion">Nutrición y Diabetes</option>
                    <option value="psicologia">Psicología Comunitaria</option>
                    <option value="traumatologia">Traumatología y Ortopedia</option>
                    <option value="geriatria">Geriatría y Adulto Mayor</option>
                    <option value="cardiologia">Cardiología Preventiva</option>
                </select>
            </div>

            <!-- Filtro por Turno -->
            <div class="sm:col-span-2">
                <select id="doc-shift" class="w-full py-2.5 px-3.5 text-sm sm:text-base font-semibold rounded-xl border-2 border-slate-300 focus:ring-2 focus:ring-brand-500 bg-slate-50">
                    <option value="">Cualquier Turno</option>
                    <option value="matutino">Matutino (7-14h)</option>
                    <option value="vespertino">Vespertino (14-20h)</option>
                </select>
            </div>

            <!-- Botón Limpiar -->
            <div class="sm:col-span-1">
                <button type="button" id="btn-reset-docs" class="w-full py-2.5 px-2 bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs sm:text-sm rounded-xl border border-slate-300 transition" title="Restablecer">
                    <i class="fa-solid fa-rotate-left"></i> Limpiar
                </button>
            </div>

        </div>

        <!-- Filtros Rápidos (Pills) y Contador -->
        <div class="flex flex-wrap items-center justify-between gap-2 pt-1 border-t border-slate-100 text-xs sm:text-sm">
            <div class="flex flex-wrap items-center gap-1.5">
                <span class="font-bold text-slate-700 mr-1"><i class="fa-solid fa-user-doctor text-brand-600"></i> Filtrar:</span>
                <button type="button" onclick="filterBySpecPill('')" class="doc-pill px-3 py-1 rounded-full font-bold bg-brand-600 text-white transition">Todos</button>
                <button type="button" onclick="filterBySpecPill('general')" class="doc-pill px-3 py-1 rounded-full font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 transition">General</button>
                <button type="button" onclick="filterBySpecPill('pediatria')" class="doc-pill px-3 py-1 rounded-full font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 transition">Pediatría</button>
                <button type="button" onclick="filterBySpecPill('ginecologia')" class="doc-pill px-3 py-1 rounded-full font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 transition">Ginecología</button>
                <button type="button" onclick="filterBySpecPill('dental')" class="doc-pill px-3 py-1 rounded-full font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 transition">Dental</button>
                <button type="button" onclick="filterBySpecPill('nutricion')" class="doc-pill px-3 py-1 rounded-full font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 transition">Nutrición</button>
            </div>
            <div class="font-bold text-brand-700 bg-brand-50 px-3 py-1 rounded-lg border border-brand-200">
                <span id="doc-counter">Mostrando 12 médicos certificados</span>
            </div>
        </div>

    </div>
</div>

<!-- Grid de los 12 Médicos con Fotos Locales -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="doctors-container">
        
        <!-- Doctor 1 -->
        <article class="doc-card bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition flex flex-col justify-between group"
                 data-name="Dr. Carlos Mendoza Ramos" data-specialty="general" data-shift="matutino" data-cedula="8491023">
            <div>
                <div class="relative h-60 overflow-hidden bg-slate-100">
                    <img src="{{ asset('img/doctores/doc1.jpg') }}" alt="Dr. Carlos Mendoza Ramos" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-brand-600 text-white text-xs font-black px-2.5 py-1 rounded-full uppercase">Medicina General</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">Dr. Carlos Mendoza Ramos</h3>
                    <p class="text-xs font-extrabold text-brand-600 mt-0.5">Céd. Prof. 8491023 • UNAM</p>
                    <div class="mt-3 space-y-1.5 text-xs text-slate-700 font-medium">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-hospital text-slate-400"></i> Hosp. Comunitario San Jerónimo</div>
                        <div class="flex items-center gap-1.5"><i class="fa-regular fa-clock text-slate-400"></i> Lun - Vie: 07:00 - 14:00 (Matutino)</div>
                    </div>
                </div>
            </div>
            <div class="p-5 pt-0">
                <a href="/citas" class="w-full bg-slate-100 hover:bg-brand-600 hover:text-white text-brand-700 font-extrabold text-xs py-2.5 rounded-lg text-center block transition">
                    Agendar con Dr. Mendoza
                </a>
            </div>
        </article>

        <!-- Doctor 2 -->
        <article class="doc-card bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition flex flex-col justify-between group"
                 data-name="Dra. Patricia Navarro Silva" data-specialty="pediatria" data-shift="matutino" data-cedula="5519203">
            <div>
                <div class="relative h-60 overflow-hidden bg-slate-100">
                    <img src="{{ asset('img/doctores/doc2.jpg') }}" alt="Dra. Patricia Navarro Silva" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-purple-600 text-white text-xs font-black px-2.5 py-1 rounded-full uppercase">Pediatría</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">Dra. Patricia Navarro Silva</h3>
                    <p class="text-xs font-extrabold text-purple-600 mt-0.5">Céd. Esp. 5519203 • IPN</p>
                    <div class="mt-3 space-y-1.5 text-xs text-slate-700 font-medium">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-hospital text-slate-400"></i> Clínica Benito Juárez (Norte)</div>
                        <div class="flex items-center gap-1.5"><i class="fa-regular fa-clock text-slate-400"></i> Lun - Jue: 08:00 - 15:00 (Matutino)</div>
                    </div>
                </div>
            </div>
            <div class="p-5 pt-0">
                <a href="/citas" class="w-full bg-slate-100 hover:bg-brand-600 hover:text-white text-brand-700 font-extrabold text-xs py-2.5 rounded-lg text-center block transition">
                    Agendar con Dra. Navarro
                </a>
            </div>
        </article>

        <!-- Doctor 3 -->
        <article class="doc-card bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition flex flex-col justify-between group"
                 data-name="Dr. Alejandro Vega Torres" data-specialty="dental" data-shift="matutino" data-cedula="9102381">
            <div>
                <div class="relative h-60 overflow-hidden bg-slate-100">
                    <img src="{{ asset('img/doctores/doc3.jpg') }}" alt="Dr. Alejandro Vega Torres" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white text-xs font-black px-2.5 py-1 rounded-full uppercase">Odontología</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">Dr. Alejandro Vega Torres</h3>
                    <p class="text-xs font-extrabold text-teal-600 mt-0.5">Céd. Prof. 9102381 • UAM</p>
                    <div class="mt-3 space-y-1.5 text-xs text-slate-700 font-medium">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-hospital text-slate-400"></i> Centro Los Olivos (Oriente)</div>
                        <div class="flex items-center gap-1.5"><i class="fa-regular fa-clock text-slate-400"></i> Mar - Sáb: 08:00 - 14:00 (Matutino)</div>
                    </div>
                </div>
            </div>
            <div class="p-5 pt-0">
                <a href="/citas" class="w-full bg-slate-100 hover:bg-brand-600 hover:text-white text-brand-700 font-extrabold text-xs py-2.5 rounded-lg text-center block transition">
                    Agendar con Dr. Vega
                </a>
            </div>
        </article>

        <!-- Doctor 4 -->
        <article class="doc-card bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition flex flex-col justify-between group"
                 data-name="Dra. Gabriela Morales Ponce" data-specialty="ginecologia" data-shift="vespertino" data-cedula="4192019">
            <div>
                <div class="relative h-60 overflow-hidden bg-slate-100">
                    <img src="{{ asset('img/doctores/doc4.jpg') }}" alt="Dra. Gabriela Morales Ponce" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-pink-600 text-white text-xs font-black px-2.5 py-1 rounded-full uppercase">Ginecología</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">Dra. Gabriela Morales Ponce</h3>
                    <p class="text-xs font-extrabold text-pink-600 mt-0.5">Céd. Esp. 4192019 • UDG</p>
                    <div class="mt-3 space-y-1.5 text-xs text-slate-700 font-medium">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-hospital text-slate-400"></i> Hosp. Esperanza Viva (Sur)</div>
                        <div class="flex items-center gap-1.5"><i class="fa-regular fa-clock text-slate-400"></i> Lun - Vie: 14:00 - 20:00 (Vespertino)</div>
                    </div>
                </div>
            </div>
            <div class="p-5 pt-0">
                <a href="/citas" class="w-full bg-slate-100 hover:bg-brand-600 hover:text-white text-brand-700 font-extrabold text-xs py-2.5 rounded-lg text-center block transition">
                    Agendar con Dra. Morales
                </a>
            </div>
        </article>

        <!-- Doctor 5 -->
        <article class="doc-card bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition flex flex-col justify-between group"
                 data-name="Dr. Fernando Castillo García" data-specialty="nutricion" data-shift="matutino" data-cedula="7812903">
            <div>
                <div class="relative h-60 overflow-hidden bg-slate-100">
                    <img src="{{ asset('img/doctores/doc5.jpg') }}" alt="Dr. Fernando Castillo García" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-amber-600 text-white text-xs font-black px-2.5 py-1 rounded-full uppercase">Nutrición</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">Dr. Fernando Castillo García</h3>
                    <p class="text-xs font-extrabold text-amber-600 mt-0.5">Céd. Prof. 7812903 • UANL</p>
                    <div class="mt-3 space-y-1.5 text-xs text-slate-700 font-medium">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-hospital text-slate-400"></i> Unidad Las Torres (Poniente)</div>
                        <div class="flex items-center gap-1.5"><i class="fa-regular fa-clock text-slate-400"></i> Lun - Vie: 08:00 - 15:00 (Matutino)</div>
                    </div>
                </div>
            </div>
            <div class="p-5 pt-0">
                <a href="/citas" class="w-full bg-slate-100 hover:bg-brand-600 hover:text-white text-brand-700 font-extrabold text-xs py-2.5 rounded-lg text-center block transition">
                    Agendar con Dr. Castillo
                </a>
            </div>
        </article>

        <!-- Doctor 6 -->
        <article class="doc-card bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition flex flex-col justify-between group"
                 data-name="Dra. Lucía Valenzuela Ruiz" data-specialty="psicologia" data-shift="vespertino" data-cedula="6712390">
            <div>
                <div class="relative h-60 overflow-hidden bg-slate-100">
                    <img src="{{ asset('img/doctores/doc6.jpg') }}" alt="Dra. Lucía Valenzuela Ruiz" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-indigo-600 text-white text-xs font-black px-2.5 py-1 rounded-full uppercase">Psicología</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">Dra. Lucía Valenzuela Ruiz</h3>
                    <p class="text-xs font-extrabold text-indigo-600 mt-0.5">Céd. Esp. 6712390 • IBERO</p>
                    <div class="mt-3 space-y-1.5 text-xs text-slate-700 font-medium">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-hospital text-slate-400"></i> Hosp. Comunitario San Jerónimo</div>
                        <div class="flex items-center gap-1.5"><i class="fa-regular fa-clock text-slate-400"></i> Mar - Sáb: 13:00 - 19:30 (Vespertino)</div>
                    </div>
                </div>
            </div>
            <div class="p-5 pt-0">
                <a href="/citas" class="w-full bg-slate-100 hover:bg-brand-600 hover:text-white text-brand-700 font-extrabold text-xs py-2.5 rounded-lg text-center block transition">
                    Agendar con Dra. Valenzuela
                </a>
            </div>
        </article>

        <!-- Doctor 7 (NUEVO: Traumatología) -->
        <article class="doc-card bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition flex flex-col justify-between group"
                 data-name="Dr. Roberto Domínguez Salgado" data-specialty="traumatologia" data-shift="matutino" data-cedula="3891044">
            <div>
                <div class="relative h-60 overflow-hidden bg-slate-100">
                    <img src="{{ asset('img/doctores/doc7.jpg') }}" alt="Dr. Roberto Domínguez Salgado" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-cyan-700 text-white text-xs font-black px-2.5 py-1 rounded-full uppercase">Traumatología</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">Dr. Roberto Domínguez</h3>
                    <p class="text-xs font-extrabold text-cyan-700 mt-0.5">Céd. Esp. 3891044 • BUAP</p>
                    <div class="mt-3 space-y-1.5 text-xs text-slate-700 font-medium">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-hospital text-slate-400"></i> Hosp. Comunitario San Jerónimo</div>
                        <div class="flex items-center gap-1.5"><i class="fa-regular fa-clock text-slate-400"></i> Lun - Vie: 07:00 - 14:00 (Matutino)</div>
                    </div>
                </div>
            </div>
            <div class="p-5 pt-0">
                <a href="/citas" class="w-full bg-slate-100 hover:bg-brand-600 hover:text-white text-brand-700 font-extrabold text-xs py-2.5 rounded-lg text-center block transition">
                    Agendar con Dr. Domínguez
                </a>
            </div>
        </article>

        <!-- Doctor 8 (NUEVO: Geriatría) -->
        <article class="doc-card bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition flex flex-col justify-between group"
                 data-name="Dra. Marcela Estrada Rivas" data-specialty="geriatria" data-shift="matutino" data-cedula="9910482">
            <div>
                <div class="relative h-60 overflow-hidden bg-slate-100">
                    <img src="{{ asset('img/doctores/doc8.jpg') }}" alt="Dra. Marcela Estrada Rivas" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-700 text-white text-xs font-black px-2.5 py-1 rounded-full uppercase">Geriatría</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">Dra. Marcela Estrada Rivas</h3>
                    <p class="text-xs font-extrabold text-emerald-700 mt-0.5">Céd. Esp. 9910482 • UNAM</p>
                    <div class="mt-3 space-y-1.5 text-xs text-slate-700 font-medium">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-hospital text-slate-400"></i> Centro Guadalupe Hidalgo</div>
                        <div class="flex items-center gap-1.5"><i class="fa-regular fa-clock text-slate-400"></i> Lun - Jue: 08:00 - 14:30 (Matutino)</div>
                    </div>
                </div>
            </div>
            <div class="p-5 pt-0">
                <a href="/citas" class="w-full bg-slate-100 hover:bg-brand-600 hover:text-white text-brand-700 font-extrabold text-xs py-2.5 rounded-lg text-center block transition">
                    Agendar con Dra. Estrada
                </a>
            </div>
        </article>

        <!-- Doctor 9 (NUEVO: Cardiología Preventiva) -->
        <article class="doc-card bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition flex flex-col justify-between group"
                 data-name="Dr. Javier Trejo Montes" data-specialty="cardiologia" data-shift="vespertino" data-cedula="6120934">
            <div>
                <div class="relative h-60 overflow-hidden bg-slate-100">
                    <img src="{{ asset('img/doctores/doc9.jpg') }}" alt="Dr. Javier Trejo Montes" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-rose-600 text-white text-xs font-black px-2.5 py-1 rounded-full uppercase">Cardiología</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">Dr. Javier Trejo Montes</h3>
                    <p class="text-xs font-extrabold text-rose-600 mt-0.5">Céd. Esp. 6120934 • UAEM</p>
                    <div class="mt-3 space-y-1.5 text-xs text-slate-700 font-medium">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-hospital text-slate-400"></i> Hosp. Esperanza Viva (Sur)</div>
                        <div class="flex items-center gap-1.5"><i class="fa-regular fa-clock text-slate-400"></i> Lun - Vie: 14:00 - 20:00 (Vespertino)</div>
                    </div>
                </div>
            </div>
            <div class="p-5 pt-0">
                <a href="/citas" class="w-full bg-slate-100 hover:bg-brand-600 hover:text-white text-brand-700 font-extrabold text-xs py-2.5 rounded-lg text-center block transition">
                    Agendar con Dr. Trejo
                </a>
            </div>
        </article>

        <!-- Doctor 10 (NUEVO: Medicina Familiar) -->
        <article class="doc-card bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition flex flex-col justify-between group"
                 data-name="Dra. Claudia Becerra Luján" data-specialty="general" data-shift="matutino" data-cedula="4501928">
            <div>
                <div class="relative h-60 overflow-hidden bg-slate-100">
                    <img src="{{ asset('img/doctores/doc10.jpg') }}" alt="Dra. Claudia Becerra Luján" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-brand-600 text-white text-xs font-black px-2.5 py-1 rounded-full uppercase">Medicina Familiar</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">Dra. Claudia Becerra L.</h3>
                    <p class="text-xs font-extrabold text-brand-600 mt-0.5">Céd. Prof. 4501928 • UAQ</p>
                    <div class="mt-3 space-y-1.5 text-xs text-slate-700 font-medium">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-hospital text-slate-400"></i> Clínica Valle Verde (Norte)</div>
                        <div class="flex items-center gap-1.5"><i class="fa-regular fa-clock text-slate-400"></i> Lun - Vie: 07:00 - 14:00 (Matutino)</div>
                    </div>
                </div>
            </div>
            <div class="p-5 pt-0">
                <a href="/citas" class="w-full bg-slate-100 hover:bg-brand-600 hover:text-white text-brand-700 font-extrabold text-xs py-2.5 rounded-lg text-center block transition">
                    Agendar con Dra. Becerra
                </a>
            </div>
        </article>

        <!-- Doctor 11 (NUEVA: Epidemiología) -->
        <article class="doc-card bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition flex flex-col justify-between group"
                 data-name="Dra. Mariana Solís Peña" data-specialty="general" data-shift="matutino" data-cedula="8819204">
            <div>
                <div class="relative h-60 overflow-hidden bg-slate-100">
                    <img src="{{ asset('img/doctores/doc11.jpg') }}" alt="Dra. Mariana Solís Peña" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-brand-600 text-white text-xs font-black px-2.5 py-1 rounded-full uppercase">Epidemiología</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">Dra. Mariana Solís Peña</h3>
                    <p class="text-xs font-extrabold text-brand-600 mt-0.5">Céd. Esp. 8819204 • INSP</p>
                    <div class="mt-3 space-y-1.5 text-xs text-slate-700 font-medium">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-hospital text-slate-400"></i> Centro Los Olivos (Oriente)</div>
                        <div class="flex items-center gap-1.5"><i class="fa-regular fa-clock text-slate-400"></i> Lun - Vie: 08:00 - 15:00 (Matutino)</div>
                    </div>
                </div>
            </div>
            <div class="p-5 pt-0">
                <a href="/citas" class="w-full bg-slate-100 hover:bg-brand-600 hover:text-white text-brand-700 font-extrabold text-xs py-2.5 rounded-lg text-center block transition">
                    Agendar con Dra. Solís
                </a>
            </div>
        </article>

        <!-- Doctor 12 (NUEVO: Medicina Interna) -->
        <article class="doc-card bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl hover:border-brand-500 transition flex flex-col justify-between group"
                 data-name="Dr. Esteban Rangel Corona" data-specialty="general" data-shift="vespertino" data-cedula="7190284">
            <div>
                <div class="relative h-60 overflow-hidden bg-slate-100">
                    <img src="{{ asset('img/doctores/doc12.jpg') }}" alt="Dr. Esteban Rangel Corona" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-brand-600 text-white text-xs font-black px-2.5 py-1 rounded-full uppercase">Medicina Interna</span>
                </div>
                <div class="p-5">
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">Dr. Esteban Rangel C.</h3>
                    <p class="text-xs font-extrabold text-brand-600 mt-0.5">Céd. Esp. 7190284 • UADY</p>
                    <div class="mt-3 space-y-1.5 text-xs text-slate-700 font-medium">
                        <div class="flex items-center gap-1.5"><i class="fa-solid fa-hospital text-slate-400"></i> Unidad Rural El Roble</div>
                        <div class="flex items-center gap-1.5"><i class="fa-regular fa-clock text-slate-400"></i> Lun - Sáb: 13:00 - 19:30 (Vespertino)</div>
                    </div>
                </div>
            </div>
            <div class="p-5 pt-0">
                <a href="/citas" class="w-full bg-slate-100 hover:bg-brand-600 hover:text-white text-brand-700 font-extrabold text-xs py-2.5 rounded-lg text-center block transition">
                    Agendar con Dr. Rangel
                </a>
            </div>
        </article>

    </div>

    <!-- Mensaje sin resultados -->
    <div id="no-docs-results" class="hidden p-8 bg-amber-50 rounded-2xl border-2 border-amber-200 text-center mt-6">
        <i class="fa-solid fa-user-xmark text-4xl text-amber-500 mb-2"></i>
        <h4 class="text-xl font-bold text-slate-900">No se encontraron médicos con ese criterio</h4>
        <p class="text-sm text-slate-600 mt-1">Verifica el nombre, cédula o la especialidad seleccionada.</p>
        <button type="button" onclick="resetDoctorFilters()" class="mt-4 px-5 py-2.5 bg-brand-600 text-white font-bold text-sm rounded-xl shadow">
            Mostrar Todos los 12 Médicos
        </button>
    </div>

</div>

<!-- SCRIPT DE FILTRADO EN VIVO PARA DOCTORES -->
<script>
    const docSearch = document.getElementById('doc-search');
    const docSpec = document.getElementById('doc-specialty');
    const docShift = document.getElementById('doc-shift');
    const docCards = document.querySelectorAll('.doc-card');
    const noDocs = document.getElementById('no-docs-results');
    const docCounter = document.getElementById('doc-counter');
    const btnResetDocs = document.getElementById('btn-reset-docs');

    function applyDocFilters() {
        const query = (docSearch.value || '').toLowerCase().trim();
        const specialty = (docSpec.value || '').toLowerCase();
        const shift = (docShift.value || '').toLowerCase();

        let visible = 0;

        docCards.forEach(card => {
            const name = card.getAttribute('data-name').toLowerCase();
            const spec = card.getAttribute('data-specialty').toLowerCase();
            const cardShift = card.getAttribute('data-shift').toLowerCase();
            const cedula = card.getAttribute('data-cedula').toLowerCase();
            const text = card.innerText.toLowerCase();

            const matchQuery = !query || text.includes(query) || name.includes(query) || cedula.includes(query);
            const matchSpec = !specialty || spec === specialty || text.includes(specialty);
            const matchShift = !shift || cardShift === shift;

            if (matchQuery && matchSpec && matchShift) {
                card.classList.remove('hidden');
                visible++;
            } else {
                card.classList.add('hidden');
            }
        });

        docCounter.textContent = `Mostrando ${visible} de ${docCards.length} médicos certificados`;
        if (visible === 0) {
            noDocs.classList.remove('hidden');
        } else {
            noDocs.classList.add('hidden');
        }
    }

    docSearch.addEventListener('input', applyDocFilters);
    docSpec.addEventListener('change', applyDocFilters);
    docShift.addEventListener('change', applyDocFilters);

    function filterBySpecPill(val) {
        docSpec.value = val;
        applyDocFilters();
    }

    function resetDoctorFilters() {
        docSearch.value = '';
        docSpec.value = '';
        docShift.value = '';
        applyDocFilters();
    }

    btnResetDocs.addEventListener('click', resetDoctorFilters);
</script>
@endsection