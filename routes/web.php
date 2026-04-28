<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login.login');
});

Route::get('/register', function () {
    return view('register.register');
});

Route::get('/dashboard', function () {
    return view('dashboard.dashboard_mahasiswa');
});

Route::get('/dashboard/merchant', function () {
    return view('dashboard.dashboard_merchant');
});

Route::get('/merchant/profile', function () {
    return view('dashboard.dashboard_merchant');  // placeholder, will be a separate page later
});
