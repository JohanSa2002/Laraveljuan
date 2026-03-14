<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center space-x-4">
                <span class="h-10 w-1.5 bg-cyber-purple-500 rounded-full"></span>
                <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tighter tech-gradient-text">
                    {{ __('Eventos y Concursos') }}
                </h2>
            </div>
            
            @if(Auth::user()->is_admin)
                <a href="{{ route('admin.events.create') }}" 
                    class="px-6 py-3 bg-cyber-purple-600 text-white rounded-2xl font-bold hover:bg-cyber-purple-700 transition-all shadow-lg shadow-cyber-purple-500/20 flex items-center gap-2 text-sm justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Nuevo Evento
                </a>
            @endif
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero de Eventos -->
            <div class="glass-card rounded-[3rem] p-12 mb-12 relative overflow-hidden bg-cyber-dark-900 text-white">
                <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-cyber-purple-500/20 rounded-full blur-3xl"></div>
                <div class="relative z-10">
                    <h3 class="text-4xl md:text-6xl font-black tracking-tighter uppercase mb-4">
                        Competencia <span class="tech-gradient-text">Científica</span>
                    </h3>
                    <p class="text-xl text-gray-400 max-w-2xl mb-8">
                        Participa en los eventos más importantes de la UTP. Presenta tus investigaciones, compite en categorías especializadas y obtén reconocimiento académico.
                    </p>
                </div>
            </div>

            @if($events->isEmpty())
                <div class="text-center py-20 glass-card rounded-[3rem]">
                    <div class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h4 class="text-2xl font-bold text-gray-900">No hay eventos activos</h4>
                    <p class="text-gray-500 mt-2">Vuelve pronto para ver nuevas convocatorias.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($events as $event)
                        @php
                            $isClosed = \Carbon\Carbon::now()->isAfter($event->end_date);
                        @endphp
                        <div class="glass-card rounded-[2.5rem] overflow-hidden group hover:shadow-2xl hover:shadow-cyber-purple-500/10 transition-all duration-500 border border-transparent hover:border-cyber-purple-100 flex flex-col h-full bg-white">
                            <!-- Header de Imagen con Acciones Overlay -->
                            <div class="h-48 relative overflow-hidden bg-gray-100">
                                @if($event->image_path)
                                    <img src="{{ asset('storage/' . $event->image_path) }}" alt="{{ $event->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-gradient-to-br from-cyber-purple-500/20 to-indigo-600/20 flex items-center justify-center">
                                        <svg class="w-16 h-16 text-cyber-purple-300 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif

                                <!-- Status Badge Overlay -->
                                <div class="absolute top-4 left-4 z-10 px-4 py-1.5 {{ $isClosed ? 'bg-red-500/90' : 'bg-green-500/90' }} backdrop-blur-md text-white rounded-full text-[10px] font-black uppercase tracking-widest shadow-lg">
                                    {{ $isClosed ? 'Cerrado' : 'Abierto' }}
                                </div>

                                @if(Auth::user()->is_admin)
                                    <div class="absolute top-4 right-4 z-10 flex gap-2">
                                        <a href="{{ route('admin.events.edit', $event) }}" class="p-2 bg-white/90 backdrop-blur rounded-xl text-gray-400 hover:text-cyber-purple-600 transition-colors shadow-sm">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.events.destroy', $event) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este evento?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 bg-white/90 backdrop-blur rounded-xl text-gray-400 hover:text-red-600 transition-colors shadow-sm">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </div>

                            <div class="p-8 flex-grow">
                                <h4 class="text-2xl font-black text-gray-900 uppercase tracking-tighter mb-3 group-hover:text-cyber-purple-600 transition-colors leading-tight">
                                    {{ $event->name }}
                                </h4>
                                <p class="text-gray-500 text-sm mb-6 line-clamp-3 font-medium">
                                    {{ $event->description }}
                                </p>

                                <div class="space-y-3 mb-8">
                                    <div class="flex items-center text-sm text-gray-600 font-bold">
                                        <svg class="w-5 h-5 mr-3 text-cyber-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        {{ $event->start_date->format('d M') }} - {{ $event->end_date->format('d M, Y') }}
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600 font-bold">
                                        <svg class="w-5 h-5 mr-3 text-cyber-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                        {{ count($event->categories) }} Categorías
                                    </div>
                                </div>
                            </div>

                            <a href="{{ route('events.show', $event) }}" 
                                class="w-full py-5 bg-gray-50 group-hover:bg-cyber-purple-600 group-hover:text-white text-center font-black uppercase tracking-widest text-xs transition-all duration-500 flex items-center justify-center gap-2">
                                {{ Auth::user()->is_admin ? 'Ver Detalles' : 'Ver Detalles e Inscribirse' }}
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
