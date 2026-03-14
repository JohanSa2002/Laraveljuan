<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Noticia / Aviso') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 border-b border-gray-200">
                    <form action="{{ route('admin.notices.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <label for="title" class="block text-sm font-medium text-gray-700">Título de la Noticia</label>
                            <input type="text" name="title" id="title" value="{{ old('title', $notice->title) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('title') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="category" class="block text-sm font-medium text-gray-700">Categoría</label>
                            <select name="category" id="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="Aviso" {{ old('category', $notice->category) == 'Aviso' ? 'selected' : '' }}>Aviso Oficial</option>
                                <option value="Academia" {{ old('category', $notice->category) == 'Academia' ? 'selected' : '' }}>Academia (Calendario, Admisión)</option>
                                <option value="Investigación" {{ old('category', $notice->category) == 'Investigación' ? 'selected' : '' }}>Investigación (Conferencias, Publicaciones)</option>
                                <option value="Vida Universitaria" {{ old('category', $notice->category) == 'Vida Universitaria' ? 'selected' : '' }}>Vida Universitaria (Eventos, Deportes)</option>
                            </select>
                            @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="summary" class="block text-sm font-medium text-gray-700">Resumen Breve (Aparecerá en el Homepage)</label>
                            <textarea name="summary" id="summary" rows="2" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>{{ old('summary', $notice->summary) }}</textarea>
                            @error('summary') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label for="content" class="block text-sm font-medium text-gray-700">Contenido Detallado</label>
                            <textarea name="content" id="content" rows="6" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('content', $notice->content) }}</textarea>
                            @error('content') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-6">
                            <label for="image" class="block text-sm font-medium text-gray-700">Cambiar Imagen Destacada (Recomendado 16:9)</label>
                            <input type="file" name="image" id="image" accept="image/*" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            <div class="mt-2 bg-blue-50/50 border border-blue-100 rounded-xl p-3">
                                <p class="text-[10px] text-blue-600 font-bold uppercase tracking-widest flex items-center gap-2">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                    Recomendación para nitidez
                                </p>
                                <p class="text-[10px] text-blue-500 mt-1 leading-relaxed">
                                    Use imágenes de <b>1280 x 720 px</b> (Relación 16:9). <br>
                                    Formato WebP o JPG. Peso máximo: <b>500 KB</b>.
                                </p>
                            </div>
                            @if($notice->image_path)
                                <div class="mt-2 text-sm text-gray-500">
                                    <p class="mb-2">Imagen Actual:</p>
                                    <img src="{{ Storage::url($notice->image_path) }}" alt="Imagen Noticia" class="w-48 object-cover rounded shadow">
                                </div>
                            @endif
                            @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-6 flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $notice->is_active) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <label for="is_active" class="ml-2 block text-sm text-gray-900">
                                Estado Activo (Visible al público)
                            </label>
                        </div>

                        <div class="flex items-center justify-end">
                            <a href="{{ route('admin.notices.index') }}" class="mr-4 text-gray-600 hover:text-gray-900">Cancelar</a>
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded shadow">
                                Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
