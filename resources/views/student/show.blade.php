@extends('layouts.app')

@section('title', 'Detalles del Trabajo')

@section('content')
<div class="max-w-4xl mx-auto">
    <a href="{{ route('student.dashboard') }}" class="text-blue-600 dark:text-blue-400 hover:underline mb-4 inline-block">
        ← Volver a mis trabajos
    </a>

    <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-8 border border-gray-200 dark:border-gray-700">
        <div class="flex justify-between items-start mb-6">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $project->title }}</h2>
            @if($project->status === 'pending')
                <span class="bg-yellow-200 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300 px-3 py-1 rounded-full text-sm">Pendiente</span>
            @elseif($project->status === 'approved')
                <span class="bg-green-200 text-green-800 dark:bg-green-900 dark:text-green-300 px-3 py-1 rounded-full text-sm">Aprobado</span>
            @else
                <span class="bg-red-200 text-red-800 dark:bg-red-900 dark:text-red-300 px-3 py-1 rounded-full text-sm">Rechazado</span>
            @endif
        </div>
        
        <div class="space-y-4">
            <div>
                <strong class="text-gray-900 dark:text-gray-200">Descripción:</strong>
                <p class="text-gray-700 dark:text-gray-300">{{ $project->description }}</p>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <strong class="text-gray-900 dark:text-gray-200">Asesor:</strong>
                    <p class="text-gray-700 dark:text-gray-300">{{ $project->advisor }}</p>
                </div>
                <div>
                    <strong class="text-gray-900 dark:text-gray-200">Carrera:</strong>
                    <p class="text-gray-700 dark:text-gray-300">{{ $project->career }}</p>
                </div>
                <div>
                    <strong class="text-gray-900 dark:text-gray-200">Año:</strong>
                    <p class="text-gray-700 dark:text-gray-300">{{ $project->year }}</p>
                </div>
                <div>
                    <strong class="text-gray-900 dark:text-gray-200">Fecha de Defensa:</strong>
                    <p class="text-gray-700 dark:text-gray-300">{{ $project->defense_date ? $project->defense_date->format('d/m/Y') : 'No definida' }}</p>
                </div>
            </div>
            
            @if($project->keywords)
            <div>
                <strong class="text-gray-900 dark:text-gray-200">Palabras Clave:</strong>
                <p class="text-gray-700 dark:text-gray-300">{{ $project->keywords }}</p>
            </div>
            @endif
            
            @if($project->admin_comments)
            <div class="bg-gray-50 dark:bg-gray-800 p-4 rounded border border-gray-200 dark:border-gray-700">
                <strong class="text-gray-900 dark:text-gray-200">Comentarios del Administrador:</strong>
                <p class="text-gray-700 dark:text-gray-300 mt-2">{{ $project->admin_comments }}</p>
            </div>
            @endif

            <div>
                <strong class="text-gray-900 dark:text-gray-200">Archivo:</strong>
                <a href="{{ asset('storage/' . $project->file_path) }}" target="_blank"
                    class="text-blue-600 dark:text-blue-400 hover:underline ml-2">
                    Descargar documento
                </a>
            </div>
        </div>

        <div class="mt-6 flex gap-2">
            @if($project->status === 'pending')
                <a href="{{ route('student.projects.edit', $project) }}" 
                    class="bg-yellow-600 hover:bg-yellow-700 dark:bg-yellow-700 dark:hover:bg-yellow-800 text-white px-4 py-2 rounded transition">
                    Editar
                </a>
            @endif
            <a href="{{ route('student.dashboard') }}" 
                class="bg-gray-600 hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-800 text-white px-4 py-2 rounded transition">
                Volver
            </a>
        </div>
    </div>
</div>
@endsection