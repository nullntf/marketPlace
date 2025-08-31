<?php

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
