@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="max-w-md mx-auto bg-white dark:bg-dark-card rounded-lg shadow-md p-8">

    <!-- Imagen añadida -->
    <div class="flex justify-center mb-6">
        <img src="{{ asset('images/utp.png') }}" 
             alt="UTP Logo" 
             class="w-40 h-auto">
    </div>

    <h2 class="text-2xl font-bold mb-6 text-center text-gray-900 dark:text-white">Iniciar Sesión</h2>
    
    @if($errors->any())
        <div class="bg-red-100 dark:bg-red-900/30 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-300 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Correo Electrónico</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                       focus:outline-none focus:border-blue-500 dark:focus:border-blue-400">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Contraseña</label>
            <input type="password" name="password" required
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded 
                       bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100
                       focus:outline-none focus:border-blue-500 dark:focus:border-blue-400">
        </div>

        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 text-white font-bold py-2 px-4 rounded transition">
            Iniciar Sesión
        </button>
    </form>

    <p class="mt-4 text-center text-gray-600 dark:text-gray-400">
        ¿No tienes cuenta? 
        <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400 hover:underline">Regístrate aquí</a>
    </p>
</div>
@endsection
