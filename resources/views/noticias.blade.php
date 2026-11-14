@extends('layouts.app')

@section('title', 'Noticias y Catálogo de Productos y Servicios')

@section('content')
<!-- Header de la Sección -->
<div class="bg-brand-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-brand-200 mb-2">
            <a href="/" class="hover:underline">Inicio</a> &gt; <span class="text-white">Noticias y Catálogo de Servicios</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-black tracking-tight">Catálogo de Productos, Campañas y Servicios Médicos</h1>
        <p class="text-brand-100 text-base sm:text-lg mt-2 max-w-3xl font-medium">
            Consulta y encuentra en tiempo real nuestras vacunas, tratamientos odontológicos, alertas epidemiológicas y jornadas de salud pública comunitaria.
        </p>
    </div>
</div>

<!-- ==================================================================== -->
<!-- ACTIVIDAD: BUSCADOR DE PRODUCTOS Y SERVICIOS POR NOMBRE (JAVASCRIPT)  -->
<!-- ==================================================================== -->
<div class="bg-gradient-to-r from-slate-900 via-brand-900 to-slate-900 text-white py-8 border-b-4 border-accent-500 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-accent-500 text-white text-xs font-black uppercase tracking-wider mb-2">
                    <i class="fa-solid fa-magnifying-glass"></i> Buscador Interactivo JavaScript
                </span>
                <h2 class="text-xl sm:text-2xl font-black text-white">Buscador de Productos por Nombre</h2>
                <p class="text-xs sm:text-sm text-slate-300 font-medium">
                    Filtrado interactivo en tiempo real mediante eventos de teclado, enlaces por Id y búsqueda por clases asignadas a cada división.
                </p>
            </div>
            
            <!-- Contador de Resultados Visibles -->
            <div class="flex items-center gap-2">
                <span class="px-4 py-2 bg-white/10 backdrop-blur rounded-xl border border-white/20 text-xs sm:text-sm font-black text-white flex items-center gap-2" id="contador-resultados">
                    <i class="fa-solid fa-layer-group text-accent-500"></i> Mostrando 20 de 20 productos
                </span>
            </div>
        </div>

        <!-- Barra de Entrada y Botón de Limpiar -->
        <div class="flex flex-col sm:flex-row gap-3 pt-2">
            <div class="relative flex-grow">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                    <i class="fa-solid fa-search text-base"></i>
                </div>
                <input type="text" 
                       id="input-busqueda" 
                       placeholder="Escriba el nombre del producto o servicio (ej. influenza, caries, dengue, diabetes, lentes)..." 
                       class="w-full pl-11 pr-4 py-3.5 bg-white text-slate-900 placeholder-slate-400 rounded-xl border-2 border-slate-300 focus:outline-none focus:border-brand-500 focus:ring-2 focus:ring-brand-200 text-sm sm:text-base font-medium shadow-sm transition">
            </div>
            <button type="button" 
                    id="btn-limpiar" 
                    class="px-5 py-3.5 bg-slate-800 hover:bg-slate-700 text-white rounded-xl border border-slate-600 font-bold text-sm transition flex items-center justify-center gap-2 shadow-sm cursor-pointer hover:border-slate-400">
                <i class="fa-solid fa-rotate-left"></i>
                <span>Limpiar</span>
            </button>
        </div>

        <!-- Sugerencias de Búsqueda Rápida para Demostración en Video o Clase -->
        <div class="flex flex-wrap items-center gap-2 pt-1 text-xs">
            <span class="text-slate-400 font-semibold"><i class="fa-solid fa-tags text-accent-500 mr-1"></i> Sugerencias rápidas:</span>
            <button type="button" onclick="buscarSugerencia('influenza')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">Influenza</button>
            <button type="button" onclick="buscarSugerencia('caries')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">Caries</button>
            <button type="button" onclick="buscarSugerencia('dengue')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">Dengue</button>
            <button type="button" onclick="buscarSugerencia('diabetes')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">Diabetes</button>
            <button type="button" onclick="buscarSugerencia('visual')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">Salud Visual</button>
            <button type="button" onclick="buscarSugerencia('mastografia')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">Mastografía</button>
            <button type="button" onclick="buscarSugerencia('vph')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">VPH</button>
            <button type="button" onclick="buscarSugerencia('limpieza')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">Limpieza Dental</button>
        </div>

    </div>
</div>

