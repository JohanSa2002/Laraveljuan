@extends('layouts.app')

@section('title', 'Registro de Estudiante')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Registro de Estudiante</h2>
    
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Nombre Completo</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">ID de Estudiante</label>
            <input type="text" name="student_id" value="{{ old('student_id') }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Carrera</label>
            <input type="text" name="career" value="{{ old('career') }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Correo Electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Contraseña</label>
            <input type="password" name="password" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Registrarse
        </button>
    </form>

    <p class="mt-4 text-center text-gray-600">
        ¿Ya tienes cuenta? 
        <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Inicia sesión aquí</a>
    </p>
</div>
@endsection