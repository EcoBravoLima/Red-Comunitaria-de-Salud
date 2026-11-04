@extends('layouts.app')

@section('title', 'Noticias y Alertas Comunitarias')

@section('content')
<!-- Header de la Sección -->
<div class="bg-brand-600 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-brand-200 mb-2">
            <a href="/" class="hover:underline">Inicio</a> &gt; <span class="text-white">Noticias y Alertas</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-black tracking-tight">Comunicados, Campañas y Salud Pública</h1>
        <p class="text-brand-100 text-base sm:text-lg mt-2 max-w-3xl font-medium">
            Mantente informado sobre las jornadas de vacunación, brigadas médicas en colonias y avisos epidemiológicos de nuestra comunidad.
        </p>
    </div>
</div>

<!-- Filtros de Noticias Rápidos -->
<div class="bg-white border-b-2 border-slate-200 py-4 shadow-sm sticky top-20 z-40">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-wrap items-center justify-between gap-3">
        <div class="flex flex-wrap items-center gap-2">
            <span class="font-bold text-slate-700 text-sm"><i class="fa-solid fa-filter text-brand-600"></i> Categoría:</span>
            <button onclick="filterNews('')" class="news-pill px-3.5 py-1 text-xs sm:text-sm font-bold bg-brand-600 text-white rounded-full">Todas</button>
            <button onclick="filterNews('vacunacion')" class="news-pill px-3.5 py-1 text-xs sm:text-sm font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full">Vacunación</button>
            <button onclick="filterNews('dental')" class="news-pill px-3.5 py-1 text-xs sm:text-sm font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full">Salud Dental</button>
            <button onclick="filterNews('alerta')" class="news-pill px-3.5 py-1 text-xs sm:text-sm font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full">Alertas</button>
            <button onclick="filterNews('jornadas')" class="news-pill px-3.5 py-1 text-xs sm:text-sm font-bold bg-slate-100 hover:bg-slate-200 text-slate-800 rounded-full">Jornadas</button>
        </div>
        <div class="text-xs sm:text-sm font-bold text-slate-500">
            Actualizaciones oficiales del sector salud
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-12">
    
    <!-- Noticia Destacada / Banner Naranja con Foto Local -->
    <div class="news-item bg-gradient-to-r from-amber-500 via-amber-600 to-orange-600 rounded-2xl overflow-hidden shadow-xl text-white" data-cat="vacunacion">
        <div class="grid grid-cols-1 lg:grid-cols-12 items-center">
            
            <div class="p-8 lg:p-12 lg:col-span-7 space-y-4">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-black/25 text-white text-xs sm:text-sm font-black uppercase tracking-wider">
                    <i class="fa-solid fa-bullhorn animate-bounce"></i> Campaña Prioritaria Activa
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

    <!-- Grid de Artículos y Alertas con Fotos Locales -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <!-- Artículo 1 (Local) -->
        <article class="news-item bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-cat="dental">
            <div>
                <div class="h-52 overflow-hidden">
                    <img src="{{ asset('img/noticias/noticia2.jpg') }}" 
                         alt="Brigada de Salud Bucal" 
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-brand-50 text-brand-700 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Salud Dental</span>
                        <span class="text-slate-400 font-semibold">Hace 2 días</span>
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
                <span class="text-slate-500"><i class="fa-solid fa-user-pen mr-1"></i> Coord. Odontología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 2 (Local) -->
        <article class="news-item bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-cat="alerta">
            <div>
                <div class="h-52 overflow-hidden">
                    <img src="{{ asset('img/noticias/noticia3.jpg') }}" 
                         alt="Alerta por Dengue" 
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-red-50 text-red-700 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Alerta Sanitaria</span>
                        <span class="text-slate-400 font-semibold">Hace 4 días</span>
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
                <span class="text-slate-500"><i class="fa-solid fa-user-pen mr-1"></i> Epidemiología</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

        <!-- Artículo 3 (Local) -->
        <article class="news-item bg-white rounded-2xl overflow-hidden shadow-sm border-2 border-slate-200 hover:shadow-2xl transition flex flex-col justify-between group" data-cat="jornadas">
            <div>
                <div class="h-52 overflow-hidden">
                    <img src="{{ asset('img/noticias/noticia4.jpg') }}" 
                         alt="Módulos de Salud Visual" 
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-center text-xs mb-2">
                        <span class="bg-emerald-50 text-emerald-700 font-black px-2.5 py-0.5 rounded-full uppercase text-[11px]">Jornada Especial</span>
                        <span class="text-slate-400 font-semibold">Hace 1 semana</span>
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
                <span class="text-slate-500"><i class="fa-solid fa-user-pen mr-1"></i> DIF y Salud</span>
                <span class="text-brand-600">Boletín Oficial</span>
            </div>
        </article>

    </div>

</div>

<!-- SCRIPT DE FILTRADO DE NOTICIAS -->
<script>
    function filterNews(cat) {
        const items = document.querySelectorAll('.news-item');
        const pills = document.querySelectorAll('.news-pill');

        pills.forEach(p => {
            p.classList.remove('bg-brand-600', 'text-white');
            p.classList.add('bg-slate-100', 'text-slate-800');
        });

        // Activar el botón presionado
        event.target.classList.add('bg-brand-600', 'text-white');
        event.target.classList.remove('bg-slate-100', 'text-slate-800');

        items.forEach(item => {
            const itemCat = item.getAttribute('data-cat');
            if (!cat || itemCat === cat) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });
    }
</script>
@endsection