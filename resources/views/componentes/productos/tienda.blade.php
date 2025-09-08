<!-- Componente de Lista de Productos con Filtros y Modal -->
<div class="flex min-h-screen bg-gray-100" id="tienda-component">
    <!-- Aside de Filtros -->
    <aside class="w-64 bg-white shadow-md p-6">
        <!-- Buscador -->
        <div class="mb-6">
            <input
                type="text"
                placeholder="Buscar Producto, Vendedor..."
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <!-- Filtro de Ubicación -->
        <div class="mb-6">
            <h3 class="font-semibold text-gray-700 mb-2">Ubicación</h3>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Seleccione una Ubicación</option>
                {{-- Lógica para mostrar ubicaciones disponibles --}}
                {{-- @foreach($ubicaciones as $ubicacion) --}}
                {{-- <option value="{{ $ubicacion->id }}">{{ $ubicacion->nombre }}</option> --}}
                {{-- @endforeach --}}
            </select>
        </div>

        <!-- Filtro de Categoría -->
        <div class="mb-6">
            <h3 class="font-semibold text-gray-700 mb-2">Categoría</h3>
            <select class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="">Seleccione una Categoría</option>
                {{-- Lógica para mostrar categorías disponibles --}}
                {{-- @foreach($categorias as $categoria) --}}
                {{-- <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option> --}}
                {{-- @endforeach --}}
            </select>
        </div>

        <!-- Filtro de Precio por Rango -->
        <div class="mb-6">
            <h3 class="font-semibold text-gray-700 mb-2">Precio</h3>
            <div class="flex space-x-2">
                <input
                    type="number"
                    placeholder="De $"
                    min="0"
                    class="w-1/2 px-2 py-1 border border-gray-300 rounded-md"
                >
                <input
                    type="number"
                    placeholder="A $"
                    min="0"
                    class="w-1/2 px-2 py-1 border border-gray-300 rounded-md"
                >
            </div>
        </div>

        <!-- Botón de Aplicar Filtros -->
        <button class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition-colors">
            Aplicar Filtros
        </button>
    </aside>

    <!-- Sección Principal de Productos -->
    <main class="flex-1 p-6">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Productos Disponibles</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Lógica para mostrar productos --}}
            {{-- @foreach($productos as $producto) --}}

            <!-- Ejemplo de Tarjeta de Producto (repetir para cada producto) -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:scale-105 cursor-pointer product-card"
                 data-name="Verdura"
                 data-seller="Don Carlos"
                 data-description="Hola soy Don Carlos, un agricultor 100% Santaneco, con deseo de llevar a mi gente la mejor calidad y los mejores precios. Les tengo verduras frescas a $2.00 la 4 Libras, de lo que usted quiera corazon. Escríbame sera un Gusto Atenderle."
                 data-price="2.00"
                 data-location="Santa Ana">
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    {{-- Imagen del producto --}}
                    {{-- <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="h-full w-full object-cover"> --}}
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-lg font-semibold text-gray-800">
                            {{-- {{ $producto->nombre }} --}} Verdura
                        </h3>
                        <span class="text-blue-600 font-bold">
                                {{-- S/ {{ number_format($producto->precio, 2) }} --}} S/ 2.00
                            </span>
                    </div>
                    <p class="text-gray-600 mb-2">
                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        {{-- {{ $producto->ubicacion }} --}} Santa Ana
                    </p>
                    <p class="text-gray-600">
                        <svg class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        {{-- {{ $producto->vendedor->nombre }} --}} Don Carlos
                    </p>
                </div>
            </div>

            {{-- @endforeach --}}
        </div>

        {{-- Lógica para paginación --}}
        {{-- @if($productos->hasPages()) --}}
        <div class="mt-8 flex justify-center">
            <nav class="inline-flex rounded-md shadow">
                {{-- {{ $productos->links() }} --}}
                <!-- Ejemplo de paginación (reemplazar con la paginación real) -->
                <a href="#" class="py-2 px-4 border border-gray-300 bg-white text-blue-600 hover:bg-gray-50 rounded-l-md">
                    Anterior
                </a>
                <a href="#" class="py-2 px-4 border border-gray-300 bg-white text-blue-600 hover:bg-gray-50">
                    1
                </a>
                <a href="#" class="py-2 px-4 border border-gray-300 bg-white text-blue-600 hover:bg-gray-50 rounded-r-md">
                    Siguiente
                </a>
            </nav>
        </div>
        {{-- @endif --}}
    </main>
