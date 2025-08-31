<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Marketplace</h1>
        <p class="text-gray-600">Crea tu cuenta</p>
    </div>

    <div class="mb-6">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Selecciona el tipo de cuenta</h2>

        <div class="grid grid-cols-2 gap-4">
            <!-- Tarjeta Customer -->
            <a href="/registerCustomer"
               class="border-2 border-gray-200 rounded-lg p-4 text-center hover:border-blue-500 hover:bg-blue-50 transition-colors">
                <div class="mb-3">
                    <!--suppress HtmlDeprecatedAttribute -->
                    <svg  class="w-12 h-12 mx-auto text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-800">Cliente</h3>
                <p class="text-sm text-gray-600 mt-1">Quiero comprar productos</p>
            </a>

            <!-- Tarjeta Seller -->
            <a href="/registerSeller"
               class="border-2 border-gray-200 rounded-lg p-4 text-center hover:border-green-500 hover:bg-green-50 transition-colors">
                <div class="mb-3">
                    <!--suppress HtmlDeprecatedAttribute -->
                    <svg class="w-12 h-12 mx-auto text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-8m-8 0H3m2 0h8M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-800">Vendedor</h3>
                <p class="text-sm text-gray-600 mt-1">Quiero vender productos</p>
            </a>
        </div>
    </div>

    <div class="text-center">
        <p class="text-gray-600">¿Ya tienes una cuenta?
            <a href="/login" class="text-blue-600 hover:underline">Inicia sesión aquí</a>
        </p>
    </div>
</div>
</body>
</html>
