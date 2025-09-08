<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Vendedor - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
    <div class="text-center mb-6">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
            <!-- Icono de contacto/información -->
            <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
            </svg>
        </div>
        <a href="/register" class="inline-block mb-4 text-blue-600 hover:underline">
            &larr; Volver a selección
        </a>
        <h1 class="text-2xl font-bold text-gray-800">Registro de Vendedor</h1>
        <p class="text-gray-600 mt-2">Contacta a la Unidad de Agricultura y Ganadería</p>
    </div>

    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
        <p class="text-sm text-blue-800">
            Para registrarte como vendedor en nuestro marketplace, debes contactar a la
            <span class="font-semibold">Unidad de Agricultura y Ganadería de la Alcaldía de Santa Ana</span>.
        </p>
    </div>

    <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-6">
        <h2 class="font-bold text-green-800 text-lg mb-2">Información de Contacto</h2>
        <ul class="text-sm text-green-800 space-y-2">
            <li class="flex items-start">
                <svg class="w-5 h-5 text-green-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                </svg>
                <span>Teléfono: <a href="tel:+50324405500" class="font-semibold underline">2440-5500</a> (Ext. 123)</span>
            </li>
            <li class="flex items-start">
                <svg class="w-5 h-5 text-green-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                <span>Email: <a href="mailto:agricultura@santaana.gob.sv" class="font-semibold underline">agricultura@santaana.gob.sv</a></span>
            </li>
            <li class="flex items-start">
                <svg class="w-5 h-5 text-green-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span>Dirección: Alcaldía Municipal de Santa Ana, 2a Calle Oriente y 2a Avenida Sur, Santa Ana</span>
            </li>
            <li class="flex items-start">
                <svg class="w-5 h-5 text-green-600 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span>Horario de atención: Lunes a Viernes de 8:00 AM a 4:00 PM</span>
            </li>
        </ul>
    </div>

    <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
        <p class="text-sm text-yellow-800">
            Una vez contactes a la Unidad de Agricultura y Ganadería y completes tu registro, podrás comenzar a publicar productos y gestionar tu negocio en nuestro marketplace.
        </p>
    </div>

    <div class="mt-6 text-center">
        <p class="text-gray-600">¿Ya tienes una cuenta?
            <a href="/login" class="text-blue-600 hover:underline">Inicia sesión aquí</a>
        </p>
    </div>

    <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
            ¿Necesitas más información? <a href="#" class="text-green-600 hover:underline">Consulta nuestras preguntas frecuentes</a>
        </p>
    </div>
</div>
</body>
</html>
