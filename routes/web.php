<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriaProductosController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ConsumidorController;
use App\Http\Controllers\VendedoresController;
use App\Models\Consumidor;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación - views/auth
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/loginAdmin', function () {
    return view('auth.admin.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/registerConsumidor', function () {
    return view('auth.customer.register-form');
});

Route::get('/registerVendedor', function () {
    return view('auth.seller.register-form');
});

//ruta para procesar el inicio de session de los usuarios
Route::post('/login/usuarios',[AuthController::class,'loginUsuarios'])->name('users.login');
//ruta para procesar el inicio de session de administradores

//ruta para procesar registro de usuarios consumidores
Route::post('/register/consumidores',[ConsumidorController::class, 'registroUsuarioConsumidor'])->name("register.consumidores");


/*
|--------------------------------------------------------------------------
| Rutas de Admin
|--------------------------------------------------------------------------
*/

Route::get('/dashboardAdmin', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'role:SuperAdmin'])->name('SuperAdmin.vista');

Route::get('/showAdmin', function () {
    return view('admin.crudAdmin.showAdmin');
});

Route::get('/createAdmin', [SuperAdminController::class , 'rolesSistema']);

Route::post('/admin',[AuthController::class,'loginAdmin'])->name('admin.login');
Route::post('/loguot/admin', [AuthController::class,'logoutAdmin'])->name('logout.admin');
Route::post('/crear/Admin', [SuperAdminController::class, ''])->name('crear.admin');
Route::post('/nuevo/Vendedor', [SuperAdminController::class, 'crearVendedor'])->name('crear.vendedor');


Route::get('/editAdmin', function () {
    return view('admin.crudAdmin.editAdmin');
});

// crud Vendedor
Route::get('/verVendedor', function () {
    return view('admin.crudVendedor.verVendedor');
});

Route::get('/crearVendedor',[SuperAdminController::class, 'obtenerDirecciones']);

Route::get('/editarVendedor', function () {
    return view('admin.crudVendedor.editarVendedor');
});

/*
|--------------------------------------------------------------------------
| Rutas de consumidor
|--------------------------------------------------------------------------
*/

Route::get('/dashboardConsumidor', function () {
    return view('consumidor.dashboard');
})->middleware('auth:consumidor', 'role:Consumidor')->name('consumidor.vista');

Route::post('/logoutConsumidor', [AuthController::class, 'logoutUsuarios'])->name('logout.consumidor');


Route::get('/perfil', [ConsumidorController::class, 'perfilConsumidor'])
->middleware('auth:consumidor, role:Consumidor')
->name('perfil.consumidor');

/*
|--------------------------------------------------------------------------
| Rutas de Vendedor
|--------------------------------------------------------------------------
*/

Route::get('/dashboardVendedor', function () {
    return view('vendedor.dashboard');
});

// crud Producto

Route::get('/verProductos', function () {
    return view('vendedor.crudProductos.verProductos');
});

Route::get('/crearProducto',[CategoriaProductosController::class, 'categoriasProductos'] 
)->middleware('auth:web', 'role:Vendedor');

Route::get('/editarProducto', function () {
    return view('vendedor.crudProductos.editarProducto');
});

// Perfil

Route::get('/perfilVendedor', function () {
    return view('vendedor.perfil.perfil');
});

Route::get('/editarPerfilVendedor', function () {
    return view('vendedor.perfil.editarPerfil');
});

Route::post('/nuevoProducto', [VendedoresController::class,'nuevoProducto'])->name('nuevo.producto');