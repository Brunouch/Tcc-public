<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('templates.middleware');
})->middleware(['auth'])->name('dashboard');

Route::resource('/clientes', '\App\Http\Controllers\ClienteController')
    ->middleware(['auth']);

Route::resource('/gasos', '\App\Http\Controllers\GasometriaController')
    ->middleware(['auth']);

Route::resource('/vents', '\App\Http\Controllers\VentiladorMecController')
    ->middleware(['auth']);

Route::resource('/status', '\App\Http\Controllers\StatusClinicoController')
    ->middleware(['auth']);

Route::resource('/parametros', '\App\Http\Controllers\ParametrosAtingidosController')
    ->middleware(['auth']);

Route::resource('/higienes', '\App\Http\Controllers\HigieneParenquimaController')
    ->middleware(['auth']);

Route::resource('/padrao', '\App\Http\Controllers\VentPadraoController')
    ->middleware(['auth']);

require __DIR__ . '/auth.php';
