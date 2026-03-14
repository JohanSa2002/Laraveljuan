<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ route('events.index') }}" class="p-2 bg-white rounded-xl text-gray-400 hover:text-cyber-purple-600 transition-colors shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tighter">
                {{ __('Detalles del Evento') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Columna Principal -->
                <div class="lg:col-span-2 space-y-8">
                    <div class="glass-card rounded-[3rem] overflow-hidden bg-white">
                        <!-- Banner de Imagen -->
                        <div class="h-64 relative bg-gray-100">
                            @if($event->image_path)
                                <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->name }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-black/20"></div>
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-cyber-purple-500/20 to-indigo-600/20"></div>
                            @endif
                        </div>

                        <div class="p-10 -mt-12 relative z-10">
                            <div class="flex justify-between items-start mb-8">
                                <h3 class="text-4xl font-black text-gray-900 uppercase tracking-tighter leading-tight">
                                    {{ $event->name }}
                                </h3>
                            @php
                                $isClosed = \Carbon\Carbon::now()->isAfter($event->end_date);
                            @endphp
                            <div class="px-6 py-2 {{ $isClosed ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }} rounded-full text-sm font-black uppercase tracking-widest">
                                {{ $isClosed ? 'Convocatoria Cerrada' : 'Convocatoria Abierta' }}
                            </div>
                        </div>

                        <div class="prose prose-purple max-w-none text-gray-600 font-medium text-lg leading-relaxed mb-10">
                            {{ $event->description }}
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 bg-gray-50 rounded-[2rem] p-8">
                            <div>
                                <h5 class="font-black uppercase tracking-widest text-xs text-cyber-purple-600 mb-4">Fechas Importantes</h5>
                                <div class="space-y-4">
                                    <div class="flex items-center text-gray-700">
                                        <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center mr-4 text-cyber-purple-500">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Inicio</p>
                                            <p class="font-black">{{ $event->start_date->format('d \d\e F, Y') }}</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <div class="w-10 h-10 bg-white rounded-xl shadow-sm flex items-center justify-center mr-4 text-red-500">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">Cierre</p>
                                            <p class="font-black">{{ $event->end_date->format('d \d\e F, Y') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h5 class="font-black uppercase tracking-widest text-xs text-cyber-purple-600 mb-4">Requisitos</h5>
                                <ul class="space-y-2 text-sm text-gray-600 font-bold">
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        PDF en formato oficial
                                    </li>
                                    <li class="flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Máximo 10 páginas
                                    </li>
                                </ul>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Categorías Disponibles -->
                    <div class="glass-card rounded-[3rem] p-10 bg-white">
                        <h4 class="text-2xl font-black text-gray-900 uppercase tracking-tighter mb-8">Categorías de Participación</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach($event->categories as $category)
                                <div class="px-6 py-4 border-2 border-gray-50 rounded-[2rem] flex items-center group hover:bg-cyber-purple-50 hover:border-cyber-purple-100 transition-all duration-300">
                                    <div class="w-10 h-10 bg-cyber-purple-100 text-cyber-purple-600 rounded-2xl flex items-center justify-center mr-4 group-hover:bg-cyber-purple-600 group-hover:text-white transition-all">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                    </div>
                                    <span class="font-black text-gray-800 uppercase tracking-tight">{{ $category }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Sidebar de Acción -->
                <div class="space-y-8">
                    <div class="glass-card rounded-[3rem] p-10 bg-cyber-dark-900 text-white sticky top-8 text-center">
                        <div class="w-20 h-20 bg-cyber-purple-500/20 text-cyber-purple-400 rounded-[2rem] flex items-center justify-center mx-auto mb-6">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <h4 class="text-2xl font-black uppercase tracking-tighter mb-4">¿Listo para participar?</h4>
                        <p class="text-gray-400 text-sm mb-8 font-medium">Sube tu artículo científico y selecciona este evento en el formulario de envío para inscribirte directamente.</p>
                        
                        @auth
                            @if($isClosed)
                                 <button disabled class="w-full py-5 bg-gray-700 text-gray-400 rounded-[2rem] font-black uppercase tracking-widest text-xs cursor-not-allowed">
                                    Convocatoria Finalizada
                                </button>
                            @else
                                <a href="{{ route('articles.create', ['event_id' => $event->id]) }}" class="block w-full py-5 bg-cyber-purple-600 hover:bg-cyber-purple-700 text-white rounded-[2rem] font-black uppercase tracking-widest text-xs shadow-xl shadow-cyber-purple-500/20 transition-all">
                                    Inscribir Artículo Ahora
                                </a>
                            @endif
                        @else
                            <div class="space-y-4">
                                <p class="text-xs text-cyber-purple-400 font-bold uppercase tracking-widest">Requiere inicio de sesión</p>
                                <a href="{{ route('login') }}" class="block w-full py-5 border-2 border-cyber-purple-500/30 hover:border-cyber-purple-500 text-cyber-purple-400 hover:text-white hover:bg-cyber-purple-500 rounded-[2rem] font-black uppercase tracking-widest text-xs transition-all">
                                    Iniciar Sesión para Participar
                                </a>
                            </div>
                        @endauth
                        
                        <p class="mt-6 text-[10px] text-gray-500 uppercase tracking-widest font-black">UTP • INVESTIGACIÓN • 2026</p>
                    </div>

                    @auth
                        @if(!Auth::user()->is_admin)
                            <div class="glass-card rounded-[3rem] p-8 bg-white border border-gray-100 flex items-center gap-4">
                                <div class="w-12 h-12 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center shrink-0">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <p class="text-xs text-gray-500 font-bold">Recuerda que tu artículo debe ser revisado por un asesor seleccionado antes de ser aprobado para el evento.</p>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
