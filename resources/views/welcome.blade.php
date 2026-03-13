<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UTP | Trabajos de Graduación y Tesis</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gray-50 text-gray-800 min-h-screen overflow-x-hidden selection:bg-purple-900 selection:text-white">
    <!-- Navbar -->
    <nav class="bg-purple-900 border-b border-purple-800 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex items-center space-x-3">
                    <!-- Fake UTP Logo icon -->
                    <div class="bg-white p-2 rounded-lg">
                        <svg class="w-8 h-8 text-purple-900" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zm0 7l-10 5 10 5 10-5-10-5zm0 7l-10 5 10 5 10-5-10-5z" />
                        </svg>
                    </div>
                    <div>
                        <span class="block text-2xl font-bold text-white leading-none tracking-tight">UTP</span>
                        <span class="block text-xs font-medium text-purple-200 uppercase tracking-widest mt-1">Investigación</span>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="px-5 py-2.5 bg-white text-purple-900 rounded-lg text-sm font-bold shadow hover:bg-gray-100 transition-colors">Panel Principal</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="text-sm font-semibold text-purple-100 hover:text-white transition-colors">Iniciar Sesión</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="px-5 py-2.5 bg-fuchsia-600 text-white rounded-lg text-sm font-bold shadow shadow-fuchsia-900/50 hover:bg-fuchsia-500 transition-colors">Crear Cuenta</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="relative bg-white border-b border-gray-200 uppercase overflow-hidden">
        <!-- Abstract background pattern academic -->
        <div class="absolute inset-0 z-0 opacity-[0.03] pointer-events-none" style="background-image: radial-gradient(circle at 2px 2px, #4c1d95 1px, transparent 0); background-size: 32px 32px;"></div>
        
        <div class="max-w-7xl mx-auto px-6 py-20 lg:py-28 grid grid-cols-1 lg:grid-cols-2 gap-12 items-center relative z-10">
            <div class="space-y-8 animate-in fade-in slide-in-from-bottom-8 duration-700">
                <div class="inline-flex items-center space-x-2 px-3 py-1 bg-purple-100 rounded-full border border-purple-200">
                    <span class="flex h-2 w-2 rounded-full bg-purple-600 animate-pulse"></span>
                    <span class="text-xs font-bold text-purple-800 tracking-wider">UNIVERSIDAD TECNOLÓGICA DE PANAMÁ</span>
                </div>

                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold text-gray-900 leading-[1.1] tracking-tight font-serif" style="font-family: 'Playfair Display', serif;">
                    Descubre la <br><span class="text-purple-900">Excelencia</span> Académica.
                </h1>

                <p class="text-lg text-gray-600 max-w-xl leading-relaxed normal-case">
                    El repositorio central de tesis y trabajos de grado de la UTP. Explora las investigaciones más destacadas contribuyendo al desarrollo científico y tecnológico de Panamá.
                </p>

                <div class="flex flex-wrap gap-4 pt-4 normal-case">
                    <a href="#tesis-recientes"
                        class="px-8 py-4 bg-purple-900 text-white rounded-lg font-bold shadow-lg shadow-purple-900/30 hover:bg-purple-800 hover:-translate-y-0.5 transition-all">
                        Explorar Investigaciones
                    </a>
                </div>
            </div>

            <!-- University Image/Graphic -->
            <div class="relative hidden lg:block animate-in fade-in zoom-in-95 duration-1000">
                <div class="relative rounded-2xl overflow-hidden shadow-2xl shadow-purple-900/10 border border-gray-100 bg-white p-2">
                    <div class="rounded-xl overflow-hidden aspect-[4/3] bg-gray-100 relative group">
                        <!-- We use an inspirational building or tech image from unsplash -->
                        <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?q=80&w=1200&auto=format&fit=crop" alt="Campus Universitario" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/80 to-transparent flex items-end p-8">
                            <div>
                                <h3 class="text-white font-bold text-2xl normal-case">Innovación y Desarrollo</h3>
                                <p class="text-purple-100 text-sm mt-2 normal-case">Forjando el futuro tecnológico.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Decorative Elements -->
                <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-fuchsia-100 rounded-full mix-blend-multiply filter blur-2xl animate-pulse"></div>
                <div class="absolute -top-6 -right-6 w-32 h-32 bg-purple-200 rounded-full mix-blend-multiply filter blur-2xl animate-pulse delay-1000"></div>
            </div>
        </div>
    </main>

    <!-- Carousel Section (Approved Theses) -->
    <section id="tesis-recientes" class="py-24 bg-gray-50 relative">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-purple-900 font-serif" style="font-family: 'Playfair Display', serif;">Últimas Tesis y Trabajos de Grado</h2>
                <p class="mt-4 text-gray-500 max-w-2xl mx-auto">Explora los proyectos de investigación más recientes aprobados por la academia de la Universidad Tecnológica.</p>
            </div>

            @if($publishedArticles->count() > 0)
                <div x-data="{ 
                        activeSlide: 0, 
                        totalSlides: {{ $publishedArticles->count() }},
                        next() { this.activeSlide = (this.activeSlide + 1) % this.totalSlides; },
                        prev() { this.activeSlide = (this.activeSlide - 1 + this.totalSlides) % this.totalSlides; },
                        init() {
                            if(this.totalSlides > 1) {
                                setInterval(() => { this.next() }, 6000);
                            }
                        }
                    }" 
                    class="relative max-w-5xl mx-auto">
                    
                    <!-- Carousel Wrapper -->
                    <div class="overflow-hidden relative rounded-2xl shadow-xl bg-white border border-gray-100">
                        <div class="flex transition-transform duration-500 ease-in-out" :style="'transform: translateX(-' + (activeSlide * 100) + '%)'">
                            @foreach($publishedArticles as $article)
                                <div class="w-full flex-shrink-0 relative">
                                    <div class="grid grid-cols-1 md:grid-cols-5 gap-0">
                                        <!-- Info Side -->
                                        <div class="md:col-span-3 p-10 md:p-14 flex flex-col justify-center">
                                            <div class="flex items-center space-x-2 mb-6">
                                                <span class="bg-fuchsia-100 text-fuchsia-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                                                    {{ $article->career ?? 'Investigación' }}
                                                </span>
                                                <span class="text-sm font-medium text-gray-400">&bull; {{ $article->year ?? date('Y') }}</span>
                                            </div>
                                            <h3 class="text-2xl md:text-3xl font-bold text-gray-900 leading-tight font-serif mb-4" style="font-family: 'Playfair Display', serif;">
                                                {{ $article->title }}
                                            </h3>
                                            
                                            <div class="mt-6 flex items-center bg-gray-50 rounded-lg p-4 border border-gray-100">
                                                <div class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center text-purple-700 font-bold text-xl mr-4 flex-shrink-0">
                                                    {{ substr($article->student->name ?? 'Estudiante', 0, 1) }}
                                                </div>
                                                <div>
                                                    <p class="text-sm text-gray-500">Autor/es</p>
                                                    <p class="font-bold text-gray-900">{{ $article->student->name ?? 'Estudiante no registrado' }}</p>
                                                    @if($article->students && $article->students != $article->student->name)
                                                        <p class="text-xs text-gray-500 mt-0.5">Y otros colaboradores...</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="mt-8">
                                                <a href="{{ route('profile.public.show', $article->student->id ?? 1) }}" class="inline-flex items-center font-bold text-purple-700 hover:text-fuchsia-600 transition-colors group">
                                                    Ver Perfil del Autor
                                                    <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                                </a>
                                            </div>
                                        </div>
                                        
                                        <!-- Design/Pattern Side -->
                                        <div class="hidden md:flex md:col-span-2 bg-purple-900 relative overflow-hidden items-center justify-center p-8">
                                            <div class="absolute inset-0 opacity-20" style="background-image: repeating-linear-gradient(45deg, #A80A81 25%, transparent 25%, transparent 75%, #A80A81 75%, #A80A81), repeating-linear-gradient(45deg, #A80A81 25%, #660066 25%, #660066 75%, #A80A81 75%, #A80A81); background-position: 0 0, 10px 10px; background-size: 20px 20px;"></div>
                                            <!-- Fake PDF Document visual -->
                                            <div class="bg-white w-full max-w-[200px] aspect-[1/1.4] rounded shadow-2xl relative z-10 flex flex-col p-4">
                                                <div class="w-full h-2 bg-gray-200 rounded mb-4"></div>
                                                <div class="w-3/4 h-2 bg-gray-200 rounded mb-2"></div>
                                                <div class="w-full h-2 bg-gray-200 rounded mb-2"></div>
                                                <div class="w-5/6 h-2 bg-gray-200 rounded mb-8"></div>
                                                
                                                <div class="w-10 h-10 border-4 border-fuchsia-500 rounded-full mx-auto mt-auto opacity-50"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Navigation Controls -->
                    @if($publishedArticles->count() > 1)
                        <button @click="prev()" class="absolute -left-4 md:-left-6 top-1/2 -translate-y-1/2 w-12 h-12 bg-white rounded-full shadow-lg border border-gray-100 flex items-center justify-center text-purple-900 hover:bg-purple-50 transition-colors z-20 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button @click="next()" class="absolute -right-4 md:-right-6 top-1/2 -translate-y-1/2 w-12 h-12 bg-white rounded-full shadow-lg border border-gray-100 flex items-center justify-center text-purple-900 hover:bg-purple-50 transition-colors z-20 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>

                        <!-- Dots -->
                        <div class="flex justify-center mt-8 space-x-2">
                            <template x-for="(slide, index) in totalSlides" :key="index">
                                <button @click="activeSlide = index" 
                                    :class="{'w-8 bg-purple-900': activeSlide === index, 'w-2 bg-purple-300': activeSlide !== index}" 
                                    class="h-2 rounded-full transition-all duration-300 focus:outline-none"></button>
                            </template>
                        </div>
                    @endif
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white max-w-3xl mx-auto rounded-2xl p-12 text-center shadow-sm border border-gray-100">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Aún no hay trabajos publicados</h3>
                    <p class="text-gray-500">Las investigaciones aprobadas aparecerán aquí para que la comunidad pueda consultarlas.</p>
                </div>
            @endif
        </div>
    </section>

    <!-- News & Announcements (Static placeholder for now, admin editable concept) -->
    <section class="py-20 bg-white border-t border-gray-200">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 font-serif" style="font-family: 'Playfair Display', serif;">Noticias y Avisos</h2>
                    <p class="mt-2 text-gray-500">Información relevante de la Secretaría General y Vida Universitaria.</p>
                </div>
                <a href="#" class="hidden hover:underline text-purple-700 font-bold text-sm md:block">Ver todos los avisos &rarr;</a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="group cursor-pointer">
                    <div class="bg-gray-100 aspect-video rounded-xl overflow-hidden mb-4 relative">
                        <!-- Image placeholder -->
                        <img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Noticia 1">
                        <div class="absolute inset-0 bg-black bg-opacity-10 group-hover:bg-opacity-0 transition-all"></div>
                        <div class="absolute top-4 left-4 bg-fuchsia-600 text-white text-xs font-bold px-3 py-1 rounded">Academia</div>
                    </div>
                    <p class="text-sm font-bold text-purple-700 mb-2">12 de Octubre, 2026</p>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-700 transition-colors line-clamp-2">Período de Recepción de Tesis para la Primera Graduación 2027</h3>
                </div>

                <!-- Card 2 -->
                <div class="group cursor-pointer">
                    <div class="bg-gray-100 aspect-video rounded-xl overflow-hidden mb-4 relative">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Noticia 2">
                        <div class="absolute inset-0 bg-black bg-opacity-10 group-hover:bg-opacity-0 transition-all"></div>
                        <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded">Aviso</div>
                    </div>
                    <p class="text-sm font-bold text-purple-700 mb-2">08 de Octubre, 2026</p>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-700 transition-colors line-clamp-2">Nuevos Lineamientos para las Revisiones de Jurado</h3>
                </div>

                <!-- Card 3 -->
                <div class="group cursor-pointer">
                    <div class="bg-gray-100 aspect-video rounded-xl overflow-hidden mb-4 relative">
                        <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" alt="Noticia 3">
                        <div class="absolute inset-0 bg-black bg-opacity-10 group-hover:bg-opacity-0 transition-all"></div>
                        <div class="absolute top-4 left-4 bg-purple-900 text-white text-xs font-bold px-3 py-1 rounded">Investigación</div>
                    </div>
                    <p class="text-sm font-bold text-purple-700 mb-2">02 de Octubre, 2026</p>
                    <h3 class="text-xl font-bold text-gray-900 group-hover:text-purple-700 transition-colors line-clamp-2">Publicación del Journal de Ciencias y Tecnologías Aplicadas</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 border-t-4 border-fuchsia-600">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="col-span-1 md:col-span-2">
                <span class="text-2xl font-bold tracking-tight mb-4 block">UTP<span class="text-purple-400">_Investigación</span></span>
                <p class="text-gray-400 max-w-sm text-sm">
                    Plataforma oficial para la gestión, revisión y publicación de trabajos de grado de la Universidad Tecnológica de Panamá.
                </p>
            </div>
            <div>
                <h4 class="font-bold mb-4 text-gray-200">Enlaces Rápidos</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors">Portal UTP</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Biblioteca Institucional</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Formatos de Tesis</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold mb-4 text-gray-200">Soporte</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors">Mesa de Ayuda</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Preguntas Frecuentes</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Contacto</a></li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 mt-12 pt-8 border-t border-gray-800 text-sm text-gray-500 flex flex-col md:flex-row justify-between items-center">
            <p>&copy; {{ date('Y') }} Universidad Tecnológica de Panamá. Todos los derechos reservados.</p>
            <p class="mt-2 md:mt-0">Vía Simón Bolívar (Transístmica) - Campus Víctor Levi Sasso</p>
        </div>
    </footer>
</body>

</html>