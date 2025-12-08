{{-- resources/views/trabajos/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle del trabajo') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-4">

                    <h1 class="text-2xl font-semibold text-gray-900">
                        {{ $trabajo->titulo }}
                    </h1>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div>
                            <p><span class="font-semibold">Autor:</span> {{ $trabajo->autor }}</p>
                            <p><span class="font-semibold">Año:</span> {{ $trabajo->anio }}</p>
                            <p><span class="font-semibold">Asesor:</span> {{ $trabajo->asesor ?? '—' }}</p>
                        </div>
                        <div>
                            <p><span class="font-semibold">Lugar:</span> {{ $trabajo->lugar }}</p>
                            <p><span class="font-semibold">Estado:</span>
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
                            </p>
                            <p><span class="font-semibold">Subido por:</span> {{ $trabajo->user->name ?? 'N/A' }}</p>
                        </div>
                    </div>

                    <div class="pt-4 flex gap-3">
                        <a href="{{ asset('storage/' . $trabajo->ruta_pdf) }}"
                           target="_blank"
                           class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Ver PDF
                        </a>

                        <a href="{{ route('trabajos.index') }}"
                           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50">
                            Volver
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
