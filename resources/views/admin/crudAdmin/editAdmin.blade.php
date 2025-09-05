<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Administrador - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 ">

<!-- Navbar -->
@include('componentes.navbarAdmin')

<main class="min-h-screen flex items-center justify-center py-8">

<div class="bg-gray-800 p-8 rounded-lg shadow-md w-full max-w-2xl">
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-white">Editar Administrador</h1>
        <p class="text-gray-400">Modifique la información del administrador</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-900 border border-red-700 text-red-100 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label for="nombre" class="block text-gray-300 text-sm font-bold mb-2">Nombre</label>
                <input type="text" id="nombre" name="nombre" value=""
                       class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <div>
                <label for="apellido" class="block text-gray-300 text-sm font-bold mb-2">Apellido</label>
                <input type="text" id="apellido" name="apellido" value=""
                       class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>
        </div>

        <div class="mb-4">
            <label for="correo" class="block text-gray-300 text-sm font-bold mb-2">Correo Electrónico</label>
            <input type="email" id="correo" name="correo" value=""
                   class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="mb-4">
            <label for="permisos" class="block text-gray-300 text-sm font-bold mb-2">Permisos</label>
            <select id="permisos" name="permisos[]" multiple
                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <option value="usuarios">Gestión de Usuarios</option>
                <option value="productos">Gestión de Productos</option>
                <option value="pedidos">Gestión de Pedidos</option>
                <option value="configuracion">Configuración del Sistema</option>
            </select>
            <p class="text-gray-400 text-xs mt-1">Mantén presionada la tecla Ctrl para seleccionar múltiples opciones.</p>
        </div>

        <div class="mb-6">
            <label for="rol_id" class="block text-gray-300 text-sm font-bold mb-2">Rol</label>
            <select id="rol_id" name="rol_id"
                    class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                <option value="">Seleccione un rol</option>
                <option value="1">Superadministrador</option>
                <option value="2">Administrador</option>
                <option value="3">Moderador</option>
            </select>
        </div>

        <div class="flex justify-between">
            <a href="/admin" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Cancelar
            </a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Actualizar Administrador
            </button>
        </div>
    </form>
</div>
</main>
</body>
</html>
