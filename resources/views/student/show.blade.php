@extends('layouts.app')

@section('title', 'Detalles del Trabajo')

@section('content')
<div class="max-w-4xl mx-auto">
    <a href="{{ route('student.dashboard') }}" class="text-blue-600 hover:underline mb-4 inline-block">
        ← Volver a mis trabajos
    </a>

    <div class="bg-white rounded-lg shadow-md p-8">
        <div class="flex justify-between items-start mb-6">
            <h2 class="text-2xl font-bold">{{ $project->title }}</h2>
            @if($project->status === 'pending')
                <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full text-sm">Pendiente</span>
            @elseif($project->status === 'approved')
                <span class="bg-green-200 text-green-800 px-3 py-1 rounded-full text-sm">Aprobado</span>
            @else
                <span class="bg-red-200 text-red-800 px-3 py-1 rounded-full text-sm">Rechazado</span>
            @endif
        </div>
        
        <div class="space-y-4">
            <div>
                <strong class="text-gray-700">Descripción:</strong>
                <p class="text-gray-600">{{ $project->description }}</p>
            </div>
            
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <strong class="text-gray-700">Asesor:</strong>
                    <p>{{ $project->advisor }}</p>
                </div>
                <div>
                    <strong class="text-gray-700">Carrera:</strong>
                    <p>{{ $project->career }}</p>
                </div>
                <div>
                    <strong class="text-gray-700">Año:</strong>
                    <p>{{ $project->year }}</p>
                </div>
                <div>
                    <strong class="text-gray-700">Fecha de Defensa:</strong>
                    <p>{{ $project->defense_date ? $project->defense_date->format('d/m/Y') : 'No definida' }}</p>
                </div>
            </div>
            
            @if($project->keywords)
            <div>
                <strong class="text-gray-700">Palabras Clave:</strong>
                <p>{{ $project->keywords }}</p>
            </div>
            @endif
            
            @if($project->admin_comments)
            <div class="bg-gray-100 p-4 rounded">
                <strong class="text-gray-700">Comentarios del Administrador:</strong>
                <p class="text-gray-600 mt-2">{{ $project->admin_comments }}</p>
            </div>
            @endif

            <div>
                <strong class="text-gray-700">Archivo:</strong>
                <a href="{{ asset('storage/' . $project->file_path) }}" target="_blank"
                    class="text-blue-600 hover:underline ml-2">
                    Descargar documento
                </a>
            </div>
        </div>

        <div class="mt-6 flex gap-2">
            @if($project->status === 'pending')
                <a href="{{ route('student.projects.edit', $project) }}" 
                    class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded">
                    Editar
                </a>
            @endif
            <a href="{{ route('student.dashboard') }}" 
                class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
                Volver
            </a>
        </div>
    </div>
</div>
@endsection