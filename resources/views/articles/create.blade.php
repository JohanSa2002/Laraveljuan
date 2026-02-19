<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir Nuevo Artículo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/80 backdrop-blur-md overflow-hidden shadow-sm sm:rounded-lg border border-purple-100">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Título del Artículo')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                :value="old('title')" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Students -->
                        <div class="mt-4">
                            <x-input-label for="students" :value="__('Estudiantes Participantes')" />
                            <x-text-input id="students" class="block mt-1 w-full" type="text" name="students"
                                :value="old('students')" required placeholder="Ej: Juan Perez, Maria Lopez" />
                            <x-input-error :messages="$errors->get('students')" class="mt-2" />
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-4">
                            <!-- Year -->
                            <div>
                                <x-input-label for="year" :value="__('Año')" />
                                <x-text-input id="year" class="block mt-1 w-full" type="number" name="year"
                                    :value="old('year', date('Y'))" required />
                                <x-input-error :messages="$errors->get('year')" class="mt-2" />
                            </div>

                            <!-- Career -->
                            <div>
                                <x-input-label for="career" :value="__('Carrera')" />
                                <x-text-input id="career" class="block mt-1 w-full" type="text" name="career"
                                    :value="old('career')" required />
                                <x-input-error :messages="$errors->get('career')" class="mt-2" />
                            </div>
                        </div>

                        @if(Auth::user()->is_advisor)
                            <!-- Student Assignment via Email (For Advisors) -->
                            <div class="mt-4">
                                <x-input-label for="student_email" :value="__('Email del Estudiante (Para asignar)')" />
                                <x-text-input id="student_email" class="block mt-1 w-full" type="email" name="student_email"
                                    :value="old('student_email')" required placeholder="estudiante@utp.edu.co" />
                                <p class="mt-1 text-sm text-gray-500 italic">Asignarás este artículo directamente al
                                    estudiante con este correo.</p>
                                <x-input-error :messages="$errors->get('student_email')" class="mt-2" />
                            </div>
                        @else
                            <!-- Advisor Selection (For Students) -->
                            <div class="mt-4">
                                <x-input-label for="advisor_id" :value="__('Asesor')" />
                                <select id="advisor_id" name="advisor_id"
                                    class="block mt-1 w-full border-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-md shadow-sm"
                                    required>
                                    <option value="">Seleccione un asesor</option>
                                    @foreach($advisors as $advisor)
                                        <option value="{{ $advisor->id }}" {{ old('advisor_id') == $advisor->id ? 'selected' : '' }}>{{ $advisor->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('advisor_id')" class="mt-2" />
                            </div>
                        @endif

                        <!-- PDF Upload -->
                        <div class="mt-4 p-4 bg-purple-50 rounded-lg border border-purple-100">
                            <x-input-label for="pdf_file" :value="__('Subir Archivo PDF')" />
                            <input id="pdf_file"
                                class="block mt-1 w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-white focus:outline-none"
                                type="file" name="pdf_file" accept=".pdf" required />
                            <p class="mt-1 text-xs text-purple-600 font-medium">Formato admitido: PDF (Máx. 10MB)</p>
                            <x-input-error :messages="$errors->get('pdf_file')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-6 gap-3">
                            <a href="{{ route('articles.index') }}"
                                class="text-sm text-gray-600 hover:text-gray-900">Cancelar</a>
                            <x-primary-button>
                                {{ __('Crear Artículo') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>