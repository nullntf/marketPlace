<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
@include('componentes.navbar.navbarVendedor')

<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Agregar Nuevo Producto</h1>

        {{-- Mensajes de error --}}
        {{--
        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        --}}

        <form action="{{-- route('productos.store') --}}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg p-6">
            {{--
            @csrf
            --}}

            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre del Producto</label>
                <input type="text" id="nombre" name="nombre" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Ej: Tomates orgánicos" required>
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 font-medium mb-2">Descripción</label>
                <textarea id="descripcion" name="descripcion" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                          placeholder="Describe tu producto..." required></textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="precio" class="block text-gray-700 font-medium mb-2">Precio (S/)</label>
                    <input type="number" id="precio" name="precio" step="0.01" min="0" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           placeholder="0.00" required>
                </div>
            </div>

            <div class="mb-4">
                <label for="categoria" class="block text-gray-700 font-medium mb-2">Categoría</label>
                <select id="categoria" name="categoria_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Seleccione una categoría</option>
                    {{--
                    @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                    @endforeach
                    --}}
                </select>
            </div>

            <div class="mb-6">
                <label for="imagen" class="block text-gray-700 font-medium mb-2">Imagen del Producto</label>
                <input type="file" id="imagen" name="imagen" accept="image/*" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <p class="text-sm text-gray-500 mt-1">Suba una imagen que muestre claramente su producto.</p>
            </div>

            <div class="flex justify-between">
                <a href="{{-- route('productos.index') --}}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-400 transition-colors">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors">
                    Guardar Producto
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
