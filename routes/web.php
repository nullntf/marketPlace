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
Route::post('/logut/usuarios',[AuthController::class,'logoutUsuarios'])->name('logut.users');

//ruta para procesar el inicio de session de administradores
Route::post('/admin/login',[AuthController::class, 'loginAdmin'])->name('admin.login');
Route::post('/admin/logout',[AuthController::class, 'logoutAdmin'])->name('admin.logout');

//ruta para procesar registro de usuarios consumidores 
Route::post('/register/consumidores',[UsuariosController::class, 'registroUsuarioConsumidor'])->name("register.consumidores");


//ruta con middleware para llevar control de las vistas entre consumidor 

Route::get('/consumidor', function () {
    return view('auth.seller.business');
})->middleware(['auth','role:Consumidor'])->name('consumidor.vista');

//fin de rutas de consumidores


//Rutas de super Administrador
Route::get('/superAdmin', function(){
    return view('Vista.admin');
})->middleware(['auth', 'role:SuperAdmin'])->name('SuperAdmin.vista');
//fin de las vitas de SuperAdministrador


//Rutas para administradores
Route::get('/admin', function(){
    return view('/vistaAdmin');
})->middleware(['auth','role:Admin'])->name('Administradores.vista');

//fin de rutas de administradores