@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Iniciar Sesión</h2>
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Correo Electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Contraseña</label>
            <input type="password" name="password" required
                class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Iniciar Sesión
        </button>
    </form>

    <p class="mt-4 text-center text-gray-600">
        ¿No tienes cuenta? 
        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Regístrate aquí</a>
    </p>
</div>
@endsection