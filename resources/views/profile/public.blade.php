<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil Público') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 flex flex-col items-center">

                    <div class="mb-6 relative">
                        @if($user->profile_photo_path)
                            <img src="{{ Storage::url($user->profile_photo_path) }}" alt="{{ $user->name }}"
                                class="w-40 h-40 rounded-full object-cover shadow-lg border-4 border-purple-100">
                        @else
                            <div
                                class="w-40 h-40 rounded-full bg-purple-100 flex items-center justify-center text-purple-500 shadow-lg border-4 border-white">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                        @endif
                        <div class="absolute bottom-2 right-2 bg-white rounded-full p-2 shadow">
                            @if($user->is_advisor)
                                <span
                                    class="bg-purple-100 text-purple-800 text-xs font-semibold px-2.5 py-0.5 rounded">Asesor</span>
                            @else
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Estudiante</span>
                            @endif
                        </div>
                    </div>

                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $user->name }}</h1>
                    <p class="text-gray-500 mb-6 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        {{ $user->email }}
                    </p>

                    <div class="w-full bg-gray-50 rounded-lg p-6 mb-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3">Biografía</h3>
                        @if($user->description)
                            <p class="text-gray-600 leading-relaxed whitespace-pre-line">{{ $user->description }}</p>
                        @else
                            <p class="text-gray-400 italic">Este usuario no ha añadido una descripción aún.</p>
                        @endif
                    </div>

                    @if($user->cedula)
                        <div class="w-full bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Información Institucional</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <span class="text-sm text-gray-500 block">Cédula</span>
                                    <span class="font-medium">{{ $user->cedula }}</span>
                                </div>
                                @if($user->institutional_email)
                                    <div>
                                        <span class="text-sm text-gray-500 block">Correo Institucional</span>
                                        <span class="font-medium">{{ $user->institutional_email }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <!-- Approved Articles Section -->
                    <div class="w-full mt-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-3 border-b pb-2">Artículos Aprobados</h3>
                        @if(isset($articles) && $articles->count() > 0)
                            <div class="space-y-4">
                                @foreach($articles as $article)
                                    <div class="bg-white border rounded-lg p-4 shadow-sm hover:shadow-md transition">
                                        <h4 class="font-bold text-indigo-600 text-lg">
                                            <a href="{{ route('articles.show', $article) }}" class="hover:underline">
                                                {{ $article->title }}
                                            </a>
                                        </h4>
                                        <div class="flex justify-between items-center mt-2 text-sm text-gray-500">
                                            <span>Año: {{ $article->year }}</span>
                                            <span
                                                class="bg-green-100 text-green-800 px-2 py-0.5 rounded text-xs font-semibold">Aprobado</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p class="text-gray-500 italic text-center py-4 bg-gray-50 rounded">Este usuario no tiene
                                artículos aprobados registrados.</p>
                        @endif
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>