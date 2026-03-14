<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <span class="h-10 w-1.5 bg-cyber-purple-500 rounded-full"></span>
            <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tighter tech-gradient-text">
                {{ __('Gestión Global') }}
            </h2>
        </div>
    </x-slot>

    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
        <!-- Search & Global Stats -->
        <div class="glass-card rounded-[2rem] p-8">
            <div class="flex flex-col lg:flex-row lg:items-end justify-between gap-6">
                <div class="flex-grow max-w-2xl">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Filtro Maestro de Artículos</h3>
                    <form method="GET" action="{{ route('admin.articles') }}" class="relative group">
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Buscar por título, palabra clave o correo del estudiante..."
                            class="block w-full bg-gray-50 border-gray-100 rounded-2xl pl-12 pr-32 focus:ring-4 focus:ring-cyber-purple-500/10 focus:border-cyber-purple-500 transition-all duration-300 py-4 text-sm shadow-inner">
                        <div
                            class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-gray-400 group-focus-within:text-cyber-purple-500 transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <div class="absolute inset-y-0 right-0 py-2 pr-2 flex items-center space-x-2">
                            @if(request('search'))
                                <a href="{{ route('admin.articles') }}"
                                    class="px-3 py-2 text-xs font-bold text-gray-400 hover:text-gray-600 transition-colors uppercase tracking-widest">Limpiar</a>
                            @endif
                            <button type="submit"
                                class="bg-gray-900 text-white px-6 py-2 rounded-xl text-xs font-bold hover:bg-cyber-purple-600 transition-all shadow-lg shadow-gray-900/10">Buscar</button>
                        </div>
                    </form>
                </div>

                <div class="flex flex-wrap items-center gap-4">
                    <div class="px-6 py-3 bg-white border border-gray-100 rounded-2xl shadow-sm">
                        <div class="text-[10px] uppercase font-black text-gray-400 tracking-tighter">Artículos Totales
                        </div>
                        <div class="text-xl font-bold tech-gradient-text">{{ $articles->count() }}</div>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success') || session('error'))
            <div
                class="glass-card px-6 py-4 rounded-2xl border-l-4 {{ session('success') ? 'border-green-500' : 'border-red-500' }} animate-pulse">
                <span
                    class="text-sm font-bold {{ session('success') ? 'text-green-700' : 'text-red-700' }}">{{ session('success') ?? session('error') }}</span>
            </div>
        @endif

        <!-- Global Table -->
        <div class="glass-card rounded-3xl overflow-hidden shadow-2xl shadow-cyber-purple-500/5">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50/50 text-left border-b border-gray-100">
                            <th class="px-6 py-5 text-xs font-black text-gray-400 uppercase tracking-widest">Documento
                                Científico</th>
                            <th class="px-6 py-5 text-xs font-black text-gray-400 uppercase tracking-widest">Estudiante
                                Responsable</th>
                            <th class="px-6 py-5 text-xs font-black text-gray-400 uppercase tracking-widest">Estatus de
                                Revisión</th>
                            <th class="px-6 py-5 text-xs font-black text-gray-400 uppercase tracking-widest text-right">
                                Herramientas</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100/30">
                        @forelse($articles as $article)
                            <tr class="hover:bg-cyber-purple-50/20 transition-all group">
                                <td class="px-6 py-6">
                                    <div class="flex items-center group/title">
                                        <div
                                            class="h-14 w-11 bg-white border border-gray-200 rounded-xl flex flex-col items-center justify-center text-cyber-purple-500 shadow-sm group-hover:shadow-md transition-all group-hover:border-cyber-purple-300">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                            <div class="text-[8px] font-black uppercase mt-1">PDF</div>
                                        </div>
                                        <div class="ml-5">
                                            <div
                                                class="font-bold text-gray-900 group-hover/title:text-cyber-purple-600 transition-colors leading-tight truncate max-w-sm">
                                                {{ $article->title }}</div>
                                            <div class="text-[10px] text-gray-400 mt-1 uppercase font-bold tracking-widest">
                                                {{ $article->career }} · {{ $article->year }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-6">
                                    <div class="flex items-center space-x-3">
                                        <div
                                            class="h-8 w-8 rounded-full bg-gray-100 flex items-center justify-center border border-gray-200">
                                            <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" />
                                            </svg>
                                        </div>
                                        <div class="text-sm font-medium text-gray-700">
                                            {{ $article->student->email ?? 'Sin asignar' }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-6 text-center">
                                    <span class="inline-flex px-4 py-1.5 rounded-2xl text-[10px] font-black tracking-widest uppercase items-center
                                            @if($article->status == 'aprobado') bg-emerald-50 text-emerald-600 ring-1 ring-emerald-200/50
                                            @elseif($article->status == 'revisión') bg-amber-50 text-amber-600 ring-1 ring-amber-200/50
                                            @else bg-rose-50 text-rose-600 ring-1 ring-rose-200/50 @endif">
                                        {{ $article->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-6 text-right">
                                    <div class="flex justify-end items-center space-x-3">
                                        <a href="{{ route('articles.show', $article) }}"
                                            class="p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-cyber-purple-500 hover:border-cyber-purple-200 hover:shadow-xl hover:shadow-cyber-purple-500/10 transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ asset('storage/' . $article->pdf_path) }}" target="_blank"
                                            class="p-3 bg-white border border-gray-100 rounded-2xl text-gray-400 hover:text-rose-500 hover:border-rose-200 hover:shadow-xl hover:shadow-rose-500/10 transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                            </svg>
                                        </a>

                                        <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('¿Eliminar esta investigación permanentemente?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-3 bg-white border border-rose-100 text-rose-400 hover:text-white hover:bg-rose-500 rounded-2xl transition-all shadow-sm">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-24 text-center">
                                    <div class="text-gray-300 font-black text-2xl uppercase tracking-tighter opacity-50">
                                        Base de datos vacía</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>