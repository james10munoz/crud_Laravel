<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
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

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/muro', [ClienteController::class, 'index'])->name('inicio');

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::resource('clientes', ClienteController::class);
Route::get('/create', [CreateController::class, 'index'])->name('create');