</div>

<!-- Modal de Información de Producto -->
<div id="productModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-lg shadow-md overflow-hidden max-w-2xl w-full mx-4 max-h-screen overflow-y-auto">
        <div class="p-6">
            <!-- Botón para cerrar el modal -->
            <div class="flex justify-end mb-4">
                <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Contenido del modal -->
            <div class="h-64 bg-gray-200 flex items-center justify-center mb-6 rounded-lg">
                <svg class="w-24 h-24 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>

            <!-- Nombre del Producto -->
            <h1 id="modalProductName" class="text-3xl font-bold text-gray-800 mb-2">Verdura</h1>

            <!-- Vendedor -->
            <div class="flex items-center mb-4">
                <svg class="w-6 h-6 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span id="modalSeller" class="text-xl text-gray-700">Don Carlos</span>
            </div>

            <!-- Descripción -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Descripción</h2>
                <p id="modalDescription" class="text-gray-600">
                    Hola soy Don Carlos, un agricultor 100% Santaneco, con deseo de llevar a mi gente la mejor calidad y los mejores precios.
                    Les tengo verduras frescas a $2.00 la 4 Libras, de lo que usted quiera corazon.
                    Escríbame sera un Gusto Atenderle.
                </p>
            </div>

            <!-- Precio -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Precio</h2>
                <p id="modalPrice" class="text-2xl text-blue-600 font-bold">$2.00</p>
            </div>

            <!-- Ubicación -->
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-2">Ubicación</h2>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                    <span id="modalLocation" class="text-xl text-gray-700">Santa Ana</span>
                </div>
            </div>

            <!-- Botón para iniciar chat -->
            <button class="w-full bg-green-500 text-white py-3 rounded-md hover:bg-green-600 transition-colors">
                Iniciar Chat
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Seleccionar todas las tarjetas de producto
        const productCards = document.querySelectorAll('.product-card');
        const modal = document.getElementById('productModal');
        const closeModal = document.getElementById('closeModal');

        // Elementos del modal
        const modalProductName = document.getElementById('modalProductName');
        const modalSeller = document.getElementById('modalSeller');
        const modalDescription = document.getElementById('modalDescription');
        const modalPrice = document.getElementById('modalPrice');
        const modalLocation = document.getElementById('modalLocation');

        // Agregar evento de clic a cada tarjeta de producto
        productCards.forEach(card => {
            card.addEventListener('click', function() {
                // Obtener datos de la tarjeta
                const productName = this.getAttribute('data-name');
                const seller = this.getAttribute('data-seller');
                const description = this.getAttribute('data-description');
                const price = this.getAttribute('data-price');
                const location = this.getAttribute('data-location');

                // Llenar el modal con los datos
                modalProductName.textContent = productName;
                modalSeller.textContent = seller;
                modalDescription.textContent = description;
                modalPrice.textContent = `$${price}`;
                modalLocation.textContent = location;

                // Mostrar el modal
                modal.classList.remove('hidden');
            });
        });

        // Cerrar modal al hacer clic en el botón de cerrar
        closeModal.addEventListener('click', function() {
            modal.classList.add('hidden');
        });

        // Cerrar modal al hacer clic fuera del contenido
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });

        // Cerrar modal con la tecla Escape
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                modal.classList.add('hidden');
            }
        });
    });
</script>
