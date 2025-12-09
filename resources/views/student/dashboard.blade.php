@extends('layouts.app')

@section('title', 'Panel de Estudiante')

@section('content')
<div class="mb-6 flex justify-between items-center">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-white">Mis Trabajos de Graduación</h2>
    <a href="{{ route('student.projects.create') }}" 
        class="bg-green-600 hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-800 text-white font-bold py-2 px-4 rounded transition">
        + Registrar Nuevo Trabajo
    </a>
</div>

@if($projects->isEmpty())
    <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-8 text-center border border-gray-200 dark:border-gray-700">
        <p class="text-gray-600 dark:text-gray-400 mb-4">No has registrado ningún trabajo de graduación aún.</p>
        <a href="{{ route('student.projects.create') }}" 
            class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded inline-block transition">
            Registrar mi primer trabajo
        </a>
    </div>
@else
    <div class="grid gap-4">
        @foreach($projects as $project)
            <div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 border border-gray-200 dark:border-gray-700">
                <div class="flex justify-between items-start">
                    <div class="flex-1">
                        <h3 class="text-xl font-bold mb-2 text-gray-900 dark:text-white">{{ $project->title }}</h3>
                        <p class="text-gray-700 dark:text-gray-300 mb-2">{{ Str::limit($project->description, 150) }}</p>
                        <div class="text-sm text-gray-600 dark:text-gray-400 space-y-1">
                            <p><strong class="text-gray-900 dark:text-gray-200">Asesor:</strong> {{ $project->advisor }}</p>
                            <p><strong class="text-gray-900 dark:text-gray-200">Año:</strong> {{ $project->year }}</p>
                            <p><strong class="text-gray-900 dark:text-gray-200">Carrera:</strong> {{ $project->career }}</p>
                        </div>
                    </div>
                    <div class="ml-4">
                        @if($project->status === 'pending')
                            <span class="bg-yellow-200 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300 px-3 py-1 rounded-full text-sm">Pendiente</span>
                        @elseif($project->status === 'approved')
                            <span class="bg-green-200 text-green-800 dark:bg-green-900 dark:text-green-300 px-3 py-1 rounded-full text-sm">Aprobado</span>
                        @else
                            <span class="bg-red-200 text-red-800 dark:bg-red-900 dark:text-red-300 px-3 py-1 rounded-full text-sm">Rechazado</span>
                        @endif
                    </div>
                </div>
                
                @if($project->admin_comments)
                    <div class="mt-4 bg-gray-50 dark:bg-gray-800 p-3 rounded border border-gray-200 dark:border-gray-700">
                        <strong class="text-gray-900 dark:text-gray-200">Comentarios del administrador:</strong>
                        <p class="text-gray-700 dark:text-gray-300 mt-1">{{ $project->admin_comments }}</p>
                    </div>
                @endif

                <div class="mt-4 flex gap-2">
                    <a href="{{ route('student.projects.show', $project) }}" 
                        class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 text-white px-4 py-2 rounded transition">
                        Ver Detalles
                    </a>
                    @if($project->status === 'pending')
                        <a href="{{ route('student.projects.edit', $project) }}" 
                            class="bg-yellow-600 hover:bg-yellow-700 dark:bg-yellow-700 dark:hover:bg-yellow-800 text-white px-4 py-2 rounded transition">
                            Editar
                        </a>
                    @endif
                    <a href="{{ asset('storage/' . $project->file_path) }}" target="_blank"
                        class="bg-gray-600 hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-800 text-white px-4 py-2 rounded transition">
                        Descargar Archivo
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection