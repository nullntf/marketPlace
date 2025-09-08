<nav class="bg-white shadow-md py-4 px-6">
    <div class="flex justify-between items-center">
        <!-- Logo y nombre de Marketplace -->
        <div class="flex items-center">
            <!-- Icono de tienda -->
            <svg class="w-6 h-6 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-8m-8 0H3m2 0h8M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                </path>
            </svg>
            <span class="text-xl font-bold text-gray-800">Marketplace</span>
        </div>
        <div class="flex space-x-4">
            <a href="" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">
                Tienda
            </a>
            <a href="" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">
                Chats
            </a>
            <a href="/verProductos" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">
                Productos
            </a>
            <a href="/perfilVendedor" class="text-gray-700 hover:text-blue-600 transition-colors duration-200">
                Perfil
            </a>
            <!-- Enlace de Cerrar Sesión -->
            <form method="POST" action="">
                @csrf
                <button type="submit" class="text-gray-700 hover:text-red-600 transition-colors duration-200">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </div>
</nav>
