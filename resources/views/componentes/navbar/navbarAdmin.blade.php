<nav class="bg-gray-800 shadow-md py-4 px-6">
    <div class="flex justify-between items-center">
        <div class="flex items-center">
            <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-8m-8 0H3m2 0h8M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                </path>
            </svg>
            <span class="text-xl font-bold text-white">Panel de Administración</span>
        </div>

        <div class="flex space-x-4">
            <a href="/dashboardAdmin" class="text-gray-300 hover:text-blue-600 transition-colors duration-200">
                Inicio
            </a>
            <a href="/verVendedor" class="text-gray-300 hover:text-blue-600 transition-colors duration-200">
                Gestor de Vendedores
            </a>
            <a href="/showAdmin" class="text-gray-300 hover:text-blue-600 transition-colors duration-200">
                Gestor de Administradores
            </a>
            <form method="POST" action="{{route('logout.admin')}}">
                @csrf
                <button type="submit" class="text-gray-300 hover:text-red-600 transition-colors duration-200">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </div>
</nav>
