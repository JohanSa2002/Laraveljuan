@extends('layouts.app')

@section('title', 'Lista de Estudiantes')

@section('content')
<div class="mb-6">
    <h2 class="text-3xl font-bold mb-4 text-gray-900 dark:text-white">Estudiantes Registrados</h2>
    
    <a href="{{ route('admin.dashboard') }}" 
        class="text-blue-600 dark:text-blue-400 hover:underline mb-4 inline-block">
        ← Volver al panel
    </a>
</div>

<div class="bg-white dark:bg-dark-card rounded-lg shadow-md overflow-hidden border border-gray-200 dark:border-gray-700">
    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
        <thead class="bg-gray-50 dark:bg-gray-800">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Nombre</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Cedula</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Carrera</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase">Trabajos</th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-dark-card divide-y divide-gray-200 dark:divide-gray-700">
            @forelse($students as $student)
            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition">
                <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $student->name }}</td>
                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $student->student_id }}</td>
                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $student->email }}</td>
                <td class="px-6 py-4 text-gray-700 dark:text-gray-300">{{ $student->career }}</td>
                <td class="px-6 py-4">
                    <span class="bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-300 px-2 py-1 rounded">
                        {{ $student->graduation_projects_count }}
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
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