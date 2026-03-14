<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Gestión de Noticias y Avisos') }}
            </h2>
            <a href="{{ route('admin.notices.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow">
                + Crear Noticia
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
