{{-- resources/views/trabajos/create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar trabajo académico') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if ($errors->any())
                        <div class="mb-4 p-3 rounded bg-red-100 text-red-800 text-sm">
                            <ul class="list-disc pl-4">
                                @foreach ($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('trabajos.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="titulo">Título</label>
                            <input type="text" name="titulo" id="titulo"
                                   value="{{ old('titulo') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                                   required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="autor">Autor</label>
                            <input type="text" name="autor" id="autor"
                                   value="{{ old('autor') }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                                   required>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="anio">Año</label>
                                <input type="number" name="anio" id="anio"
                                       value="{{ old('anio') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                                       required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="asesor">Asesor</label>
                                <input type="text" name="asesor" id="asesor"
                                       value="{{ old('asesor') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="estado">Estado</label>
                                <select name="estado" id="estado"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                                        required>
                                    @foreach ($estados as $value => $label)
                                        <option value="{{ $value }}" @selected(old('estado') === $value)>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="lugar">Lugar</label>
                                <input type="text" name="lugar" id="lugar"
                                       value="{{ old('lugar') }}"
                                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 text-sm"
                                       placeholder="Ej: UTP - Facultad de Ingeniería de Sistemas"
                                       required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="pdf">Archivo PDF</label>
                            <input type="file" name="pdf" id="pdf"
                                   accept="application/pdf"
                                   class="mt-1 block w-full text-sm text-gray-700">
                            <p class="mt-1 text-xs text-gray-500">
                                Solo archivos PDF. Tamaño máximo: 20 MB.
                            </p>
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-4">
                            <a href="{{ route('trabajos.index') }}"
                               class="text-sm text-gray-600 hover:text-gray-900">
                                Cancelar
                            </a>

                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Guardar
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
