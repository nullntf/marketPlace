<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Administradores - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-900 min-h-screen">
<!-- Navbar -->
@include('componentes.navbarAdmin')

<!-- Main Content -->
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-2xl font-bold text-white">Gestión de Administradores</h1>
        <a href="/createAdmin" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            <i class="fas fa-plus mr-2"></i> Nuevo Administrador
        </a>
    </div>

    <!-- Table -->
    <div class="bg-gray-800 rounded-lg shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-700">
            <thead class="bg-gray-700">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Nombre</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Correo</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Permisos</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Rol</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-300 uppercase tracking-wider">Acciones</th>
            </tr>
            </thead>
            <tbody class="bg-gray-800 divide-y divide-gray-700">
            <!-- Ejemplo de fila (esto se repetirá dinámicamente con Blade) -->
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-white">Juan Pérez</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-300">juan@marketplace.com</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Usuarios, Productos
                            </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Superadmin</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="editAdmin" class="text-blue-500 hover:text-blue-700 mr-3">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="#" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-trash"></i> Eliminar
                    </a>
                </td>
            </tr>

            <!-- Otra fila de ejemplo -->
            <tr>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm font-medium text-white">María García</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-300">maria@marketplace.com</div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                Productos
                            </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-300">Admin</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <a href="/admin/2/edit" class="text-blue-500 hover:text-blue-700 mr-3">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <a href="#" class="text-red-500 hover:text-red-700">
                        <i class="fas fa-trash"></i> Eliminar
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>

    <!-- Paginación (ejemplo) -->
    <div class="bg-gray-800 px-4 py-3 flex items-center justify-between border-t border-gray-700 mt-4 rounded-lg">
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-400">
                    Mostrando
                    <span class="font-medium">1</span>
                    a
                    <span class="font-medium">2</span>
                    de
                    <span class="font-medium">2</span>
                    resultados
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-600 bg-gray-700 text-sm font-medium text-gray-300 hover:bg-gray-600">
                        <span class="sr-only">Anterior</span>
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-600 bg-blue-600 text-sm font-medium text-white">
                        1
                    </a>
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-600 bg-gray-700 text-sm font-medium text-gray-300 hover:bg-gray-600">
                        <span class="sr-only">Siguiente</span>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Scripts para funcionalidades -->
<script>
    // Aquí irá la lógica JavaScript para eliminar administradores con confirmación
    document.addEventListener('DOMContentLoaded', function() {
        const deleteButtons = document.querySelectorAll('a[href="#"]');

        deleteButtons.forEach(button => {
            if (button.innerHTML.includes('Eliminar')) {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    if (confirm('¿Estás seguro de que deseas eliminar este administrador?')) {
                        // Lógica para eliminar el administrador
                        // window.location.href = '/admin/' + adminId + '/delete';
                        console.log('Administrador eliminado');
                    }
                });
            }
        });
    });
</script>
</body>
</html>
