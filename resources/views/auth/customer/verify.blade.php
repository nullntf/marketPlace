<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Email - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <div class="text-center mb-6">
        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <!--suppress HtmlDeprecatedAttribute -->
            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-gray-800">Verifica tu email</h1>
        <p class="text-gray-600 mt-2">Hemos enviado un enlace de verificación a tu correo electrónico</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <p>Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.</p>
        </div>
    @endif

    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
        <p class="text-sm text-blue-800">
            Antes de continuar, por favor verifica tu email haciendo clic en el enlace que te enviamos.
            Si no recibiste el email, puedes solicitar otro.
        </p>
    </div>

    <div class="space-y-4">
        <form method="POST" action="">
            @csrf
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Reenviar email de verificación
            </button>
        </form>

        <form method="POST" action="">
            @csrf
            <button type="submit"
                    class="w-full bg-gray-200 text-gray-700 py-2 px-4 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400">
                Cerrar Sesión
            </button>
        </form>
    </div>

    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
            ¿Necesitas ayuda? <a href="#" class="text-blue-600 hover:underline">Contáctanos</a>
        </p>
    </div>
</div>
</body>
</html>
