@extends('layouts.app')

@section('title', 'Búsqueda Avanzada')

@section('content')
<div class="mb-6">
    <h2 class="text-3xl font-bold mb-4 text-gray-900 dark:text-white">Búsqueda Avanzada de Trabajos</h2>
    
    <a href="{{ route('admin.dashboard') }}" 
        class="text-blue-600 dark:text-blue-400 hover:underline mb-4 inline-block">
        ← Volver al panel
    </a>
</div>

<div class="bg-white dark:bg-dark-card rounded-lg shadow-md p-6 mb-6 border border-gray-200 dark:border-gray-700">
    <form method="GET" action="{{ route('admin.search') }}">
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-900 dark:text-gray-200 font-bold mb-2">Buscar</label>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Título, palabras clave, asesor..."
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded 
                           bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                           placeholder-gray-500 dark:placeholder-gray-400
                           focus:outline-none focus:border-blue-500 dark:focus:border-blue-400">
            </div>
            
            <div>
                <label class="block text-gray-900 dark:text-gray-200 font-bold mb-2">Estado</label>
                <select name="status"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded 
                           bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                           focus:outline-none focus:border-blue-500 dark:focus:border-blue-400">
                    <option value="">Todos</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pendiente</option>
                    <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Aprobado</option>
                    <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rechazado</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-900 dark:text-gray-200 font-bold mb-2">Carrera</label>
                <input type="text" name="career" value="{{ request('career') }}"
                    placeholder="Filtrar por carrera"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded 
                           bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                           placeholder-gray-500 dark:placeholder-gray-400
                           focus:outline-none focus:border-blue-500 dark:focus:border-blue-400">
            </div>
            
            <div>
                <label class="block text-gray-900 dark:text-gray-200 font-bold mb-2">Año</label>
                <input type="number" name="year" value="{{ request('year') }}"
                    placeholder="Filtrar por año"
                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded 
                           bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                           placeholder-gray-500 dark:placeholder-gray-400
                           focus:outline-none focus:border-blue-500 dark:focus:border-blue-400">
            </div>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 text-white font-bold py-2 px-6 rounded transition">
            Buscar
        </button>
    </form>
</div>

<div class="bg-white dark:bg-dark-card rounded-lg shadow-md overflow-hidden border border-gray-200 dark:border-gray-700">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-800">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Título</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Estudiante</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Carrera</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Año</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Estado</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-dark-card divide-y divide-gray-200 dark:divide-gray-700">
            @forelse($projects as $project)
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ Str::limit($project->title, 40) }}</td>
                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $project->user->name }}</td>
                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $project->career }}</td>
                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $project->year }}</td>
                <td class="px-6 py-4">
                    @if($project->status === 'pending')
                        <span class="bg-yellow-200 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-300 px-2 py-1 rounded text-xs">Pendiente</span>
                    @elseif($project->status === 'approved')
                        <span class="bg-green-200 text-green-800 dark:bg-green-900 dark:text-green-300 px-2 py-1 rounded text-xs">Aprobado</span>
                    @else
                        <span class="bg-red-200 text-red-800 dark:bg-red-900 dark:text-red-300 px-2 py-1 rounded text-xs">Rechazado</span>
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
                    No se encontraron resultados.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $projects->appends(request()->query())->links() }}
</div>
@endsection