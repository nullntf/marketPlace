<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
<!-- Navbar -->
@include('componentes.navbar.navbarVendedor')

<div class="container mx-auto px-4 py-8 max-w-4xl">
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-gray-800">Editar Perfil</h1>
            <p class="text-gray-600">Actualiza la información de tu perfil y negocio</p>
        </div>

        {{-- Mensajes de error --}}
        {{--
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        --}}

        <form method="POST" action="{{-- route('vendedor.perfil.update') --}}" enctype="multipart/form-data">
            {{-- @csrf
            @method('PUT') --}}

            <!-- Sección de imagen de perfil -->
            <div class="mb-8 text-center">
                <div class="relative inline-block">
                    <div class="h-32 w-32 rounded-full border-4 border-white bg-white overflow-hidden shadow-lg mx-auto">
                        {{-- @if($vendedor->imagen_perfil) --}}
                        {{-- <img src="{{ asset('storage/' . $vendedor->imagen_perfil) }}" alt="Imagen de perfil" class="h-full w-full object-cover"> --}}
                        {{-- @else --}}
                        <div class="h-full w-full bg-gray-300 flex items-center justify-center">
                            <i class="fas fa-user text-4xl text-gray-600"></i>
                        </div>
                        {{-- @endif --}}
                    </div>
                    <label for="imagen_perfil" class="absolute bottom-0 right-0 bg-blue-600 text-white p-2 rounded-full cursor-pointer">
                        <i class="fas fa-camera"></i>
                        <input type="file" id="imagen_perfil" name="imagen_perfil" class="hidden" accept="image/*">
                    </label>
                </div>
                <p class="text-sm text-gray-500 mt-2">Haz clic en la cámara para cambiar tu foto de perfil</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Información Personal -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Información Personal</h3>

                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre completo *</label>
                        <input type="text" id="name" name="name" value="{{-- $vendedor->name --}} Juan Pérez"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required autofocus>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico *</label>
                        <input type="email" id="email" name="email" value="{{-- $vendedor->email --}} juan@marketplace.com"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Teléfono *</label>
                        <input type="tel" id="phone" name="phone" value="{{-- $vendedor->phone --}} +1234567890"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>
                </div>

                <!-- Información del Negocio -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Información del Negocio</h3>

                    <div class="mb-4">
                        <label for="business_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Negocio *</label>
                        <input type="text" id="business_name" name="business_name" value="{{-- $vendedor->business_name --}} Verduras Don Juan"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="business_phone" class="block text-gray-700 text-sm font-bold mb-2">Teléfono del Negocio *</label>
                        <input type="tel" id="business_phone" name="business_phone" value="{{-- $vendedor->business_phone --}} +1234567890"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="ubicacion" class="block text-gray-700 text-sm font-bold mb-2">Ubicación *</label>
                        <select id="ubicacion" name="ubicacion" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Seleccione una ubicación</option>
                            {{-- @foreach($ubicaciones as $ubicacion) --}}
                            {{-- <option value="{{ $ubicacion->id }}" {{ $vendedor->ubicacion_id == $ubicacion->id ? 'selected' : '' }}>{{ $ubicacion->nombre }}</option> --}}
                            {{-- @endforeach --}}
                            <option value="1" selected>Santa Ana</option>
                            <option value="2">Don Carlos</option>
                            <option value="3">Don Chepe</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mb-4 mt-6">
                <label for="business_address" class="block text-gray-700 text-sm font-bold mb-2">Dirección del Negocio *</label>
                <textarea id="business_address" name="business_address" rows="2"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                          required>{{-- $vendedor->business_address --}} Calle Principal #123, Santa Ana</textarea>
            </div>

            <div class="mb-6">
                <label for="business_description" class="block text-gray-700 text-sm font-bold mb-2">Descripción del Negocio</label>
                <textarea id="business_description" name="business_description" rows="3"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{-- $vendedor->business_description --}} Ofrecemos las mejores verduras orgánicas de la región, cultivadas con amor y cuidado para nuestros clientes.</textarea>
            </div>

            <div class="mb-6">
                <label for="horario_atencion" class="block text-gray-700 text-sm font-bold mb-2">Horario de Atención</label>
                <input type="text" id="horario_atencion" name="horario_atencion" value="{{-- $vendedor->horario_atencion --}} Lunes a Sábado: 8:00 AM - 6:00 PM"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                       placeholder="Ej: Lunes a Viernes: 8:00 AM - 5:00 PM">
            </div>

            <!-- Cambio de contraseña (opcional) -->
            <div class="border-t border-gray-200 pt-6 mb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Cambio de Contraseña</h3>
                <p class="text-sm text-gray-500 mb-4">Deja estos campos en blanco si no deseas cambiar la contraseña</p>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Nueva Contraseña</label>
                        <input type="password" id="password" name="password"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirmar Nueva Contraseña</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
            </div>

            <div class="flex justify-between">
                <a href="{{-- route('vendedor.perfil') --}}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
