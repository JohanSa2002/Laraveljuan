@extends('layouts.app')

@section('title', 'Editar Trabajo de Graduación')

@section('content')
<div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-900 dark:text-white">
        Editar Trabajo de Graduación
    </h2>
    
    <form method="POST" action="{{ route('student.projects.update', $project) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Título del Trabajo *</label>
            <input type="text" name="title" value="{{ old('title', $project->title) }}" required
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 
                       rounded bg-white dark:bg-gray-700 
                       text-gray-900 dark:text-gray-200
                       focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Descripción *</label>
            <textarea name="description" rows="4" required
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 
                       rounded bg-white dark:bg-gray-700 
                       text-gray-900 dark:text-gray-200
                       focus:outline-none focus:border-blue-500">{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Asesor *</label>
                <input type="text" name="advisor" value="{{ old('advisor', $project->advisor) }}" required
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 
                           rounded bg-white dark:bg-gray-700 
                           text-gray-900 dark:text-gray-200
                           focus:outline-none focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Carrera *</label>
                <input type="text" name="career" value="{{ old('career', $project->career) }}" required
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 
                           rounded bg-white dark:bg-gray-700 
                           text-gray-900 dark:text-gray-200
                           focus:outline-none focus:border-blue-500">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Año *</label>
                <input type="number" name="year" value="{{ old('year', $project->year) }}" required
                    min="2000" max="{{ date('Y') + 1 }}"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 
                           rounded bg-white dark:bg-gray-700 
                           text-gray-900 dark:text-gray-200
                           focus:outline-none focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Fecha de Defensa</label>
                <input type="date" name="defense_date" 
                       value="{{ old('defense_date', $project->defense_date?->format('Y-m-d')) }}"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 
                           rounded bg-white dark:bg-gray-700 
                           text-gray-900 dark:text-gray-200
                           focus:outline-none focus:border-blue-500">
            </div>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Palabras Clave</label>
            <input type="text" name="keywords" value="{{ old('keywords', $project->keywords) }}"
                placeholder="Separadas por comas"
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 
                       rounded bg-white dark:bg-gray-700 
                       text-gray-900 dark:text-gray-200
                       focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">
                Archivo del Trabajo (PDF/DOC)
            </label>
            <input type="file" name="file" accept=".pdf,.doc,.docx"
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 
                       rounded bg-white dark:bg-gray-700 
                       text-gray-900 dark:text-gray-200
                       focus:outline-none focus:border-blue-500">

            <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                Archivo actual: {{ basename($project->file_path) }}
            </p>
            <p class="text-sm text-gray-600 dark:text-gray-400">
                Deja vacío si no quieres cambiar el archivo
            </p>
        </div>

        <div class="flex gap-4">
            <button type="submit" 
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                Actualizar Trabajo
            </button>
            <a href="{{ route('student.dashboard') }}" 
                class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded">
                Cancelar
            </a>
        </div>
    </form>
</div>
@endsection
