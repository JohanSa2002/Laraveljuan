<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="flex items-center space-x-4">
                <span class="h-10 w-1.5 bg-cyber-purple-500 rounded-full"></span>
                <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tighter tech-gradient-text">
                    {{ __('Gestión de Noticias') }}
                </h2>
            </div>
            
            <a href="{{ route('admin.notices.create') }}" 
                class="px-6 py-3 bg-fuchsia-600 text-white rounded-2xl font-bold hover:bg-fuchsia-700 transition-all shadow-lg shadow-fuchsia-500/20 flex items-center gap-2 text-sm justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Nueva Noticia
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr>
                                <th class="border-b px-4 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                                <th class="border-b px-4 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">Categoría</th>
                                <th class="border-b px-4 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                                <th class="border-b px-4 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                <th class="border-b px-4 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($notices as $notice)
                                <tr>
                                    <td class="border-b px-4 py-4">{{ $notice->title }}</td>
                                    <td class="border-b px-4 py-4"><span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">{{ $notice->category }}</span></td>
                                    <td class="border-b px-4 py-4">
                                        @if($notice->is_active)
                                            <span class="text-green-600 font-bold text-sm">Activo</span>
                                        @else
                                            <span class="text-red-500 font-bold text-sm">Oculto</span>
                                        @endif
                                    </td>
                                    <td class="border-b px-4 py-4 text-sm">{{ $notice->created_at->format('d M, Y') }}</td>
                                    <td class="border-b px-4 py-4">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('admin.notices.edit', $notice) }}" class="text-indigo-600 hover:text-indigo-900">Editar</a>
                                            <form action="{{ route('admin.notices.destroy', $notice) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este aviso?');" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">No hay noticias registradas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    
                    <div class="mt-4">
                        {{ $notices->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
