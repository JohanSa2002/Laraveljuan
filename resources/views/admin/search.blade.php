@extends('layouts.app')

@section('title', 'Búsqueda Avanzada')

@section('content')
<div class="mb-6">
    <h2 class="text-3xl font-bold mb-4">Búsqueda Avanzada de Trabajos</h2>
    
    <a href="{{ route('admin.dashboard') }}" 
        class="text-blue-600 hover:underline mb-4 inline-block">
        ← Volver al panel
    </a>
</div>

<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <form method="GET" action="{{ route('admin.search') }}">
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Buscar</label>
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Título, palabras clave, asesor..."
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-gray-700 font-bold mb-2">Estado</label>
                <select name="status"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
                    <option value="">Todos</option>
                    <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>Pendiente</option>
                    <option value="approved" {{ request('status') === 'approved' ? 'selected' : '' }}>Aprobado</option>
                    <option value="rejected" {{ request('status') === 'rejected' ? 'selected' : '' }}>Rechazado</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Carrera</label>
                <input type="text" name="career" value="{{ request('career') }}"
                    placeholder="Filtrar por carrera"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
            </div>
            
            <div>
                <label class="block text-gray-700 font-bold mb-2">Año</label>
                <input type="number" name="year" value="{{ request('year') }}"
                    placeholder="Filtrar por año"
                    class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
            </div>
        </div>

        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded">
            Buscar
        </button>
    </form>
</div>

<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Título</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estudiante</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Carrera</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Año</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Estado</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($projects as $project)
            <tr>
                <td class="px-6 py-4">{{ Str::limit($project->title, 40) }}</td>
                <td class="px-6 py-4">{{ $project->user->name }}</td>
                <td class="px-6 py-4">{{ $project->career }}</td>
                <td class="px-6 py-4">{{ $project->year }}</td>
                <td class="px-6 py-4">
                    @if($project->status === 'pending')
                        <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded text-xs">Pendiente</span>
                    @elseif($project->status === 'approved')
                        <span class="bg-green-200 text-green-800 px-2 py-1 rounded text-xs">Aprobado</span>
                    @else
                        <span class="bg-red-200 text-red-800 px-2 py-1 rounded text-xs">Rechazado</span>
                    @endif
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('admin.projects.show', $project) }}" 
                        class="text-blue-600 hover:underline">
                        Ver/Gestionar
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="px-6 py-4 text-center text-gray-500">
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