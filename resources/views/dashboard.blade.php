<x-app-layout>
    <x-slot name="header">
        {{ __('Panel de Control') }}
    </x-slot>

    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-1000">
        <!-- Welcome Section -->
        <div class="glass-card rounded-[2.5rem] p-8 md:p-12 relative overflow-hidden">
            <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-cyber-purple-500/10 rounded-full blur-3xl">
            </div>
            <div class="relative z-10 flex flex-col md:flex-row justify-between items-center">
                <div class="text-center md:text-left">
                    <h2 class="text-3xl md:text-5xl font-bold text-gray-900 leading-tight">
                        ¡Hola de nuevo, <span class="tech-gradient-text">{{ Auth::user()->name }}</span>!
                    </h2>
                    <p class="mt-4 text-lg text-gray-500 max-w-xl">
                        Bienvenido a tu ecosistema de investigación. Hoy es un excelente día para avanzar en la frontera
                        del conocimiento científico.
                    </p>
                    <div class="mt-8 flex flex-wrap justify-center md:justify-start gap-4">
                        <a href="{{ route('articles.index') }}"
                            class="px-8 py-4 bg-cyber-purple-500 text-white rounded-2xl font-bold shadow-lg shadow-cyber-purple-500/30 hover:bg-cyber-purple-600 hover:-translate-y-1 transition-all duration-300">
                            Explorar Artículos
                        </a>
                        <button
                            class="px-8 py-4 bg-white/50 backdrop-blur-sm border border-gray-100 text-gray-700 rounded-2xl font-bold hover:bg-white hover:shadow-md transition-all duration-300">
                            Ver Tutorial
                        </button>
                    </div>
                </div>
                <div class="mt-12 md:mt-0 relative">
                    <div
                        class="w-64 h-64 bg-gradient-to-tr from-cyber-purple-500 to-indigo-600 rounded-[3rem] rotate-12 shadow-2xl flex items-center justify-center">
                        <svg class="w-32 h-32 text-white -rotate-12" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.989-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <!-- Decorative element -->
                    <div
                        class="absolute -bottom-4 -left-4 w-20 h-20 bg-yellow-400 rounded-2xl animate-bounce shadow-lg flex items-center justify-center">
                        <span class="text-2xl">✨</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Access Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="glass-card p-6 rounded-3xl hover:bg-cyber-purple-50/50 transition-colors cursor-pointer group">
                <div
                    class="w-12 h-12 bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <h4 class="font-bold text-gray-800">Perfil</h4>
                <p class="text-xs text-gray-500 mt-1">Personaliza tu identidad académica</p>
            </div>

            <div class="glass-card p-6 rounded-3xl hover:bg-cyber-purple-50/50 transition-colors cursor-pointer group"
                onclick="window.location.href='{{ route('articles.index') }}'">
                <div
                    class="w-12 h-12 bg-purple-100 text-cyber-purple-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <h4 class="font-bold text-gray-800">Mis Trabajos</h4>
                <p class="text-xs text-gray-500 mt-1">Gestiona tus investigaciones</p>
            </div>

            <div class="glass-card p-6 rounded-3xl hover:bg-cyber-purple-50/50 transition-colors cursor-pointer group">
                <div
                    class="w-12 h-12 bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <h4 class="font-bold text-gray-800">Analytics</h4>
                <p class="text-xs text-gray-500 mt-1">Métricas de impacto e interés</p>
            </div>

            <div class="glass-card p-6 rounded-3xl hover:bg-cyber-purple-50/50 transition-colors cursor-pointer group">
                <div
                    class="w-12 h-12 bg-pink-100 text-pink-600 rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h4 class="font-bold text-gray-800">Librería</h4>
                <p class="text-xs text-gray-500 mt-1">Documentación y guías</p>
            </div>
        </div>

        <!-- Banner Information -->
        <div class="bg-cyber-dark-900 rounded-[2rem] p-8 text-white relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-cyber-purple-900/50 to-transparent"></div>
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between">
                <div>
                    <h4 class="text-xl font-bold flex items-center">
                        <span class="w-2 h-2 bg-green-400 rounded-full mr-3 animate-pulse"></span>
                        Buscador Inteligente Activo
                    </h4>
                    <p class="text-gray-400 mt-2 text-sm">Utiliza la barra superior para encontrar perfiles y
                        colaboraciones en toda la red universitaria.</p>
                </div>
                <div class="mt-6 md:mt-0">
                    <button
                        class="px-6 py-3 border border-white/20 rounded-xl hover:bg-white/10 transition-colors text-sm font-medium">
                        Ver Guía de Búsqueda
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>