<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Marketplace</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 min-h-screen flex items-center justify-center">
<div class="bg-gray-800 p-8 rounded-lg shadow-md w-full max-w-md">
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-white">Panel de Administración</h1>
        <p class="text-gray-400">Acceso exclusivo para administradores</p>
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

        <div class="mb-4">
            <label for="email" class="block text-gray-300 text-sm font-bold mb-2">Correo Electrónico</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required autofocus>
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-300 text-sm font-bold mb-2">Contraseña</label>
            <input type="password" id="password" name="password"
                   class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="mb-6 flex items-center justify-between">
            <div class="flex items-center">
                <input type="checkbox" id="remember" name="remember" class="mr-2">
                <label for="remember" class="text-sm text-gray-300">Recordarme</label>
            </div>
        </div>

        <button type="submit"
                class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            Acceder al Panel
        </button>
    </form>
</div>
</body>
</html>
