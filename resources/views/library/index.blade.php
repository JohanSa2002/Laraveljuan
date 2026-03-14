<x-app-layout>
    <x-slot name="header">
        {{ __('Librería de Recursos Académicos') }}
    </x-slot>

    <div class="space-y-12 animate-in fade-in slide-in-from-bottom-4 duration-700 pb-20">
        
        @if(Auth::user()->is_admin)
        <!-- Admin Upload Section -->
        <div class="glass-card rounded-[2.5rem] p-8 md:p-10 border-l-8 border-cyber-purple-500 shadow-2xl shadow-cyber-purple-500/10">
            <div class="flex flex-col md:flex-row gap-10 items-start">
                <div class="md:w-1/3">
                    <h3 class="text-2xl font-black text-gray-900 uppercase tracking-tighter">Subir Nuevo Recurso</h3>
                    <p class="text-sm text-gray-500 mt-2 leading-relaxed">Añade plantillas, guías o reglamentos oficiales para que los estudiantes y asesores puedan descargarlos.</p>
                </div>
                
                <form action="{{ route('library.store') }}" method="POST" enctype="multipart/form-data" class="md:w-2/3 grid grid-cols-1 md:grid-cols-2 gap-6">
                    @csrf
                    <div class="md:col-span-2">
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Título del Recurso</label>
                        <input type="text" name="title" required placeholder="Ej: Plantilla de Tesis 2026" 
                            class="w-full bg-gray-50 border-gray-100 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-cyber-purple-500/10 focus:border-cyber-purple-500 transition-all font-medium">
                    </div>

                    <div>
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Categoría</label>
                        <select name="category" required class="w-full bg-gray-50 border-gray-100 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-cyber-purple-500/10 focus:border-cyber-purple-500 transition-all font-medium">
                            <option value="plantilla">Plantilla (Word/LaTeX)</option>
                            <option value="guía">Guía de Formato</option>
                            <option value="reglamento" selected>Reglamento/Ley</option>
                            <option value="otro">Otro Documento</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Archivo (PDF, Docx, etc.)</label>
                        <input type="file" name="file" required class="w-full text-sm text-gray-500 file:mr-4 file:py-3 file:px-6 file:rounded-xl file:border-0 file:text-xs file:font-black file:uppercase file:bg-gray-100 file:text-gray-600 hover:file:bg-gray-200 transition-all">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-widest mb-2">Breve Descripción</label>
                        <textarea name="description" rows="2" class="w-full bg-gray-50 border-gray-100 rounded-2xl px-5 py-3.5 focus:ring-4 focus:ring-cyber-purple-500/10 focus:border-cyber-purple-500 transition-all font-medium" placeholder="Explica brevemente para qué sirve este archivo..."></textarea>
                    </div>

                    <div class="md:col-span-2 text-right">
                        <button type="submit" class="px-10 py-4 bg-gray-900 text-white rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-cyber-purple-600 hover:-translate-y-1 hover:shadow-xl hover:shadow-cyber-purple-500/30 transition-all">
                            Publicar en Librería
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endif

        @if(session('success'))
        <div class="glass-card px-6 py-4 rounded-2xl border-l-4 border-green-500 bg-green-50/50 flex items-center justify-between">
            <span class="text-sm font-bold text-green-700">{{ session('success') }}</span>
            <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
        </div>
        @endif

        <!-- Resource Sections -->
        @foreach(['plantilla' => 'Plantillas Oficiales', 'guía' => 'Guías de Investigación', 'reglamento' => 'Reglamentos y Normativas', 'otro' => 'Otros Documentos'] as $key => $title)
            @if(isset($resources[$key]))
            <section class="space-y-6">
                <div class="flex items-center space-x-4 ml-4">
                    <div class="w-1.5 h-8 bg-cyber-purple-500 rounded-full"></div>
                    <h2 class="text-2xl font-black text-gray-900 uppercase tracking-tighter">{{ $title }}</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($resources[$key] as $resource)
                    <div class="group glass-card p-8 rounded-[2rem] hover:bg-white hover:shadow-2xl hover:shadow-cyber-purple-500/10 transition-all duration-500 border border-transparent hover:border-cyber-purple-100 flex flex-col h-full relative overflow-hidden">
                        
                        <!-- Background decoration -->
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-gray-50 rounded-full group-hover:bg-cyber-purple-50 transition-colors duration-500"></div>

                        <div class="relative z-10 flex-grow">
                            <div class="flex items-start justify-between mb-6">
                                <div class="w-14 h-14 bg-white shadow-inner rounded-2xl flex items-center justify-center text-cyber-purple-500 border border-gray-50 group-hover:border-cyber-purple-200 transition-all duration-500">
                                    @if($key == 'plantilla')
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7v8a2 2 0 002 2h6M8 7V5a2 2 0 012-2h4.586a1 1 0 01.707.293l4.414 4.414a1 1 0 01.293.707V15a2 2 0 01-2 2h-2M8 7H6a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2v-2"/></svg>
                                    @elseif($key == 'guía')
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                    @else
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    @endif
                                </div>
                                
                                @if(Auth::user()->is_admin)
                                <form action="{{ route('library.destroy', $resource) }}" method="POST" onsubmit="return confirm('¿Eliminar este recurso permanentemente?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 text-gray-300 hover:text-rose-500 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                                @endif
                            </div>

                            <h4 class="text-xl font-bold text-gray-900 mb-3 leading-tight group-hover:text-cyber-purple-600 transition-colors">{{ $resource->title }}</h4>
                            <p class="text-sm text-gray-500 leading-relaxed mb-8">{{ $resource->description }}</p>
                        </div>

                        <div class="mt-auto relative z-10 pt-6 border-t border-gray-50 group-hover:border-cyber-purple-50 transition-colors">
                            <a href="{{ asset('storage/' . $resource->file_path) }}" target="_blank"
                                class="flex items-center justify-between w-full px-6 py-4 bg-gray-50 group-hover:bg-cyber-purple-500 text-gray-700 group-hover:text-white rounded-2xl font-bold text-xs uppercase tracking-widest transition-all duration-300">
                                <span>Descargar Documento</span>
                                <svg class="w-4 h-4 translate-x-0 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif
        @endforeach

        @if($resources->isEmpty())
        <div class="flex flex-col items-center justify-center py-32 text-center opacity-30">
            <svg class="w-24 h-24 text-gray-400 mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            <h3 class="text-3xl font-black text-gray-900 uppercase tracking-tighter">Librería Vacía</h3>
            <p class="text-gray-500 mt-2 font-medium italic">No se han publicado guías o reglamentos en esta sección aún.</p>
        </div>
        @endif
    </div>
</x-app-layout>
