<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Vendedor - Marketplace</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-900 ">

<!-- Navbar -->
@include('componentes.navbar.navbarAdmin')

<main class="min-h-screen flex items-center justify-center py-8">

    <div class="bg-gray-800 p-8 rounded-lg shadow-md w-full max-w-4xl">
        <div class="text-center mb-8">
            <h1 class="text-2xl font-bold text-white">Crear Nuevo Vendedor</h1>
            <p class="text-gray-400">Complete la información del nuevo vendedor</p>
        </div>

        {{-- Mensajes de error --}}
        {{--
        @if ($errors->any())
            <div class="bg-red-900 border border-red-700 text-red-100 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        --}}

        <form method="POST" action="{{route('crear.vendedor')}}" enctype="multipart/form-data">
             @csrf
as
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Información Personal -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4 border-b border-gray-700 pb-2">Información Personal</h3>

                    <div class="mb-4">
                        <label for="name" class="block text-gray-300 text-sm font-bold mb-2">Nombre completo *</label>
                        <input type="text" id="name" name="nombre_vendedor" value="{{old('nombre_vendedor')}}"
                               class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required autofocus>
                    </div>

                     <div class="mb-4">
                        <label for="dui" class="block text-gray-300 text-sm font-bold mb-2">Dui *</label>
                        <input type="text" id="dui" name="dui" value="{{old('dui')}}"
                               class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required autofocus>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-300 text-sm font-bold mb-2">Correo Electrónico *</label>
                        <input type="email" id="email" name="correo" value="{{old('correo')}}"
                               class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="phone" class="block text-gray-300 text-sm font-bold mb-2">Teléfono *</label>
                        <input type="tel" id="phone" name="telefono_vendedor" value="{{old('telefono_vendedor')}}"
                               class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-300 text-sm font-bold mb-2">Contraseña *</label>
                        <input type="password" id="password" name="password"
                               class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                        <p class="text-xs text-gray-400 mt-1">Mínimo 8 caracteres</p>
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-300 text-sm font-bold mb-2">Confirmar Contraseña *</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                               class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>
                </div>

                <!-- Información del Negocio -->
                <div>
                    <h3 class="text-lg font-semibold text-white mb-4 border-b border-gray-700 pb-2">Información del Negocio</h3>

                    <div class="mb-4">
                        <label for="business_name" class="block text-gray-300 text-sm font-bold mb-2">Nombre del Negocio *</label>
                        <input type="text" id="business_name" name="nombre" value="{{-- old('nombre') --}}"
                               class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>

                    <div class="mb-4">
                        <label for="business_phone" class="block text-gray-300 text-sm font-bold mb-2">Teléfono del Negocio *</label>
                        <input type="tel" id="business_phone" name="telefono" value="{{-- old('telefono') --}}"
                               class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                               required>
                    </div>


                    <div class="mb-4">
                      <label for="">Departamento</label>
                      <select name="direccion_departamento" required>
                           <option value="">-- Seleccionar departamento --</option>
                            @foreach ($departamento as $depa)
                                <option value="{{ $depa->id }}">{{ $depa->departamento }}</option>
                            @endforeach
                      </select>
                    </div>

                    
                    <div class="mb-4">
                      <label for="">Municipio</label>
                      <select name="direccion_municipio" required>
                               <option value="">-- Seleccionar Municipio --</option>
                            @foreach ($departamento as $depa)
                                <option value="{{ $depa->id }}">{{ $depa->municipio }}</option>
                            @endforeach
                      </select>
                    </div>

                    <div class="mb-4">
                      <label for="">Canton</label>
                           <select name="direccion_municipio" required>
                               <option value="">-- Seleccionar Canton--</option>
                            @foreach ($departamento as $depa)
                                <option value="{{ $depa->id }}">{{ $depa->canton}}</option>
                            @endforeach
                      </select>
                    </div>
                    
                    <div class="mb-4">
                        <label for="business_description" class="block text-gray-300 text-sm font-bold mb-2">Descripción del Negocio</label>
                        <textarea id="business_description" name="descripcion" rows="3"
                                  class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500">{{old('descripcion')}}</textarea>
                    </div>

                    <div class="mb-4">
                        <label for="estado" class="block text-gray-300 text-sm font-bold mb-2">Estado</label>
                        <select id="estado" name="estado"
                                class="w-full px-3 py-2 bg-gray-700 border border-gray-600 rounded-md text-white focus:outline-none focus:ring-2 focus:ring-blue-500"
                                required>
                            <option value="activo">Activo</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{-- route('vendedores.index') --}}" class="bg-gray-600 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Cancelar
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Crear Vendedor
                </button>
            </div>
        </form>
    </div>
</main>
</body>
</html>
