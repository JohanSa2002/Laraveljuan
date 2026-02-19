<x-app-layout>
    <x-slot name="header">
        {{ __('Gestión de Usuarios Académicos') }}
    </x-slot>

    <div class="space-y-8 animate-in fade-in slide-in-from-bottom-4 duration-700">
        <!-- Dashboard Header / Filters -->
        <div class="glass-card rounded-3xl p-6">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Directorio de Usuarios</h3>
                    <p class="text-sm text-gray-500">Administra los roles y perfiles del Sistema Académico UTP.</p>
                </div>

                <form method="GET" action="{{ route('admin.users') }}" class="flex flex-wrap items-center gap-4">
                    <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Filtrar:</span>
                    <label class="relative inline-flex items-center cursor-pointer group">
                        <input type="checkbox" name="role_student" value="1" class="hidden"
                            onchange="this.form.submit()" {{ request()->boolean('role_student') ? 'checked' : '' }}>
                        <div
                            class="px-4 py-2 rounded-xl text-sm font-bold transition-all duration-300 {{ request()->boolean('role_student') ? 'bg-blue-500 text-white shadow-lg shadow-blue-500/30' : 'bg-gray-100 text-gray-400 hover:bg-gray-200' }}">
                            Estudiantes
                        </div>
                    </label>
                    <label class="relative inline-flex items-center cursor-pointer group">
                        <input type="checkbox" name="role_advisor" value="1" class="hidden"
                            onchange="this.form.submit()" {{ request()->boolean('role_advisor') ? 'checked' : '' }}>
                        <div
                            class="px-4 py-2 rounded-xl text-sm font-bold transition-all duration-300 {{ request()->boolean('role_advisor') ? 'bg-cyber-purple-500 text-white shadow-lg shadow-cyber-purple-500/30' : 'bg-gray-100 text-gray-400 hover:bg-gray-200' }}">
                            Asesores
                        </div>
                    </label>
                </form>
            </div>
        </div>

        @if(session('success') || session('error'))
            <div
                class="glass-card px-6 py-4 rounded-2xl flex items-center space-x-3 border-l-4 {{ session('success') ? 'border-green-500 bg-green-50/50' : 'border-red-500 bg-red-50/50' }}">
                <span
                    class="{{ session('success') ? 'text-green-600' : 'text-red-600' }} font-medium">{{ session('success') ?? session('error') }}</span>
            </div>
        @endif

        <!-- Users Table -->
        <div class="glass-card rounded-3xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50/50 text-left border-b border-gray-100">
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Identidad
                                Académica</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Contacto
                            </th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Rol
                                Académico
                            </th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">ID Cédula
                            </th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">
                                Perfiles</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100/50">
                        @forelse($users as $user)
                            <tr class="hover:bg-cyber-purple-50/30 transition-colors group">
                                <td class="px-6 py-5">
                                    <div class="flex items-center space-x-4">
                                        <div
                                            class="h-10 w-10 flex-shrink-0 bg-gradient-to-tr from-cyber-purple-500 to-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xs shadow-md">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div
                                                class="font-bold text-gray-800 group-hover:text-cyber-purple-600 transition-colors">
                                                {{ $user->name }}
                                            </div>
                                            <div class="text-xs text-gray-400">Miembro desde
                                                {{ $user->created_at->format('M Y') }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="text-sm text-gray-600">{{ $user->email }}</div>
                                </td>
                                <td class="px-6 py-5">
                                    <span
                                        class="inline-flex items-center px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-tighter
                                                {{ $user->is_advisor ? 'bg-purple-100 text-purple-700 ring-1 ring-purple-200' : 'bg-blue-100 text-blue-700 ring-1 ring-blue-200' }}">
                                        {{ $user->is_advisor ? 'Investigador / Asesor' : 'Tesista / Estudiante' }}
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <code
                                        class="text-xs bg-gray-100 px-2 py-1 rounded-lg text-gray-500 font-mono">{{ $user->cedula }}</code>
                                </td>
                                <td class="px-6 py-5 text-right">
                                    <a href="{{ route('profile.public.show', $user->id) }}"
                                        class="inline-flex items-center px-4 py-2 bg-white rounded-xl text-xs font-bold text-cyber-purple-600 border border-cyber-purple-100 hover:bg-cyber-purple-500 hover:text-white transition-all duration-300 hover:shadow-lg hover:shadow-cyber-purple-500/20">
                                        Ver Expediente
                                        <svg class="w-3 h-3 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-20 text-center">
                                    <div class="text-gray-400 font-medium italic">No se encontraron usuarios con los
                                        criterios de búsqueda.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>