{{-- resources/views/trabajos/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Trabajos Académicos') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-3 rounded bg-green-100 text-green-800 text-sm">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-4 flex justify-end">
                <a href="{{ route('trabajos.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Nuevo trabajo
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if ($trabajos->count() === 0)
                        <p class="text-gray-500 text-sm">No hay trabajos registrados todavía.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full text-sm text-left">
                                <thead class="border-b text-gray-700 uppercase text-xs">
                                    <tr>
                                        <th class="px-3 py-2">Título</th>
                                        <th class="px-3 py-2">Autor</th>
                                        <th class="px-3 py-2">Año</th>
                                        <th class="px-3 py-2">Asesor</th>
                                        <th class="px-3 py-2">Estado</th>
                                        <th class="px-3 py-2">Lugar</th>
                                        <th class="px-3 py-2">Subido por</th>
                                        <th class="px-3 py-2 text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y">
                                    @foreach ($trabajos as $trabajo)
                                        <tr>
                                            <td class="px-3 py-2 font-medium">
                                                {{ $trabajo->titulo }}
                                            </td>
                                            <td class="px-3 py-2">
                                                {{ $trabajo->autor }}
                                            </td>
                                            <td class="px-3 py-2">
                                                {{ $trabajo->anio }}
                                            </td>
                                            <td class="px-3 py-2">
                                                {{ $trabajo->asesor ?? '—' }}
                                            </td>
                                            <td class="px-3 py-2">
                                                @php
                                                    $colores = [
                                                        'en_revision' => 'bg-yellow-100 text-yellow-800',
                                                        'aceptado_revision' => 'bg-blue-100 text-blue-800',
                                                        'aprobado' => 'bg-green-100 text-green-800',
                                                    ];
                                                @endphp
                                                <span class="px-2 py-1 rounded text-xs font-semibold {{ $colores[$trabajo->estado] ?? 'bg-gray-100 text-gray-800' }}">
                                                    @switch($trabajo->estado)
                                                        @case('en_revision')
                                                            En revisión
                                                            @break
                                                        @case('aceptado_revision')
                                                            Aceptado para revisión
                                                            @break
                                                        @case('aprobado')
                                                            Aprobado
                                                            @break
                                                        @default
                                                            {{ $trabajo->estado }}
                                                    @endswitch
                                                </span>
                                            </td>
                                            <td class="px-3 py-2">
                                                {{ $trabajo->lugar }}
                                            </td>
                                            <td class="px-3 py-2">
                                                {{ $trabajo->user->name ?? 'N/A' }}
                                            </td>
                                            <td class="px-3 py-2 text-center space-x-2">
                                                <a href="{{ route('trabajos.show', $trabajo) }}"
                                                   class="text-indigo-600 hover:text-indigo-800 text-xs font-semibold">
                                                    Ver
                                                </a>

                                                @if ($trabajo->user_id === auth()->id())
                                                    <form action="{{ route('trabajos.destroy', $trabajo) }}"
                                                          method="POST"
                                                          class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            onclick="return confirm('¿Seguro que quieres eliminar este trabajo?')"
                                                            class="text-red-600 hover:text-red-800 text-xs font-semibold">
                                                            Eliminar
                                                        </button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $trabajos->links() }}
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
