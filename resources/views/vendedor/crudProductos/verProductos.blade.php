<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Productos - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
@include('componentes.navbar.navbarVendedor')

<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Mis Productos</h1>
        <a href="/crearProducto" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
            Agregar Producto
        </a>
    </div>

    {{-- Mensajes de éxito o error --}}
    {{--
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif
    --}}

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        {{-- Lógica para mostrar productos --}}
        {{--
        @if($productos->count() > 0)
        --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-6">
            {{--
            @foreach($productos as $producto)
            --}}

            <!-- Tarjeta de Producto -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    {{-- Imagen del producto --}}
                    {{--
                    @if($producto->imagen)
                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="{{ $producto->nombre }}" class="h-full w-full object-cover">
                    @else
                    --}}
                    <svg class="w-16 h-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{--
                    @endif
                    --}}
                </div>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">
                        {{-- {{ $producto->nombre }} --}} Verdura Fresca
                    </h3>
                    <p class="text-gray-600 mb-2">
                        <span class="font-medium">Precio:</span>
                        {{-- S/ {{ number_format($producto->precio, 2) }} --}} S/ 2.00
                    </p>
                    <div class="flex justify-between">
                        <a href="{{-- route('productos.edit', $producto->id) --}} /editarProducto" class="text-blue-600 hover:text-blue-800">
                            Editar
                        </a>
                        <form action="{{-- route('productos.destroy', $producto->id) --}}" method="POST">
                            {{--
                            @csrf
                            @method('DELETE')
                            --}}
                            <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('¿Estás seguro de eliminar este producto?')">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{--
            @endforeach
            --}}
        </div>
        {{--
        @else
        --}}
        <div class="p-8 text-center">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-16M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <p class="text-gray-600 text-lg">No tienes productos registrados.</p>
            <a href="{{-- route('productos.create') --}}" class="inline-block mt-4 bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                Agregar tu primer producto
            </a>
        </div>
        {{--
        @endif
        --}}
    </div>
</div>
</body>
</html>
