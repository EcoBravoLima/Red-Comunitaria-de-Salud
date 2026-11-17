@extends('layouts.app')

@section('title', 'Catálogo de Productos - Actividad 16: Eventos Mouse')

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
            
            <!-- Contador de Resultados e Indicador de Mouse (ById) -->
            <div class="flex flex-wrap items-center gap-2">
                <span class="px-4 py-2 bg-white/10 backdrop-blur rounded-xl border border-white/20 text-xs sm:text-sm font-black text-white flex items-center gap-2 transition-all duration-300" id="indicador-producto-activo">
                    <i class="fa-solid fa-arrow-pointer text-amber-400"></i> Pasa el mouse sobre un producto
                </span>
                <span class="px-4 py-2 bg-white/10 backdrop-blur rounded-xl border border-white/20 text-xs sm:text-sm font-black text-white flex items-center gap-2" id="contador-resultados">
                    <i class="fa-solid fa-layer-group text-accent-500"></i> Mostrando 40 de 40 productos
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
            <button type="button" onclick="buscarSugerencia('prostata')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">Próstata</button>
            <button type="button" onclick="buscarSugerencia('papanicolaou')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">Papanicolaou</button>
            <button type="button" onclick="buscarSugerencia('nutricion')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">Nutrición</button>
            <button type="button" onclick="buscarSugerencia('rickettsia')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">Rickettsia</button>
            <button type="button" onclick="buscarSugerencia('neumococo')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">Neumococo</button>
            <button type="button" onclick="buscarSugerencia('protesis')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">Prótesis</button>
            <button type="button" onclick="buscarSugerencia('auxilios')" class="px-3 py-1 bg-white/10 hover:bg-white/20 rounded-lg text-slate-200 hover:text-white transition cursor-pointer">Primeros Auxilios</button>
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
    <div id="producto-destacado" class="articulo producto vacunacion prod-influenza influenza covid neumococo sub-vacunacion sub-mayor sub-clinica bg-gradient-to-r from-amber-500 via-amber-600 to-orange-600 rounded-lg border-4 border-transparent overflow-hidden shadow-sm text-white transition-all duration-300 ease-in-out cursor-pointer" data-categoria="vacunacion" data-nombre="Jornada Nacional de Vacunación contra Influenza, COVID-19 y Neumococo">
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
        <article class="articulo producto vacunacion prod-cartilla-infantil cartilla infantil hexavalente rotavirus srp sub-vacunacion sub-infantil sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="vacunacion" data-nombre="Módulos de Refuerzo de Cartilla Infantil Nacional">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion2.jpg') }}" alt="Vacunación Infantil" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto vacunacion prod-vph vph papiloma escolar cancer cervicouterino sub-vacunacion sub-infantil sub-escuela tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="vacunacion" data-nombre="Campaña de Vacunación contra el Virus del Papiloma Humano (VPH)">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion3.jpg') }}" alt="Vacunación VPH" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil / Escolar</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto vacunacion prod-antirrabica antirrabica canina felina mascotas perros gatos animales sub-vacunacion sub-adultos sub-brigada tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="vacunacion" data-nombre="Jornada Municipal de Vacunación Antirrábica Canina y Felina">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion4.jpg') }}" alt="Vacunación Antirrábica" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos y Familias</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto vacunacion prod-tetanos-hepatitis tetanos hepatitis refuerzo adultos manuales campo sub-vacunacion sub-adultos sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="vacunacion" data-nombre="Dosis de Refuerzo de Tétanos y Hepatitis B para Adultos">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion5.jpg') }}" alt="Vacunación Adultos" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto dental prod-caries-infantil caries fluor dental bucal escolar dientes ninos ninas sub-dental sub-infantil sub-escuela tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="dental" data-nombre="Semana de Detección y Prevención de Caries en Escuelas Primarias">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/noticia2.jpg') }}" alt="Brigada de Salud Bucal" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil / Escolar</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto dental prod-limpieza-ultrasonido limpieza ultrasonido resinas curaciones sarro dental profilaxis sub-dental sub-mayor sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="dental" data-nombre="Programa de Limpiezas Dentales con Ultrasonido y Resinas Sin Costo">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental2.jpg') }}" alt="Limpiezas Dentales" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto dental prod-cepillado-bucal cepillado higiene bucal hilo dental enjuague preventiva tecnica sub-dental sub-infantil sub-brigada tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="dental" data-nombre="Talleres Prácticos de Técnica Correcta de Cepillado y Uso de Hilo Dental">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental3.jpg') }}" alt="Técnica de Cepillado" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil y Familias</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto dental prod-extraccion-dental extraccion odontalgia dolor dental muelas infeccion abscesos anestesia sub-dental sub-adultos sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="dental" data-nombre="Jornada de Extracciones Simples y Alivio del Dolor Dental Agudo">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental4.jpg') }}" alt="Cirugía Bucal" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto dental prod-gingivitis-periodoncia gingivitis periodoncia encias sangrado diabeticos perdida dental cronicos sub-dental sub-mayor sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="dental" data-nombre="Diagnóstico Oportuno de Gingivitis y Enfermedad Periodontal en Diabéticos">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental5.jpg') }}" alt="Periodoncia" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto alerta prod-dengue-zika dengue zika chikungunya criaderos mosquitos fumigacion larvas sub-alerta sub-adultos sub-brigada tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="alerta" data-nombre="Recomendaciones para Evitar Criaderos de Mosquitos del Dengue">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/noticia3.jpg') }}" alt="Alerta Dengue" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos / Hogares</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto alerta prod-infecciones-respiratorias respiratorias termico frio invierno neumonia influenza tos fiebre sub-alerta sub-mayor sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="alerta" data-nombre="Aviso por Descenso Térmico e Infecciones Respiratorias Agudas">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta2.jpg') }}" alt="Alerta Bajas Temperaturas" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto alerta prod-golpe-de-calor calor golpe insolacion deshidratacion suero oral vida verano sol sub-alerta sub-adultos sub-brigada tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="alerta" data-nombre="Aviso Preventivo: Síntomas y Manejo Inmediato del Golpe de Calor">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta3.jpg') }}" alt="Golpe de Calor" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos y Trabajadores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto alerta prod-cloracion-agua agua cloracion desinfeccion alimentos colera salmonelosis hervir desinfectar sub-alerta sub-adultos sub-escuela tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="alerta" data-nombre="Protocolo de Cloración de Agua y Desinfección de Alimentos Crudos">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta4.jpg') }}" alt="Higiene del Agua" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos / Familias</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto alerta prod-calidad-aire aire calidad ambiental asma contingencia contaminacion pulmones inhaladores sub-alerta sub-infantil sub-escuela tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="alerta" data-nombre="Alerta Ambiental por Calidad del Aire y Protección para Pacientes Asmáticos">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta5.jpg') }}" alt="Calidad del Aire" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto jornadas prod-salud-visual visual ojos lentes agudeza optometria anteojos vista gafas graduadas sub-alerta sub-mayor sub-brigada tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="jornadas" data-nombre="Próxima Jornada de Salud Visual: Examen de la Vista y Lentes">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/noticia4.jpg') }}" alt="Salud Visual" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto jornadas prod-mastografia mastografia cancer mama autoexploracion radiologica femenina mujeres senos sub-alerta sub-adultos sub-brigada tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="jornadas" data-nombre="Feria de Mastografías Gratuitas y Detección de Cáncer de Mama">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas2.jpg') }}" alt="Mastografías" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos / Mujeres</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto jornadas prod-brigada-rural rural ejidos comunidades brigada farmacos caravana campo medicina familiar sub-vacunacion sub-mayor sub-brigada tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="jornadas" data-nombre="Brigada Médica Rural en Ejidos y Zonas Comunitarias Alejadas">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas3.jpg') }}" alt="Brigada Rural" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto jornadas prod-diabetes-hipertension diabetes hipertension glucosa presion arterial corazon lipidos nutricion sub-alerta sub-mayor sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="jornadas" data-nombre="Jornada de Detección Temprana de Diabetes e Hipertensión Arterial">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas4.jpg') }}" alt="Detección Diabetes" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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
        <article class="articulo producto jornadas prod-salud-emocional emocional salud mental psicologia ansiedad duelo apoyo depresion adicciones sub-alerta sub-infantil sub-escuela tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="jornadas" data-nombre="Jornada de Salud Emocional y Talleres de Manejo de Ansiedad y Duelo">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas5.jpg') }}" alt="Salud Mental" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil y Jóvenes</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
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

        <!-- ========================================================== -->
        <!-- CATEGORÍA: VACUNACIÓN ADICIONAL (Artículos 21 al 25)       -->
        <!-- ========================================================== -->

        <!-- Artículo 21: Vacunación + Adultos Mayores + Clínica Fija -->
        <article class="articulo producto vacunacion prod-neumococo neumococo pulmonar neumonia vacuna adultos mayores geriatria sub-vacunacion sub-mayor sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="vacunacion" data-nombre="Aplicación Gratuita de la Vacuna Neumocócica para Mayores de 60 Años">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion_neumococo.jpg') }}" alt="Vacunación Neumococo" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Aplicación Gratuita de la Vacuna Neumocócica para Mayores de 60 Años
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Protección contra neumonía bacteriana y meningitis para adultos mayores y personas con enfermedades pulmonares crónicas en las 8 clínicas.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-syringe mr-1 text-amber-500"></i> Neumología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 22: Vacunación + Infantil + Escuelas -->
        <article class="articulo producto vacunacion prod-sarampion sarampion rubeola parotiditis srp refuerzo escolar ninos sub-vacunacion sub-infantil sub-escuela tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="vacunacion" data-nombre="Campaña Intensiva de Vacunación contra Sarampión y Rubéola en Escuelas">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion_sarampion.jpg') }}" alt="Vacunación Sarampión" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil y Escolar</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Campaña Intensiva de Vacunación contra Sarampión y Rubéola en Escuelas
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Brigadas médicas aplican refuerzos de vacuna SRP y SR en guarderías y preescolares municipales para garantizar cobertura del 100%.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-shield-virus mr-1 text-amber-500"></i> Salud Infantil</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 23: Vacunación + Infantil + Clínica Fija -->
        <article class="articulo producto vacunacion prod-rotavirus rotavirus diarrea deshidratacion lactantes bebes pediatria sub-vacunacion sub-infantil sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="vacunacion" data-nombre="Inmunización contra Rotavirus y Diarreas Agudas para Lactantes">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion_rotavirus.jpg') }}" alt="Vacuna Rotavirus" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Lactantes y Bebés</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Inmunización contra Rotavirus y Diarreas Agudas para Lactantes
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Dosis oral para recién nacidos de 2 a 7 meses para prevenir gastroenteritis graves, disponible diariamente en módulos de medicina preventiva.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-baby mr-1 text-amber-500"></i> Pediatría</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 24: Vacunación + Adultos + Clínica Fija -->
        <article class="articulo producto vacunacion prod-tosferina tosferina tdpa embarazadas maternidad materna prenatal gestacion sub-vacunacion sub-adultos sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="vacunacion" data-nombre="Aplicación de Vacuna Tdpa para Mujeres Embarazadas a partir de la Semana 20">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion_tosferina.jpg') }}" alt="Vacuna Embarazadas" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Salud Materna</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Aplicación de Vacuna Tdpa para Mujeres Embarazadas a partir de la Semana 20
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Inmunización prenatal contra tétanos, difteria y tos ferina que transfiere anticuerpos protectores al bebé antes del nacimiento.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-person-pregnant mr-1 text-amber-500"></i> Ginecología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 25: Vacunación + Adultos + Brigada Móvil -->
        <article class="articulo producto vacunacion prod-hepatitis hepatitis higado hepatico alimentos manipuladores comerciantes sub-vacunacion sub-adultos sub-brigada tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="vacunacion" data-nombre="Jornada Extraordinaria de Inmunización contra Hepatitis A y B en Mercados">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/vacunacion_hepatitis.jpg') }}" alt="Vacuna Hepatitis" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-amber-500 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Vacunación</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos y Comerciantes</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Jornada Extraordinaria de Inmunización contra Hepatitis A y B en Mercados
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Atención directa a manejadores de alimentos, carniceros y comerciantes de mercados municipales con esquemas completos de protección hepática.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-syringe mr-1 text-amber-500"></i> Regulación Sanitaria</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>


        <!-- ========================================================== -->
        <!-- CATEGORÍA: SALUD DENTAL ADICIONAL (Artículos 26 al 30)     -->
        <!-- ========================================================== -->

        <!-- Artículo 26: Dental + Infantil + Escuelas -->
        <article class="articulo producto dental prod-selladores selladores fosetas fisuras ninos caries molares esmalte sub-dental sub-infantil sub-escuela tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="dental" data-nombre="Programa de Selladores de Fosetas y Fisuras para Protección de Molares Infantiles">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental_selladores.jpg') }}" alt="Selladores Dentales" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Programa de Selladores de Fosetas y Fisuras para Protección de Molares Infantiles
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Colocación de barreras resinosas protectoras e indoloras sobre muelas permanentes recién erupcionadas para evitar formación de caries.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-tooth mr-1 text-teal-600"></i> Odontopediatría</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 27: Dental + Adultos Mayores + Clínica Fija -->
        <article class="articulo producto dental prod-protesis protesis placas dentaduras postizas abuelitos mayores masticacion sub-dental sub-mayor sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="dental" data-nombre="Programa Municipal de Entrega de Prótesis Dentales y Placas para Adultos Mayores">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental_protesis.jpg') }}" alt="Prótesis Dentales" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Mayores</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Programa Municipal de Entrega de Prótesis Dentales y Placas para Adultos Mayores
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Toma de impresiones y elaboración sin costo de prótesis totales y removibles para devolver funcionalidad masticatoria y fonética a personas de la tercera edad.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-teeth-open mr-1 text-teal-600"></i> Prótesis y Rehabilitación</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 28: Dental + Adultos + Clínica Fija -->
        <article class="articulo producto dental prod-bruxismo bruxismo mandibula dolor desgaste dental estres ferulas sub-dental sub-adultos sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="dental" data-nombre="Clínica de Detección de Bruxismo, Férulas Oclusales y Tensión Muscular">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental_bruxismo.jpg') }}" alt="Bruxismo y Férulas" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos y Jóvenes</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Clínica de Detección de Bruxismo, Férulas Oclusales y Tensión Muscular
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Diagnóstico para dolor de mandíbula por estrés, desgaste severo de esmalte y fabricación de guardas oclusales protectoras nocturnas.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-tooth mr-1 text-teal-600"></i> Fisioterapia Bucal</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 29: Dental + Adultos + Clínica Fija -->
        <article class="articulo producto dental prod-flemones flemones abscesos infeccion celulitis antibacteriano dolor drenaje sub-dental sub-adultos sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="dental" data-nombre="Módulo de Urgencias Odontológicas: Flemones y Abscesos Dentales Agudos">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental_flemones.jpg') }}" alt="Urgencias Dentales" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Urgencias</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Módulo de Urgencias Odontológicas: Flemones y Abscesos Dentales Agudos
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Atención prioritaria 24 horas para drenaje de abscesos purulentos, inflamación maxilofacial y terapia con antibióticos intravenosos.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-kit-medical mr-1 text-teal-600"></i> Cirugía Maxilofacial</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 30: Dental + Infantil + Escuelas -->
        <article class="articulo producto dental prod-ortodoncia ortodoncia mordida maloclusion frenillos chuparse dedo respiracion bucal sub-dental sub-infantil sub-escuela tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="dental" data-nombre="Detección Temprana de Maloclusiones y Ortodoncia Preventiva en Primarias">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/dental_ortodoncia.jpg') }}" alt="Ortodoncia Preventiva" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-teal-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Salud Dental</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Detección Temprana de Maloclusiones y Ortodoncia Preventiva en Primarias
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Evaluación diagnóstica en niños de 6 a 12 años para corregir apiñamiento dental, deglución atípica y hábitos de succión digital antes de requerir frenillos.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-tooth mr-1 text-teal-600"></i> Ortodoncia</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>


        <!-- ========================================================== -->
        <!-- CATEGORÍA: ALERTAS EPIDEMIOLÓGICAS (Artículos 31 al 35)    -->
        <!-- ========================================================== -->

        <!-- Artículo 31: Alerta + Adultos + Brigada Móvil -->
        <article class="articulo producto alerta prod-rickettsia rickettsia garrapatas pulgas perros fiebre manchas desparasitacion sub-alerta sub-adultos sub-brigada tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="alerta" data-nombre="Alerta Epidemiológica por Rickettsiosis y Fumigación contra Garrapatas">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta_rickettsia.jpg') }}" alt="Alerta Rickettsia" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos y Mascotas</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Alerta Epidemiológica por Rickettsiosis y Fumigación contra Garrapatas
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Brigadas de fumigación en patios y aplicación gratuita de ectodesparasitante en perros para erradicar la garrapata café transmisora de rickettsia.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-bug mr-1 text-red-600"></i> Zoonosis y Vectores</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 32: Alerta + Infantil + Escuelas -->
        <article class="articulo producto alerta prod-pediculosis pediculosis piojos liendres cabello escolar peines vinagre sub-alerta sub-infantil sub-escuela tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="alerta" data-nombre="Campaña Escolar de Higiene Capilar y Erradicación de la Pediculosis">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta_pediculosis.jpg') }}" alt="Pediculosis Escolar" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Infantil y Familias</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Campaña Escolar de Higiene Capilar y Erradicación de la Pediculosis
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Distribución de peines liendreros especiales y champú permetrina al 1% en primarias para el control seguro de infestaciones por piojos.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-child mr-1 text-red-600"></i> Salud Escolar</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 33: Alerta + Adultos + Brigada Móvil -->
        <article class="articulo producto alerta prod-marea-roja marea roja mariscos pescados intoxicacion toxinas ostras moluscos sub-alerta sub-adultos sub-brigada tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="alerta" data-nombre="Aviso Preventivo por Veda y Monitoreo de Toxinas Marinas en Pescados y Mariscos">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta_marea_roja.jpg') }}" alt="Alerta Marea Roja" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Comerciantes / Familias</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Aviso Preventivo por Veda y Monitoreo de Toxinas Marinas en Pescados y Mariscos
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Inspección en restaurantes y pescaderías para evitar intoxicaciones paralizantes por toxina de marea roja. Se exhorta a consumir marisco cocido y certificado.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-fish mr-1 text-red-600"></i> Fomento Sanitario</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 34: Alerta + Adultos Mayores + Brigada Móvil -->
        <article class="articulo producto alerta prod-chagas chagas chinche besucona parasito corazon rural techos sub-alerta sub-mayor sub-brigada tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="alerta" data-nombre="Detección Temprana y Rociado Residual contra la Chinche del Mal de Chagas">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta_chagas.jpg') }}" alt="Enfermedad de Chagas" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Comunidades Rurales</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Detección Temprana y Rociado Residual contra la Chinche del Mal de Chagas
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Toma de gotas gruesas de sangre y fumigación intradomiciliaria en techos de paja y adobe de ejidos rurales para erradicar el parásito Trypanosoma cruzi.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-heart-crack mr-1 text-red-600"></i> Parasitología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 35: Alerta + Adultos + Clínica Fija -->
        <article class="articulo producto alerta prod-tuberculosis tuberculosis tos flemas baciloscopia pulmones catarro cronica sub-alerta sub-adultos sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="alerta" data-nombre="Protocolo Municipal de Detección de Tuberculosis en Pacientes con Tos Mayor a 15 Días">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/alerta_tuberculosis.jpg') }}" alt="Detección Tuberculosis" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-red-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Alerta</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Protocolo Municipal de Detección de Tuberculosis en Pacientes con Tos Mayor a 15 Días
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Estudios gratuitos de flema (baciloscopia seriada) y radiografías de tórax en laboratorios clínicos municipales con tratamiento farmacológico TAES garantizado.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-lungs mr-1 text-red-600"></i> Neumología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>


        <!-- ========================================================== -->
        <!-- CATEGORÍA: JORNADAS Y SALUD FAMILIAR (Artículos 36 al 40)  -->
        <!-- ========================================================== -->

        <!-- Artículo 36: Jornadas + Adultos Mayores + Clínica Fija -->
        <article class="articulo producto jornadas prod-prostata prostata antigeno prostatico hombres varonil orina sangre sub-alerta sub-mayor sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="jornadas" data-nombre="Jornada de Detección Temprana de Cáncer de Próstata con Antígeno Rápido">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas_prostata.jpg') }}" alt="Cáncer de Próstata" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Hombres Mayores de 45</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Jornada de Detección Temprana de Cáncer de Próstata con Antígeno Rápido
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Toma de muestra capilar en ayuno para prueba rápida de Antígeno Prostático Específico (PSA) con resultados confidenciales en menos de 20 minutos.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-mars mr-1 text-emerald-600"></i> Urología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 37: Jornadas + Adultos + Clínica Fija -->
        <article class="articulo producto jornadas prod-papanicolaou papanicolaou citologia matriz ginecologia mujeres femenina quistes sub-alerta sub-adultos sub-clinica tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="jornadas" data-nombre="Feria de Salud Integral de la Mujer: Papanicolaou y Exámenes Ginecológicos">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas_papanicolaou.jpg') }}" alt="Papanicolaou Gratuito" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Salud Femenina</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Clínica Fija</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Feria de Salud Integral de la Mujer: Papanicolaou y Exámenes Ginecológicos
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Citologías cervicales gratuitas para mujeres de 25 a 64 años, exploración de ganglios linfáticos y consulta preventiva para salud de la mujer.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-venus mr-1 text-emerald-600"></i> Ginecología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 38: Jornadas + Infantil + Brigada Móvil -->
        <article class="articulo producto jornadas prod-nutricion nutricion sobrepeso obesidad grasa corporal imc dieta porciones sub-alerta sub-infantil sub-brigada tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="jornadas" data-nombre="Módulo de Orientación Nutricional, Medición de Grasa Corporal y Menús Saludables">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas_nutricion.jpg') }}" alt="Orientación Nutricional" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Familias y Niños</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Módulo de Orientación Nutricional, Medición de Grasa Corporal y Menús Saludables
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Pesaje con básculas de bioimpedancia eléctrica, cálculo de índice de masa corporal (IMC) y entrega de planes alimenticios económicos y balanceados.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-apple-whole mr-1 text-emerald-600"></i> Nutrición Clínica</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 39: Jornadas + Adultos + Brigada Móvil -->
        <article class="articulo producto jornadas prod-sangre sangre donacion donantes transfusiones plaquetas salvar vidas altruista sub-vacunacion sub-adultos sub-brigada tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="jornadas" data-nombre="Campaña Comunitaria de Donación Altruista de Sangre y Tipificación Sanguínea">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas_sangre.jpg') }}" alt="Donación de Sangre" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Adultos Voluntarios</span>
                        <span class="bg-emerald-50 text-emerald-700 font-bold px-2 py-0.5 rounded text-[11px]">Brigada Móvil</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Campaña Comunitaria de Donación Altruista de Sangre y Tipificación Sanguínea
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Puesto móvil del Centro de Transfusión Sanguínea para captación voluntaria de sangre y entrega gratuita de credenciales con grupo y factor Rh.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-droplet mr-1 text-emerald-600"></i> Banco de Sangre</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 40: Jornadas + Adultos + Planteles Escolares -->
        <article class="articulo producto jornadas prod-primeros-auxilios primeros auxilios rcp atragantamiento emergencias vendajes quemaduras heimlich sub-alerta sub-adultos sub-escuela tarjeta-producto bg-white rounded-lg overflow-hidden shadow-sm border-2 border-slate-200 transition-all duration-300 ease-in-out flex flex-col justify-between cursor-pointer" data-categoria="jornadas" data-nombre="Talleres Prácticos de Primeros Auxilios, RCP Básico y Maniobra de Heimlich">
            <div>
                <div class="h-52 overflow-hidden relative">
                    <img src="{{ asset('img/noticias/jornadas_primeros_auxilios.jpg') }}" alt="Primeros Auxilios RCP" class="w-full h-full object-cover">
                    <span class="absolute top-3 right-3 bg-emerald-600 text-white font-black px-2.5 py-0.5 rounded-full text-xs uppercase shadow">Jornadas</span>
                </div>
                <div class="p-6">
                    <div class="flex flex-wrap gap-1.5 mb-2">
                        <span class="bg-purple-50 text-purple-700 font-bold px-2 py-0.5 rounded text-[11px]">Comunidad y Vecinos</span>
                        <span class="bg-blue-50 text-blue-700 font-bold px-2 py-0.5 rounded text-[11px]">Planteles Escolares</span>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 leading-snug">
                        Talleres Prácticos de Primeros Auxilios, RCP Básico y Maniobra de Heimlich
                    </h3>
                    <p class="text-sm text-slate-600 mt-2 leading-relaxed font-medium">
                        Capacitación comunitaria con maniquíes de simulación para actuar ante asfixia por atragantamiento, quemaduras caseras y paros cardíacos repentinos.
                    </p>
                </div>
            </div>
            <div class="p-6 pt-0 border-t border-slate-100 flex items-center justify-between text-xs sm:text-sm font-bold">
                <span class="text-slate-500"><i class="fa-solid fa-truck-medical mr-1 text-emerald-600"></i> Paramédicos y Rescate</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

    </div>

</div>

<!-- Enlace al archivo JavaScript externo del Buscador de Productos -->
<script src="{{ asset('js/buscador.js') }}"></script>
<!-- Enlace al archivo JavaScript externo de Eventos del Mouse (Actividad 16) -->
<script src="{{ asset('js/eventos_mouse.js') }}"></script>
@endsection
