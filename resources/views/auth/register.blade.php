@extends('layouts.app')

@section('title', 'Registro de Estudiante')

@section('content')
<div class="max-w-md mx-auto bg-white dark:bg-dark-card rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-900 dark:text-white">Registro de Estudiante</h2>
    
    @if($errors->any())
        <div class="bg-red-100 dark:bg-red-900/30 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-300 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Nombre Completo</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                       focus:outline-none focus:border-blue-500 dark:focus:border-blue-400">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2"> Cedula</label>
            <input type="text" name="student_id" value="{{ old('student_id') }}" required
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                       focus:outline-none focus:border-blue-500 dark:focus:border-blue-400">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Carrera</label>
            <input type="text" name="career" value="{{ old('career') }}" required
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                       focus:outline-none focus:border-blue-500 dark:focus:border-blue-400">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Correo Electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                       focus:outline-none focus:border-blue-500 dark:focus:border-blue-400">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Contraseña</label>
            <input type="password" name="password" required
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                       focus:outline-none focus:border-blue-500 dark:focus:border-blue-400">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" required
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                       focus:outline-none focus:border-blue-500 dark:focus:border-blue-400">
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded transition">
            Registrarse
        </button>
    </form>

    <p class="mt-4 text-center text-gray-600 dark:text-gray-400">
        ¿Ya tienes cuenta? 
        <a href="{{ route('login') }}" class="text-blue-600 dark:text-blue-400 hover:underline">Inicia sesión aquí</a>
    </p>
</div>
@endsection