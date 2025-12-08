@extends('layouts.app')

@section('title', 'Panel de Administrador')

@section('content')
<div class="mb-6">
    <h2 class="text-3xl font-bold dark:text-white mb-4">Panel de Administrador</h2>
    
    <div class="grid grid-cols-4 gap-4 mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-gray-600 dark:text-gray-400 text-sm font-semibold">Total de Trabajos</h3>
            <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">{{ $stats['total'] }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-gray-600 dark:text-gray-400 text-sm font-semibold">Pendientes</h3>
            <p class="text-3xl font-bold text-yellow-600 dark:text-yellow-400">{{ $stats['pending'] }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-gray-600 dark:text-gray-400 text-sm font-semibold">Aprobados</h3>
            <p class="text-3xl font-bold text-green-600 dark:text-green-400">{{ $stats['approved'] }}</p>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
            <h3 class="text-gray-600 dark:text-gray-400 text-sm font-semibold">Rechazados</h3>
            <p class="text-3xl font-bold text-red-600 dark:text-red-400">{{ $stats['rejected'] }}</p>
        </div>
    </div>

    <div class="flex gap-4 mb-4">
        <a href="{{ route('admin.dashboard') }}" 
            class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 text-white px-4 py-2 rounded transition-colors">
            Todos los Trabajos
        </a>
        <a href="{{ route('admin.search') }}" 
            class="bg-gray-600 hover:bg-gray-700 dark:bg-gray-700 dark:hover:bg-gray-800 text-white px-4 py-2 rounded transition-colors">
            Búsqueda Avanzada
        </a>
        <a href="{{ route('admin.students') }}" 
            class="bg-green-600 hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-800 text-white px-4 py-2 rounded transition-colors">
            Ver Estudiantes
        </a>
    </div>
</div>

<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Título</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Estudiante</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Carrera</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Año</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Estado</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
            @forelse($projects as $project)
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ Str::limit($project->title, 40) }}</td>
                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $project->user->name }}</td>
                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $project->career }}</td>
                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $project->year }}</td>
                <td class="px-6 py-4">
                    @if($project->status === 'pending')
                        <span class="bg-yellow-200 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 px-2 py-1 rounded text-xs">Pendiente</span>
                    @elseif($project->status === 'approved')
                        <span class="bg-green-200 dark:bg-green-900 text-green-800 dark:text-green-200 px-2 py-1 rounded text-xs">Aprobado</span>
                    @else
                        <span class="bg-red-200 dark:bg-red-900 text-red-800 dark:text-red-200 px-2 py-1 rounded text-xs">Rechazado</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.projects.show', $project) }}" 
                        class="text-blue-600 dark:text-blue-400 hover:underline">
                        Ver/Gestionar
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                    No hay trabajos registrados aún.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4 dark:text-gray-300">
    {{ $projects->links() }}
</div>
@endsection