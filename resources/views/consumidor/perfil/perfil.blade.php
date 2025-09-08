<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Vendedor - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">

@include('componentes.navbar.navbarVendedor')
<!-- Navbar -->
{{-- Incluir navbar según el tipo de usuario --}}
{{-- @auth --}}
{{-- @if(auth()->user()->role === 'vendedor') --}}
{{-- @include('componentes.navbar.navbarVendedor') --}}
{{-- @elseif(auth()->user()->role === 'consumidor') --}}
{{-- @include('componentes.navbar.navbarConsumidor') --}}
{{-- @endif --}}
{{-- @endauth --}}

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <!-- Banner de perfil -->
    <div class="relative h-48 w-full rounded-t-lg overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-green-400 to-blue-500"></div>
        <div class="absolute bottom-4 left-6 flex items-end">
            <!-- Imagen de perfil -->
            <div class="h-32 w-32 rounded-full border-4 border-white bg-white overflow-hidden shadow-lg">
                {{-- <img src="{{ asset('storage/' . $vendedor->imagen_perfil) }}" alt="Imagen de perfil" class="h-full w-full object-cover"> --}}
                <div class="h-full w-full bg-gray-300 flex items-center justify-center">
                    <i class="fas fa-user text-4xl text-gray-600"></i>
                </div>
            </div>
            <div class="ml-4 text-white mb-2">
                <h1 class="text-2xl font-bold">{{-- $vendedor->name --}} Juan Pérez</h1>
                <p class="text-lg">{{-- $vendedor->business_name --}} Verduras Don Juan</p>
            </div>
        </div>
    </div>

    <!-- Contenido principal -->
    <div class="bg-white rounded-b-lg shadow-md p-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Información del vendedor -->
            <div class="md:col-span-2">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Información del Vendedor</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Nombre completo</h3>
                        <p class="text-gray-800">{{-- $vendedor->name --}} Juan Pérez</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Correo electrónico</h3>
                        <p class="text-gray-800">{{-- $vendedor->email --}} juan@marketplace.com</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Teléfono</h3>
                        <p class="text-gray-800">{{-- $vendedor->phone --}} +1234567890</p>
                    </div>
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Nombre del negocio</h3>
                        <p class="text-gray-800">{{-- $vendedor->business_name --}} Verduras Don Juan</p>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500">Dirección del negocio</h3>
                    <p class="text-gray-800">{{-- $vendedor->business_address --}} Calle Principal #123, Santa Ana</p>
                </div>

                <div class="mb-6">
                    <h3 class="text-sm font-medium text-gray-500">Descripción del negocio</h3>
                    <p class="text-gray-800">{{-- $vendedor->business_description --}} Ofrecemos las mejores verduras orgánicas de la región, cultivadas con amor y cuidado para nuestros clientes.</p>
                </div>
            </div>

            <!-- Información de contacto y estadísticas -->
            <div class="bg-gray-50 rounded-lg p-4">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Contacto y Estadísticas</h2>

                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-500">Ubicación</h3>
                    <p class="text-gray-800 flex items-center">
                        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                        {{-- $vendedor->ubicacion --}} Santa Ana
                    </p>
                </div>

                <div class="mb-4">
                    <h3 class="text-sm font-medium text-gray-500">Teléfono del negocio</h3>
                    <p class="text-gray-800 flex items-center">
                        <i class="fas fa-phone text-blue-500 mr-2"></i>
                        {{-- $vendedor->business_phone --}} +1234567890
                    </p>
                </div>

                <!-- Botón de contacto (visible para consumidores) -->
                {{-- @auth --}}
                {{-- @if(auth()->user()->role === 'consumidor') --}}
                <div class="mt-6">
                    <button class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-md flex items-center justify-center">
                        <i class="fas fa-comment mr-2"></i> Contactar al Vendedor
                    </button>
                </div>
                {{-- @endif --}}
                {{-- @endauth --}}
            </div>
        </div>

        {{-- Botón de editar perfil (solo visible para el vendedor dueño del perfil) --}}
        {{-- @auth --}}
        {{-- @if(auth()->user()->role === 'vendedor' && auth()->user()->id === $vendedor->id) --}}
        <div class="mt-6 border-t border-gray-200 pt-4 flex justify-end">
            <a href="{{-- route('vendedor.perfil.edit') --}}/editarPerfil" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-md flex items-center">
                <i class="fas fa-edit mr-2"></i> Editar Perfil
            </a>
        </div>
        {{-- @endif --}}
        {{-- @endauth --}}
    </div>
</div>
</body>
</html>
