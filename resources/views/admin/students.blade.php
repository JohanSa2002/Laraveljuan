@extends('layouts.app')

@section('title', 'Lista de Estudiantes')

@section('content')
<div class="mb-6">
    <h2 class="text-3xl font-bold text-white mb-4">Estudiantes Registrados</h2>
    
    <a href="{{ route('admin.dashboard') }}" 
        class="text-blue-400 hover:text-blue-300 hover:underline mb-4 inline-block">
        ← Volver al panel
    </a>
</div>

<div class="bg-gray-800 rounded-lg shadow-md overflow-hidden">
    <table class="min-w-full divide-y divide-gray-700">
        <thead class="bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Nombre</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">ID Estudiante</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Carrera</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase">Trabajos</th>
            </tr>
        </thead>
        <tbody class="bg-gray-800 divide-y divide-gray-700">
            @forelse($students as $student)
            <tr class="hover:bg-gray-700">
                <td class="px-6 py-4 text-gray-200">{{ $student->name }}</td>
                <td class="px-6 py-4 text-gray-300">{{ $student->student_id }}</td>
                <td class="px-6 py-4 text-gray-300">{{ $student->email }}</td>
                <td class="px-6 py-4 text-gray-300">{{ $student->career }}</td>
                <td class="px-6 py-4">
                    <span class="bg-blue-600 text-white px-2 py-1 rounded">
                        {{ $student->graduation_projects_count }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-400">
                    No hay estudiantes registrados aún.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $students->links() }}
</div>
@endsection