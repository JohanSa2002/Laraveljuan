<x-app-layout>
    <x-slot name="header">
        {{ __('Gestión de Artículos Científicos') }}
    </x-slot>

    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
        <!-- Hero Section / Stats -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div
                class="glass-card p-6 rounded-3xl relative overflow-hidden group hover:scale-[1.02] transition-transform duration-300">
                <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                    <svg class="w-20 h-20 text-cyber-purple-600" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
                    </svg>
                </div>
                <div class="text-sm font-medium text-gray-500 uppercase tracking-wider">Total Artículos</div>
                <div class="mt-2 flex items-baseline">
                    <div class="text-4xl font-bold tech-gradient-text">{{ $articles->count() }}</div>
                </div>
                <div class="mt-4 text-xs text-green-600 font-medium flex items-center">
                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 10l7-7m0 0l7 7m-7-7v18" />
                    </svg>
                    Actualizado hoy
                </div>
            </div>

            <div
                class="glass-card p-6 rounded-3xl relative overflow-hidden group hover:scale-[1.02] transition-transform duration-300">
                <div class="text-sm font-medium text-gray-500 uppercase tracking-wider">En Revisión</div>
                <div class="mt-2 flex items-baseline">
                    <div class="text-4xl font-bold text-yellow-600">
                        {{ $articles->where('status', 'revisión')->count() }}</div>
                </div>
                <div class="mt-4 text-xs text-gray-500 font-medium">Requieren tu atención</div>
            </div>

            <div class="glass-card p-6 rounded-3xl flex flex-col justify-center items-center group cursor-pointer border-2 border-dashed border-cyber-purple-200 hover:border-cyber-purple-500 hover:bg-cyber-purple-50/50 transition-all duration-300"
                onclick="window.location.href='{{ route('articles.create') }}'">
                <div
                    class="bg-cyber-purple-500 text-white p-3 rounded-2xl shadow-lg shadow-cyber-purple-500/20 mb-3 group-hover:rotate-12 transition-transform">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </div>
                <span class="font-bold text-cyber-purple-700">Subir Investigación</span>
                <span class="text-xs text-cyber-purple-400 mt-1">Formato PDF permitido</span>
            </div>
        </div>

        <!-- Articles Grid/List -->
        <div class="glass-card rounded-3xl overflow-hidden">
            <div class="p-6 border-b border-white/20 bg-white/30 flex justify-between items-center">
                <h3 class="font-bold text-gray-800 flex items-center space-x-2">
                    <svg class="w-5 h-5 text-cyber-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                    </svg>
                    <span>Explorar Investigaciones</span>
                </h3>
                <div class="flex space-x-2">
                    <button
                        class="p-2 bg-white rounded-lg shadow-sm text-gray-400 hover:text-cyber-purple-500 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50/50 text-left">
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">
                                Investigación</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest hidden md:table-cell">
                                Autores</th>
                            <th
                                class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest hidden lg:table-cell">
                                Año</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Estado</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">
                                Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100/50">
                        @forelse($articles as $article)
                            <tr class="hover:bg-cyber-purple-50/30 transition-colors group">
                                <td class="px-6 py-5">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="h-12 w-10 flex-shrink-0 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 group-hover:bg-cyber-purple-100 group-hover:text-cyber-purple-500 transition-colors border border-gray-200">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                        </div>
                                        <div>
                                            <div
                                                class="font-bold text-gray-800 line-clamp-1 group-hover:text-cyber-purple-600 transition-colors">
                                                {{ $article->title }}</div>
                                            <div class="flex items-center gap-2 mt-1">
                                                <span class="text-xs text-gray-500">{{ $article->career }}</span>
                                                @if($article->event_id)
                                                    <span class="inline-flex items-center px-2 py-0.5 bg-cyber-purple-100 text-cyber-purple-600 rounded text-[9px] font-black uppercase tracking-tighter">
                                                        {{ $article->event->name }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5 hidden md:table-cell">
                                    <div class="text-sm text-gray-600">{{ $article->students }}</div>
                                </td>
                                <td class="px-6 py-5 hidden lg:table-cell">
                                    <span
                                        class="px-3 py-1 bg-gray-100 rounded-full text-xs font-bold text-gray-500">{{ $article->year }}</span>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold 
                                            @if($article->status == 'aprobado') bg-green-100 text-green-700 ring-1 ring-green-200
                                            @elseif($article->status == 'revisión') bg-yellow-100 text-yellow-700 ring-1 ring-yellow-200
                                            @else bg-red-100 text-red-700 ring-1 ring-red-200 @endif">
                                        <span class="w-1.5 h-1.5 rounded-full mr-2 
                                                @if($article->status == 'aprobado') bg-green-500 
                                                @elseif($article->status == 'revisión') bg-yellow-500 
                                                @else bg-red-500 @endif"></span>
                                        {{ ucfirst($article->status) }}
                                    </span>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    <div class="flex justify-end items-center space-x-2">
                                        <a href="{{ route('articles.show', $article) }}"
                                            class="p-2 hover:bg-white rounded-xl text-gray-400 hover:text-cyber-purple-500 transition-all hover:shadow-sm"
                                            title="Ver Detalles">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ asset('storage/' . $article->pdf_path) }}" target="_blank"
                                            class="p-2 hover:bg-white rounded-xl text-gray-400 hover:text-red-500 transition-all hover:shadow-sm"
                                            title="Descargar PDF">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="bg-gray-50 p-4 rounded-full mb-4">
                                            <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                            </svg>
                                        </div>
                                        <span class="text-gray-400 font-medium whitespace-nowrap">No hay investigaciones
                                            registradas en esta sección.</span>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>