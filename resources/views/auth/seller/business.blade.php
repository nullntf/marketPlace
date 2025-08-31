<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completar Información del Negocio - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center py-8">
<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-4xl">
    <div class="text-center mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Completar Información del Negocio</h1>
        <p class="text-gray-600">Completa los detalles de tu negocio para comenzar a vender</p>
        <div class="w-full bg-gray-200 rounded-full h-2 mt-4">
            <div class="bg-green-600 h-2 rounded-full" style="width: 50%"></div>
        </div>
    </div>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Información Básica del Negocio -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Información Básica</h3>

                <div class="mb-4">
                    <label for="business_name" class="block text-gray-700 text-sm font-bold mb-2">Nombre del Negocio *</label>
                    <input type="text" id="business_name" name="business_name" value="{{ old('business_name', $business->name ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                           required>
                </div>

                <div class="mb-4">
                    <label for="business_phone" class="block text-gray-700 text-sm font-bold mb-2">Teléfono del Negocio *</label>
                    <input type="tel" id="business_phone" name="business_phone" value="{{ old('business_phone', $business->phone ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                           required>
                </div>

                <div class="mb-4">
                    <label for="business_email" class="block text-gray-700 text-sm font-bold mb-2">Email del Negocio</label>
                    <input type="email" id="business_email" name="business_email" value="{{ old('business_email', $business->email ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>

                <div class="mb-4">
                    <label for="business_website" class="block text-gray-700 text-sm font-bold mb-2">Sitio Web</label>
                    <input type="url" id="business_website" name="business_website" value="{{ old('business_website', $business->website ?? '') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                           placeholder="https://">
                </div>
            </div>

            <!-- Ubicación y Contacto -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Ubicación y Contacto</h3>

                <div class="mb-4">
                    <label for="business_address" class="block text-gray-700 text-sm font-bold mb-2">Dirección Completa *</label>
                    <textarea id="business_address" name="business_address" rows="3"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                              required>{{ old('business_address', $business->address ?? '') }}</textarea>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="business_city" class="block text-gray-700 text-sm font-bold mb-2">Ciudad *</label>
                        <input type="text" id="business_city" name="business_city" value="{{ old('business_city', $business->city ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                               required>
                    </div>
                    <div>
                        <label for="business_zip_code" class="block text-gray-700 text-sm font-bold mb-2">Código Postal</label>
                        <input type="text" id="business_zip_code" name="business_zip_code" value="{{ old('business_zip_code', $business->zip_code ?? '') }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="business_country" class="block text-gray-700 text-sm font-bold mb-2">País *</label>
                    <select id="business_country" name="business_country"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500" required>
                        <option value="">Seleccionar país</option>
                        <option value="AR" {{ old('business_country', $business->country ?? '') == 'AR' ? 'selected' : '' }}>Argentina</option>
                        <option value="MX" {{ old('business_country', $business->country ?? '') == 'MX' ? 'selected' : '' }}>México</option>
                        <option value="ES" {{ old('business_country', $business->country ?? '') == 'ES' ? 'selected' : '' }}>España</option>
                        <option value="CO" {{ old('business_country', $business->country ?? '') == 'CO' ? 'selected' : '' }}>Colombia</option>
                        <!-- Agregar más países según necesidad -->
                    </select>
                </div>
            </div>
        </div>

        <!-- Descripción y Imágenes -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Descripción e Imágenes</h3>

            <div class="mb-4">
                <label for="business_description" class="block text-gray-700 text-sm font-bold mb-2">Descripción del Negocio *</label>
                <textarea id="business_description" name="business_description" rows="4"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                          required>{{ old('business_description', $business->description ?? '') }}</textarea>
                <p class="text-xs text-gray-500 mt-1">Describe los productos o servicios que ofreces</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                <div>
                    <label for="business_logo" class="block text-gray-700 text-sm font-bold mb-2">Logo del Negocio</label>
                    <input type="file" id="business_logo" name="business_logo"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                           accept="image/*">
                    @if(isset($business) && $business->logo)
                        <p class="text-xs text-green-600 mt-1">Ya tienes un logo subido</p>
                    @endif
                </div>
                <div>
                    <label for="business_banner" class="block text-gray-700 text-sm font-bold mb-2">Banner del Negocio</label>
                    <input type="file" id="business_banner" name="business_banner"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
                           accept="image/*">
                </div>
            </div>
        </div>

        <!-- Horario de Atención -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 border-b pb-2">Horario de Atención</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="business_opening_time" class="block text-gray-700 text-sm font-bold mb-2">Hora de Apertura</label>
                    <input type="time" id="business_opening_time" name="business_opening_time"
                           value="{{ old('business_opening_time', $business->opening_time ?? '09:00') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label for="business_closing_time" class="block text-gray-700 text-sm font-bold mb-2">Hora de Cierre</label>
                    <input type="time" id="business_closing_time" name="business_closing_time"
                           value="{{ old('business_closing_time', $business->closing_time ?? '18:00') }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center mt-8">
            <a href=""
               class="bg-gray-300 text-gray-700 py-2 px-6 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400">
                Completar después
            </a>
            <button type="submit"
                    class="bg-green-600 text-white py-2 px-6 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                Guardar Información
            </button>
        </div>
    </form>
</div>
</body>
</html>
