<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Email - Marketplace Vendedor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <div class="text-center mb-6">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <!--suppress HtmlDeprecatedAttribute -->
            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
            </svg>
        </div>
        <h1 class="text-2xl font-bold text-gray-800">Verificación en Proceso</h1>
        <p class="text-gray-600 mt-2">Tu cuenta de vendedor está siendo verificada</p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <p>Se ha enviado un nuevo enlace de verificación a tu dirección de correo electrónico.</p>
        </div>
    @endif

    <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
        <p class="text-sm text-green-800">
            Hemos enviado un enlace de verificación a tu correo electrónico.
            Además, tu cuenta de vendedor está pendiente de aprobación por parte de nuestros administradores.
        </p>
    </div>

    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
        <p class="text-sm text-yellow-800">
            Una vez verificado tu email y aprobada tu cuenta, podrás comenzar a publicar productos y gestionar tu negocio.
        </p>
    </div>

    <div class="space-y-4">
        <form method="POST" action="">
            @csrf
            <button type="submit"
                    class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
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
            ¿Tienes preguntas? <a href="#" class="text-green-600 hover:underline">Soporte para vendedores</a>
        </p>
    </div>
</div>
</body>
</html>