<!-- ==================================================================== -->
<!-- CATÁLOGO DE PRODUCTOS: DIVISIONES CON CLASES ASIGNADAS              -->
<!-- ==================================================================== -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12" id="catalogo-productos">
    
    <!-- Mensaje cuando la búsqueda no produce resultados -->
    <div id="mensaje-sin-resultados" class="hidden bg-amber-50 border-2 border-amber-300 text-amber-900 rounded-2xl p-8 text-center my-6 max-w-2xl mx-auto shadow-sm">
        <div class="w-16 h-16 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center text-2xl mx-auto mb-3">
            <i class="fa-solid fa-triangle-exclamation"></i>
        </div>
        <h3 class="text-lg font-black text-amber-900 mb-1">No se encontraron productos coincidentes</h3>
        <p class="text-sm text-amber-700 font-medium">No hay ningún producto o servicio en el catálogo que coincida con el término ingresado. Intente con otra palabra clave o haga clic en "Limpiar".</p>
    </div>

    <!-- Artículo 1 (Banner Destacado): Vacunación + Adultos Mayores + Clínica Fija -->
    <div class="articulo producto vacunacion prod-influenza influenza covid neumococo sub-vacunacion sub-mayor sub-clinica bg-gradient-to-r from-amber-500 via-amber-600 to-orange-600 rounded-2xl overflow-hidden shadow-xl text-white" data-categoria="vacunacion" data-nombre="Jornada Nacional de Vacunación contra Influenza, COVID-19 y Neumococo">
        <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
            
            <div class="p-8 lg:p-12 lg:col-span-7 space-y-4">
                <div class="flex flex-wrap gap-2 items-center">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-black/25 text-white text-xs font-black uppercase tracking-wider">
                        <i class="fa-solid fa-bullhorn"></i> Campaña Prioritaria
                    </span>
                    <span class="px-2.5 py-0.5 rounded-full bg-white/20 text-white text-xs font-bold">Adultos Mayores</span>
                    <span class="px-2.5 py-0.5 rounded-full bg-white/20 text-white text-xs font-bold">Clínica Fija</span>
                </div>
                <h2 class="text-2xl sm:text-4xl font-black leading-tight">
                    Jornada Nacional de Vacunación contra Influenza, COVID-19 y Neumococo
                </h2>
                <p class="text-amber-50 text-base leading-relaxed font-medium">
                    Del 15 de octubre al 30 de noviembre en todas las 8 unidades médicas. Dirigida especialmente a niños de 6 meses a 5 años, mujeres embarazadas, adultos mayores de 60 años y personas con diabetes o hipertensión.
                </p>
                <div class="pt-2 flex flex-wrap gap-4 items-center text-xs sm:text-sm font-bold">
                    <span><i class="fa-solid fa-calendar mr-1.5"></i> Vigente todo el mes</span>
                    <span><i class="fa-solid fa-clock mr-1.5"></i> 08:00 a 18:00 hrs</span>
                    <span><i class="fa-solid fa-shield mr-1.5"></i> 100% Gratuita</span>
                </div>
            </div>

            <div class="lg:col-span-5 h-72 lg:h-full min-h-[320px] overflow-hidden">
                <img src="{{ asset('img/noticias/noticia1.jpg') }}" 
                     alt="Vacunación Comunitaria en Clínica" 
                     class="w-full h-full object-cover">
            </div>

        </div>
    </div>

    <!-- Grid de Artículos del Catálogo -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="grid-articulos">
        
        <!-- ========================================================== -->
        <!-- CATEGORÍA: VACUNACIÓN (Artículos 2 al 5)                   -->
        <!-- ========================================================== -->
        
        <!-- Artículo 2: Vacunación + Infantil + Clínica Fija -->
        <article class="articulo producto vacunacion prod-cartilla-infantil cartilla infantil hexavalente rotavirus srp sub-vacunacion sub-infantil sub-clinica bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="vacunacion" data-nombre="Módulos de Refuerzo de Cartilla Infantil Nacional">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion2.jpg') }}" alt="Vacunación Infantil" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Módulos de Refuerzo de Cartilla Infantil Nacional
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Aplicación continua de vacunas hexavalente, rotavirus y triple viral (SRP) para menores de 6 años en las 8 unidades médicas.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-syringe mr-1 text-amber-500"></i> Pediatría</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 3: Vacunación + Infantil + Escuelas -->
        <article class="articulo producto vacunacion prod-vph vph papiloma escolar cancer cervicouterino sub-vacunacion sub-infantil sub-escuela bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="vacunacion" data-nombre="Campaña de Vacunación contra el Virus del Papiloma Humano (VPH)">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion3.jpg') }}" alt="Vacunación VPH" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil / Escolar</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Campaña de Vacunación contra el Virus del Papiloma Humano (VPH)
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Brigadas escolares recorren primarias y secundarias municipales aplicando dosis protectoras contra el cáncer cervicouterino.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-shield-virus mr-1 text-amber-500"></i> Salud Escolar</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 4: Vacunación + Adultos + Brigada Móvil -->
        <article class="articulo producto vacunacion prod-antirrabica antirrabica canina felina mascotas perros gatos animales sub-vacunacion sub-adultos sub-brigada bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="vacunacion" data-nombre="Jornada Municipal de Vacunación Antirrábica Canina y Felina">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion4.jpg') }}" alt="Vacunación Antirrábica" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos y Familias</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Jornada Municipal de Vacunación Antirrábica Canina y Felina
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Instalación de puestos móviles en parques comunitarios para inmunización gratuita de perros y gatos a partir del primer mes de vida.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-paw mr-1 text-amber-500"></i> Bienestar Animal</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 5: Vacunación + Adultos + Clínica Fija -->
        <article class="articulo producto vacunacion prod-tetanos-hepatitis tetanos hepatitis refuerzo adultos manuales campo sub-vacunacion sub-adultos sub-clinica bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="vacunacion" data-nombre="Dosis de Refuerzo de Tétanos y Hepatitis B para Adultos">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion5.jpg') }}" alt="Vacunación Adultos" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Dosis de Refuerzo de Tétanos y Hepatitis B para Adultos
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Campaña enfocada en comerciantes, trabajadores manuales y del campo con módulos especiales en turnos matutino y vespertino.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-user-shield mr-1 text-amber-500"></i> Medicina Preventiva</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>


        <!-- ========================================================== -->
        <!-- CATEGORÍA: SALUD DENTAL (5 Artículos)                      -->
        <!-- ========================================================== -->

        <!-- Artículo 6: Dental + Infantil + Escuelas -->
        <article class="articulo producto dental prod-caries-infantil caries fluor dental bucal escolar dientes ninos ninas sub-dental sub-infantil sub-escuela bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental" data-nombre="Semana de Detección y Prevención de Caries en Escuelas Primarias">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/noticia2.jpg') }}" alt="Brigada de Salud Bucal" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil / Escolar</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Semana de Detección y Prevención de Caries en Escuelas Primarias
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Nuestras brigadas odontológicas visitaron 8 escuelas del municipio brindando aplicación de flúor y kits dentales gratuitos a más de 1,200 niños.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-tooth mr-1 text-teal-600"></i> Coord. Odontología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 7: Dental + Adultos Mayores + Clínica Fija -->
        <article class="articulo producto dental prod-limpieza-ultrasonido limpieza ultrasonido resinas curaciones sarro dental profilaxis sub-dental sub-mayor sub-clinica bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental" data-nombre="Programa de Limpiezas Dentales con Ultrasonido y Resinas Sin Costo">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental2.jpg') }}" alt="Limpiezas Dentales" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Programa de Limpiezas Dentales con Ultrasonido y Resinas Sin Costo
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Atención restaurativa para personas de escasos recursos y adultos mayores en los consultorios odontológicos de la red municipal.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-tooth mr-1 text-teal-600"></i> Clínica Central</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 8: Dental + Infantil + Brigada Móvil -->
        <article class="articulo producto dental prod-cepillado-bucal cepillado higiene bucal hilo dental enjuague preventiva tecnica sub-dental sub-infantil sub-brigada bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental" data-nombre="Talleres Prácticos de Técnica Correcta de Cepillado y Uso de Hilo Dental">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental3.jpg') }}" alt="Técnica de Cepillado" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil y Familias</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Talleres Prácticos de Técnica Correcta de Cepillado y Uso de Hilo Dental
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Charlas demostrativas en plazas públicas sobre higiene bucal, uso de enjuagues y nutrición libre de azúcares cariogénicos.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-teeth mr-1 text-teal-600"></i> Promoción de la Salud</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 9: Dental + Adultos + Clínica Fija -->
        <article class="articulo producto dental prod-extraccion-dental extraccion odontalgia dolor dental muelas infeccion abscesos anestesia sub-dental sub-adultos sub-clinica bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental" data-nombre="Jornada de Extracciones Simples y Alivio del Dolor Dental Agudo">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental4.jpg') }}" alt="Cirugía Bucal" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Jornada de Extracciones Simples y Alivio del Dolor Dental Agudo
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Atención prioritaria para infecciones dentales, abscesos y extracciones no complejas con instrumental completamente esterilizado.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-tooth mr-1 text-teal-600"></i> Módulo Sur</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 10: Dental + Adultos Mayores + Clínica Fija -->
        <article class="articulo producto dental prod-gingivitis-periodoncia gingivitis periodoncia encias sangrado diabeticos perdida dental cronicos sub-dental sub-mayor sub-clinica bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="dental" data-nombre="Diagnóstico Oportuno de Gingivitis y Enfermedad Periodontal en Diabéticos">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental5.jpg') }}" alt="Periodoncia" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Diagnóstico Oportuno de Gingivitis y Enfermedad Periodontal en Diabéticos
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Revisiones dirigidas a pacientes con padecimientos crónicos para prevenir pérdida prematura de piezas dentales e infecciones bucales.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-tooth mr-1 text-teal-600"></i> Salud Integral</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>


        <!-- ========================================================== -->
        <!-- CATEGORÍA: ALERTAS Y MEDICINA PREVENTIVA (10 Artículos)    -->
        <!-- ========================================================== -->

        <!-- Artículo 11: Alerta + Adultos + Brigada Móvil -->
        <article class="articulo producto alerta prod-dengue-zika dengue zika chikungunya criaderos mosquitos fumigacion larvas sub-alerta sub-adultos sub-brigada bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta" data-nombre="Recomendaciones para Evitar Criaderos de Mosquitos del Dengue">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/noticia3.jpg') }}" alt="Alerta Dengue" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos / Hogares</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Recomendaciones para Evitar Criaderos de Mosquitos del Dengue
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Se invita a la ciudadanía a lavar, tapar, voltear y tirar recipientes que acumulen agua en patios y techos ante el incremento de lluvias recientes.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-triangle-exclamation mr-1 text-red-600"></i> Epidemiología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 12: Alerta + Adultos Mayores + Clínica Fija -->
        <article class="articulo producto alerta prod-infecciones-respiratorias respiratorias termico frio invierno neumonia influenza tos fiebre sub-alerta sub-mayor sub-clinica bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta" data-nombre="Aviso por Descenso Térmico e Infecciones Respiratorias Agudas">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta2.jpg') }}" alt="Alerta Bajas Temperaturas" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Aviso por Descenso Térmico e Infecciones Respiratorias Agudas
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Medidas preventivas ante frentes fríos: abrigo adecuado, consumo de vitamina C y acudir de inmediato al centro de salud si se presenta fiebre alta.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-shield-virus mr-1 text-red-600"></i> Protección Civil</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 13: Alerta + Adultos + Brigada Móvil -->
        <article class="articulo producto alerta prod-golpe-de-calor calor golpe insolacion deshidratacion suero oral vida verano sol sub-alerta sub-adultos sub-brigada bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta" data-nombre="Aviso Preventivo: Síntomas y Manejo Inmediato del Golpe de Calor">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta3.jpg') }}" alt="Golpe de Calor" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos y Trabajadores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Aviso Preventivo: Síntomas y Manejo Inmediato del Golpe de Calor
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Distribución gratuita de sobres de Vida Suero Oral en módulos móviles comunitarios y recomendaciones de hidratación permanente.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-sun mr-1 text-red-600"></i> Salud Preventiva</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 14: Alerta + Adultos + Planteles Escolares -->
        <article class="articulo producto alerta prod-cloracion-agua agua cloracion desinfeccion alimentos colera salmonelosis hervir desinfectar sub-alerta sub-adultos sub-escuela bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta" data-nombre="Protocolo de Cloración de Agua y Desinfección de Alimentos Crudos">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta4.jpg') }}" alt="Higiene del Agua" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos / Familias</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Protocolo de Cloración de Agua y Desinfección de Alimentos Crudos
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Talleres en cooperativas escolares para prevenir brotes de salmonelosis y cólera: hervir agua de consumo y lavar minuciosamente alimentos.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-faucet-detergent mr-1 text-red-600"></i> Regulación Sanitaria</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 15: Alerta + Infantil + Planteles Escolares -->
        <article class="articulo producto alerta prod-calidad-aire aire calidad ambiental asma contingencia contaminacion pulmones inhaladores sub-alerta sub-infantil sub-escuela bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="alerta" data-nombre="Alerta Ambiental por Calidad del Aire y Protección para Pacientes Asmáticos">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta5.jpg') }}" alt="Calidad del Aire" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Alerta Ambiental por Calidad del Aire y Protección para Pacientes Asmáticos
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Recomendación de suspensión de actividades cívicas al aire libre en escuelas para niños vulnerables y disponibilidad de inhaladores.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-wind mr-1 text-red-600"></i> Neumología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 16: Jornadas + Adultos Mayores + Brigada Móvil -->
        <article class="articulo producto jornadas prod-salud-visual visual ojos lentes agudeza optometria anteojos vista gafas graduadas sub-alerta sub-mayor sub-brigada bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="jornadas" data-nombre="Próxima Jornada de Salud Visual: Examen de la Vista y Lentes">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/noticia4.jpg') }}" alt="Salud Visual" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Próxima Jornada de Salud Visual: Examen de la Vista y Lentes
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Este fin de semana en el Centro Comunitario Las Torres se realizarán exámenes de optometría computarizada y entrega de anteojos graduados.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-glasses mr-1 text-emerald-600"></i> DIF y Salud</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 17: Jornadas + Adultos + Brigada Móvil -->
        <article class="articulo producto jornadas prod-mastografia mastografia cancer mama autoexploracion radiologica femenina mujeres senos sub-alerta sub-adultos sub-brigada bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="jornadas" data-nombre="Feria de Mastografías Gratuitas y Detección de Cáncer de Mama">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas2.jpg') }}" alt="Mastografías" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos / Mujeres</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Feria de Mastografías Gratuitas y Detección de Cáncer de Mama
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Unidad radiológica móvil para mujeres de 40 a 69 años en la Explanada Municipal con mastografías de alta definición.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-ribbon mr-1 text-emerald-600"></i> Salud Femenina</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 18: Jornadas + Adultos Mayores + Brigada Móvil -->
        <article class="articulo producto jornadas prod-brigada-rural rural ejidos comunidades brigada farmacos caravana campo medicina familiar sub-vacunacion sub-mayor sub-brigada bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="jornadas" data-nombre="Brigada Médica Rural en Ejidos y Zonas Comunitarias Alejadas">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas3.jpg') }}" alt="Brigada Rural" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Brigada Médica Rural en Ejidos y Zonas Comunitarias Alejadas
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Consultas de medicina familiar, vacunación geriátrica y entrega gratuita de fármacos de cuadro básico en unidades móviles.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-truck-medical mr-1 text-emerald-600"></i> Caravana Comunitaria</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 19: Jornadas + Adultos Mayores + Clínica Fija -->
        <article class="articulo producto jornadas prod-diabetes-hipertension diabetes hipertension glucosa presion arterial corazon lipidos nutricion sub-alerta sub-mayor sub-clinica bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="jornadas" data-nombre="Jornada de Detección Temprana de Diabetes e Hipertensión Arterial">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas4.jpg') }}" alt="Detección Diabetes" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Jornada de Detección Temprana de Diabetes e Hipertensión Arterial
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Toma masiva de glucosa capilar en ayuno, perfil lipídico, medición de presión arterial y consulta nutricional personalizada.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-heart-pulse mr-1 text-emerald-600"></i> Medicina Interna</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 20: Jornadas + Infantil + Planteles Escolares -->
        <article class="articulo producto jornadas prod-salud-emocional emocional salud mental psicologia ansiedad duelo apoyo depresion adicciones sub-alerta sub-infantil sub-escuela bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-categoria="jornadas" data-nombre="Jornada de Salud Emocional y Talleres de Manejo de Ansiedad y Duelo">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas5.jpg') }}" alt="Salud Mental" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil y Jóvenes</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 group-hover:text-brand-600 transition leading-snug">
                        Jornada de Salud Emocional y Talleres de Manejo de Ansiedad y Duelo
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Sesiones de orientación psicológica comunitaria, círculos de apoyo emocional y prevención de adicciones en secundarias.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-brain mr-1 text-emerald-600"></i> Psicología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

    </div>

</div>

<!-- Enlace al archivo JavaScript externo del Buscador de Productos -->
<script src="{{ asset('js/buscador.js') }}"></script>
@endsection
