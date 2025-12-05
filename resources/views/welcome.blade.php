{{-- resources/views/welcome.blade.php --}}
<x-guest-layout>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-8">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">
                Registro UTP
            </h1>

            <p class="text-center text-gray-600 text-sm mb-8">
                Sistema de registro y gestión de trabajos académicos.
            </p>

            <div class="flex flex-col gap-3">
                <a href="{{ route('login') }}"
                   class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Iniciar sesión
                </a>

                <a href="{{ route('register') }}"
                   class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-sm text-gray-700 uppercase tracking-widest hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Registro
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
