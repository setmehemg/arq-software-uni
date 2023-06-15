<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuario;
use App\Http\Controllers\Evento;
use App\Http\Controllers\Inscrito;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

# Usuários

Route::resource('usuarios', Usuario::class);
/*
Route::get('/usuarios', [Usuario::class, 'index']);
Route::get('/usuarios/create', [Usuario::class, 'create']);
Route::post('/usuarios', [Usuario::class, 'store']);
Route::get('/usuarios/{id}', [Usuario::class, 'show']);
Route::get('/usuarios/{id}/edit', [Usuario::class, 'edit']);
Route::put('/usuarios/{id}', [Usuario::class, 'update']);
Route::delete('/usuarios/{id}', [Usuario::class, 'delete']);
*/

# Eventos

Route::resource('eventos', Evento::class);
/*
Route::get('/eventos', [Evento::class, 'index']);
Route::get('/eventos/create', [Evento::class, 'create']);
Route::post('/eventos', [Evento::class, 'store']);
Route::get('/eventos/{id}', [Evento::class, 'show']);
Route::get('/eventos/{id}/edit', [Evento::class, 'edit']);
Route::put('/eventos/{id}', [Evento::class, 'update']);
Route::delete('/eventos/{id}', [Evento::class, 'delete']);
*/


# Inscrito / Inscricoes

Route::resource('inscricao', Inscrito::class);
/*
Route::get('/inscricao', [Inscrito::class, 'index']);
Route::get('/inscricao/create', [Inscrito::class, 'create']);
Route::post('/inscricao', [Inscrito::class, 'store']);
Route::get('/inscricao/{id}', [Inscrito::class, 'show']);
Route::get('/inscricao/{id}/edit', [Inscrito::class, 'edit']);
Route::put('/inscricao/{id}', [Inscrito::class, 'update']);
Route::delete('/inscricao/{id}', [Inscrito::class, 'destroy']);
*/

# Login
Route::post('/login', [AuthController::class, 'login'])->name('logar');
Route::post('/registro', [AuthController::class, 'registro'])->name('registro');