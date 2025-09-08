{{-- Componente de Información de Producto --}}
<div class="bg-white rounded-lg shadow-md overflow-hidden max-w-2xl mx-auto p-6">
    <!-- Imagen del Producto -->
    <div class="h-64 bg-gray-200 flex items-center justify-center mb-6 rounded-lg">
        {{-- <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="h-full w-full object-cover"> --}}
        <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
    </div>

    <!-- Nombre del Producto -->
    <h1 class="text-3xl font-bold text-gray-800 mb-2">
        {{-- {{ $producto->nombre }} --}} Verdura
    </h1>

    <!-- Vendedor -->
    <div class="flex items-center mb-4">
        <svg class="w-6 h-6 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
        </svg>
        <span class="text-xl text-gray-700">
            {{-- {{ $producto->vendedor->nombre }} --}} Don Carlos
        </span>
    </div>

    <!-- Descripción -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Descripción</h2>
        <p class="text-gray-600">
            {{-- {{ $producto->descripcion }} --}}
            Hola soy Don Carlos, un agricultor 100% Santaneco, con deseo de llevar a mi gente la mejor calidad y los mejores precios.
            Les tengo verduras frescas a $2.00 la 4 Libras, de lo que usted quiera corazon.
            Escríbame sera un Gusto Atenderle.
        </p>
    </div>

    <!-- Precio -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Precio</h2>
        <p class="text-2xl text-blue-600 font-bold">
            {{-- ${{ number_format($producto->precio, 2) }} --}} $2.00
        </p>
    </div>

    <!-- Ubicación -->
    <div class="mb-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Ubicación</h2>
        <div class="flex items-center">
            <svg class="w-6 h-6 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span class="text-xl text-gray-700">
                {{-- {{ $producto->ubicacion }} --}} Santa Ana
            </span>
        </div>
    </div>
</div>
