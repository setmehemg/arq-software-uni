<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Evento;
use App\Http\Controllers\Inscrito;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['web'])->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('logar');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('registro', [AuthController::class, 'indexRegistro'])->name('registro');
    Route::post('registro', [AuthController::class, 'registro'])->name('registrar');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/', [AuthController::class, 'home'])->name('home');
    Route::resource('eventos', Evento::class);
    //Route::resource('ingredientes', IngredienteController::class);
});

Route::resource('inscricao', Inscrito::class);