<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Vendedor - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-8">
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-2xl">
    <div class="text-center mb-6">
        <a href="/register" class="inline-block mb-4 text-blue-600 hover:underline">
            &larr; Volver a selección
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Registro de Vendedor</h1>
        <p class="text-gray-600">Completa la información para crear tu cuenta de vendedor</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Información Personal -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Información Personal</h3>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre completo *</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required autofocus>
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Correo Electrónico *</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required>
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Teléfono *</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required>
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Contraseña *</label>
                    <input type="password" id="password" name="password"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required>
                    <p class="text-xs text-gray-500 mt-1">Mínimo 8 caracteres</p>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirmar Contraseña *</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required>
                </div>
            </div>

            <!-- Información del Negocio -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Información del Negocio</h3>

                <div class="mb-4">
                    <label for="business_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Negocio *</label>
                    <input type="text" id="business_name" name="business_name" value="{{ old('business_name') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           required>
                </div>

                <div class="mb-4">
                    <label for="business_description" class="block text-gray-700 text-sm font-bold mb-2">Descripción del Negocio</label>
                    <textarea id="business_description" name="business_description" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('business_description') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="business_address" class="block text-gray-700 text-sm font-bold mb-2">Dirección del Negocio *</label>
                    <textarea id="business_address" name="business_address" rows="2"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                              required>{{ old('business_address') }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="business_logo" class="block text-gray-700 text-sm font-bold mb-2">Logo del Negocio</label>
                    <input type="file" id="business_logo" name="business_logo"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                           accept="image/*">
                </div>
            </div>
        </div>

        <div class="mt-6 mb-6">
            <label class="flex items-start">
                <input type="checkbox" name="terms" class="form-checkbox mt-1" required>
                <span class="ml-2 text-sm text-gray-700">
                        Acepto los <a href="#" class="text-blue-600 hover:underline">términos y condiciones</a>, la <a href="#" class="text-blue-600 hover:underline">política de privacidad</a> y comprendo que mi cuenta debe ser aprobada por un administrador antes de poder publicar productos.
                    </span>
            </label>
        </div>

        <button type="submit"
                class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
            Solicitar Registro como Vendedor
        </button>
    </form>

    <div class="mt-6 text-center">
        <p class="text-gray-600">¿Ya tienes una cuenta?
            <a href="/login" class="text-blue-600 hover:underline">Inicia sesión aquí</a>
        </p>
    </div>
</div>
</body>
</html>
