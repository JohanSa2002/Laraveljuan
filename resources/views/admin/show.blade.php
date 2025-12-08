@extends('layouts.app')

@section('title', 'Gestionar Trabajo de Graduación')

@section('content')
<div class="max-w-4xl mx-auto">
    <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline mb-4 inline-block">
        ← Volver al panel
    </a>

    <div class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold mb-6">{{ $project->title }}</h2>
        
        <div class="space-y-4 mb-6">
            <div>
                <strong class="text-gray-700">Estudiante:</strong>
                <p>{{ $project->user->name }} ({{ $project->user->student_id }})</p>
            </div>
            
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
            
            <div>
                <strong class="text-gray-700">Archivo:</strong>
                <a href="{{ asset('storage/' . $project->file_path) }}" target="_blank"
                    class="text-blue-600 hover:underline">
                    Descargar documento
                </a>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.projects.updateStatus', $project) }}" class="border-t pt-6">
            @csrf
            @method('PUT')
            
            <h3 class="text-xl font-bold mb-4">Gestionar Estado</h3>
            
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Estado</label>
                <select name="status" 
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    <option value="pending" {{ $project->status === 'pending' ? 'selected' : '' }}>Pendiente</option>
                    <option value="approved" {{ $project->status === 'approved' ? 'selected' : '' }}>Aprobado</option>
                    <option value="rejected" {{ $project->status === 'rejected' ? 'selected' : '' }}>Rechazado</option>
                </select>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-bold mb-2">Comentarios</label>
                <textarea name="admin_comments" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">{{ $project->admin_comments }}</textarea>
            </div>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
                Actualizar Estado
            </button>
        </form>
    </div>
</div>
@endsection