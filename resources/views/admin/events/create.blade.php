<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-black text-gray-900 uppercase tracking-tighter">
            {{ __('Crear Nuevo Evento') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="glass-card rounded-[2.5rem] p-10 bg-white">
                <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <x-input-label for="image" :value="__('Imagen del Evento (Banner)')" class="font-bold text-gray-700 uppercase text-xs tracking-widest mb-2" />
                        @if(isset($event) && $event->image_path)
                            <div class="mb-4">
                                <img src="{{ asset('storage/' . $event->image_path) }}" alt="Preview" class="w-full h-48 object-cover rounded-2xl shadow-sm border border-gray-100">
                                <p class="text-[10px] text-gray-400 mt-2 uppercase font-black tracking-widest text-center">Imagen Actual</p>
                            </div>
                        @endif
                        <input id="image" name="image" type="file" accept="image/*" class="mt-1 block w-full text-sm text-gray-900 border border-gray-200 rounded-2xl cursor-pointer bg-gray-50 focus:outline-none" />
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
                        <x-input-error class="mt-2" :messages="$errors->get('image')" />
                    </div>

                    <div>
                        <x-input-label for="name" :value="__('Nombre del Evento')" class="font-bold text-gray-700 uppercase text-xs tracking-widest mb-2" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full rounded-2xl border-gray-200 focus:border-cyber-purple-500 focus:ring-cyber-purple-500" :value="old('name')" required />
                        <x-input-error class="mt-2" :messages="$errors->get('name')" />
                    </div>

                    <div>
                        <x-input-label for="description" :value="__('Descripción')" class="font-bold text-gray-700 uppercase text-xs tracking-widest mb-2" />
                        <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-2xl border-gray-200 focus:border-cyber-purple-500 focus:ring-cyber-purple-500">{{ old('description') }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('description')" />
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <x-input-label for="start_date" :value="__('Fecha de Inicio')" class="font-bold text-gray-700 uppercase text-xs tracking-widest mb-2" />
                            <x-text-input id="start_date" name="start_date" type="date" class="mt-1 block w-full rounded-2xl border-gray-200 focus:border-cyber-purple-500 focus:ring-cyber-purple-500" :value="old('start_date')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('start_date')" />
                        </div>
                        <div>
                            <x-input-label for="end_date" :value="__('Fecha de Cierre')" class="font-bold text-gray-700 uppercase text-xs tracking-widest mb-2" />
                            <x-text-input id="end_date" name="end_date" type="date" class="mt-1 block w-full rounded-2xl border-gray-200 focus:border-cyber-purple-500 focus:ring-cyber-purple-500" :value="old('end_date')" required />
                            <x-input-error class="mt-2" :messages="$errors->get('end_date')" />
                        </div>
                    </div>

                    <div>
                        <x-input-label for="categories" :value="__('Categorías (Separadas por comas)')" class="font-bold text-gray-700 uppercase text-xs tracking-widest mb-2" />
                        <x-text-input id="categories" name="categories" type="text" class="mt-1 block w-full rounded-2xl border-gray-200 focus:border-cyber-purple-500 focus:ring-cyber-purple-500" placeholder="Robótica, Software, Civil, Energía..." :value="old('categories')" required />
                        <p class="mt-1 text-xs text-gray-400">Ejemplo: Robótica, Software, Inteligencia Artificial</p>
                        <x-input-error class="mt-2" :messages="$errors->get('categories')" />
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="checkbox" name="is_active" id="is_active" class="rounded-lg text-cyber-purple-600 focus:ring-cyber-purple-500" checked>
                        <x-input-label for="is_active" :value="__('Evento Activo')" class="font-bold text-gray-700 uppercase text-xs tracking-widest" />
                    </div>

                    <div class="flex items-center justify-end gap-4 pt-6">
                        <a href="{{ route('events.index') }}" class="px-6 py-3 text-gray-500 font-bold uppercase tracking-widest text-xs hover:text-gray-900 transition-colors">
                            Cancelar
                        </a>
                        <button type="submit" class="px-8 py-4 bg-cyber-purple-600 text-white rounded-2xl font-black uppercase tracking-widest text-xs shadow-lg shadow-cyber-purple-500/20 hover:bg-cyber-purple-700 transition-all">
                            Guardar Evento
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
