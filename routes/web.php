<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuariosController;
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
});

Route::get('/loginAdmin', function () {
    return view('auth.admin.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/registerCustomer', function () {
    return view('auth.customer.register-form');
});

Route::get('/registerSeller', function () {
    return view('auth.seller.register-form');
});

Route::get('/verifyCustomer', function () {
    return view('auth.customer.verify');
});

Route::get('/verifySeller', function () {
    return view('auth.seller.verify');
});

Route::get('/business', function () {
    return view('auth.seller.business');
});


//ruta para procesar el inicio de session de los usuarios
Route::post('/login/usuarios',[AuthController::class,'loginUsuarios'])->name('users.login');
//ruta para procesar el inicio de session de administradores
Route::post('/admin',[AuthController::class, 'loginAdmin'])->name('admin.login');
//ruta para procesar registro de usuarios consumidores
Route::post('/register/consumidores',[UsuariosController::class, 'registroUsuarioConsumidor'])->name("register.consumidores");


/*
|--------------------------------------------------------------------------
| Rutas de Admin
|--------------------------------------------------------------------------
*/

Route::get('/dashboardAdmin', function () {
    return view('admin.dashboard');
});

Route::get('/showAdmin', function () {
    return view('admin.crudAdmin.showAdmin');
});

Route::get('/createAdmin', function () {
    return view('admin.crudAdmin.createAdmin');
});

Route::get('/editAdmin', function () {
    return view('admin.crudAdmin.editAdmin');
});

/*
|--------------------------------------------------------------------------
| Rutas de consumidor
|--------------------------------------------------------------------------
*/

Route::get('/dashboardConsumidor', function () {
    return view('consumidor.dashboard');
});

/*
|--------------------------------------------------------------------------
| Rutas de Vendedor
|--------------------------------------------------------------------------
*/

Route::get('/dashboardVendedor', function () {
    return view('vendedor.dashboard');
});
