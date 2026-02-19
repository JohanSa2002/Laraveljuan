<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UTP | Sistema de Evaluación Académica</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Space+Grotesk:wght@300;500;700&display=swap"
        rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="font-sans antialiased cyber-gradient-bg min-h-screen overflow-x-hidden selection:bg-cyber-purple-500 selection:text-white">
    <!-- Modern Background Pattern -->
    <div class="fixed inset-0 z-0 pointer-events-none opacity-50">
        <div
            class="absolute top-[10%] left-[10%] w-72 h-72 bg-cyber-purple-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob">
        </div>
        <div
            class="absolute top-[20%] right-[10%] w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-2000">
        </div>
        <div
            class="absolute -bottom-8 left-20 w-80 h-80 bg-indigo-300 rounded-full mix-blend-multiply filter blur-3xl animate-blob animation-delay-4000">
        </div>
    </div>

    <div class="relative z-10 flex flex-col min-h-screen">
        <!-- Navigation -->
        <nav class="max-w-7xl mx-auto w-full px-6 py-8 flex justify-between items-center">
            <div class="flex items-center space-x-2 group">
                <div
                    class="bg-cyber-purple-500 p-2.5 rounded-xl shadow-lg shadow-cyber-purple-500/20 group-hover:rotate-6 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <span class="text-2xl font-black text-gray-900 tracking-tighter">UTP<span
                        class="text-cyber-purple-500">_ACADÉMICO</span></span>
            </div>

            <div class="flex items-center space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-6 py-2.5 bg-gray-900 text-white rounded-xl text-sm font-bold shadow-lg shadow-gray-900/10 hover:-translate-y-0.5 transition-all">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-sm font-bold text-gray-600 hover:text-cyber-purple-600 transition-colors">Iniciar
                            Sesión</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-6 py-2.5 bg-cyber-purple-500 text-white rounded-xl text-sm font-bold shadow-lg shadow-cyber-purple-500/20 hover:bg-cyber-purple-600 hover:-translate-y-0.5 transition-all">Unirse
                                Ahora</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>

        <!-- Hero Section -->
        <main class="flex-grow flex items-center">
            <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center py-12">
                <div class="text-center lg:text-left space-y-8 animate-in fade-in slide-in-from-left-8 duration-1000">
                    <div
                        class="inline-flex items-center space-x-2 px-4 py-2 bg-cyber-purple-100/50 backdrop-blur-sm rounded-full border border-cyber-purple-200">
                        <span class="flex h-2 w-2 rounded-full bg-cyber-purple-500 animate-pulse"></span>
                        <span
                            class="text-xs font-black text-cyber-purple-700 uppercase tracking-widest leading-none">Nuevas
                            Fronteras 2026</span>
                    </div>

                    <h1 class="text-6xl md:text-8xl font-black text-gray-900 leading-[0.9] tracking-tighter">
                        La ciencia es el <span class="tech-gradient-text">nuevo arte.</span>
                    </h1>

                    <p class="text-lg text-gray-500 max-w-xl leading-relaxed">
                        Gestiona, revisa y publica investigaciones científicas con una interfaz diseñada para la
                        vanguardia académica. Potenciando la colaboración entre mentes brillantes.
                    </p>

                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4">
                        @guest
                            <a href="{{ route('register') }}"
                                class="px-10 py-5 bg-cyber-purple-500 text-white rounded-2xl font-bold shadow-2xl shadow-cyber-purple-500/30 hover:bg-cyber-purple-600 hover:-translate-y-1 transition-all duration-300 text-lg">
                                Iniciar Investigación
                            </a>
                            <div class="flex -space-x-3">
                                @for($i = 1; $i <= 4; $i++)
                                    <div
                                        class="w-10 h-10 rounded-full border-2 border-white bg-gray-200 flex items-center justify-center overflow-hidden">
                                        <div
                                            class="bg-gradient-to-tr from-cyber-purple-{{ 400 + ($i * 100) }} to-indigo-500 w-full h-full opacity-50">
                                        </div>
                                    </div>
                                @endfor
                                <div
                                    class="w-10 h-10 rounded-full border-2 border-white bg-gray-900 flex items-center justify-center text-[10px] text-white font-bold">
                                    +2K</div>
                            </div>
                        @else
                            <a href="{{ route('articles.index') }}"
                                class="px-10 py-5 bg-gray-900 text-white rounded-2xl font-bold shadow-2xl shadow-gray-900/20 hover:bg-cyber-purple-600 hover:-translate-y-1 transition-all duration-300 text-lg">
                                Continuar Mis Trabajos
                            </a>
                        @endguest
                    </div>
                </div>

                <!-- Interactive Visual Section -->
                <div class="relative hidden lg:block animate-in fade-in zoom-in-95 duration-1000 delay-300">
                    <div class="glass-card rounded-[3rem] p-4 relative overflow-hidden group">
                        <div
                            class="bg-gray-900 rounded-[2.5rem] aspect-square flex items-center justify-center p-12 overflow-hidden">
                            <svg class="w-full h-full text-cyber-purple-500 opacity-20 absolute -rotate-12 scale-150"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                            <div class="relative z-10 space-y-4 text-center">
                                <span
                                    class="bg-cyber-purple-500/20 text-cyber-purple-400 px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest">Estado
                                    del Sistema</span>
                                <h4 class="text-3xl font-bold text-white">Red Neuronal Activa</h4>
                                <div class="grid grid-cols-2 gap-4 mt-8">
                                    @foreach(['Velocidad', 'Seguridad', 'Colaboración', 'IA'] as $tag)
                                        <div
                                            class="bg-white/5 border border-white/10 rounded-xl p-4 hover:bg-white/10 transition-colors">
                                            <div class="text-white font-bold text-xs">{{ $tag }}</div>
                                            <div class="h-1 bg-white/10 rounded-full mt-2 overflow-hidden">
                                                <div class="h-full bg-cyber-purple-500 w-[70%]"
                                                    style="width: {{ rand(60, 95) }}%"></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Decorative Floating Elements -->
                    <div
                        class="absolute -top-6 -right-6 w-24 h-24 bg-white/80 backdrop-blur-xl rounded-full shadow-xl flex items-center justify-center animate-bounce duration-[3s]">
                        <span class="text-3xl">🔬</span>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer
            class="py-12 px-6 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center bg-white/30 backdrop-blur-md">
            <span class="text-sm font-medium text-gray-500">&copy; {{ date('Y') }} Sistema de Evaluación y Registro
                Académico. Universidad
                Tecnológica de Panamá.</span>
            <div class="flex space-x-6 mt-6 md:mt-0 text-gray-400">
                <a href="#" class="hover:text-cyber-purple-500 transition-colors">Privacidad</a>
                <a href="#" class="hover:text-cyber-purple-500 transition-colors">Terminos</a>
                <a href="#" class="hover:text-cyber-purple-500 transition-colors">Soporte</a>
            </div>
        </footer>
    </div>
</body>

</html>