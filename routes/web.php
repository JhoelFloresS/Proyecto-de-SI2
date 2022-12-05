<?php

use App\Http\Controllers\BuscadorEmpresaController;
use Illuminate\Http\Request;
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
    return view('central.landing');
})->name('central.inicio');
//ROUTAS PARA LA AUTENTICACION DE LOS USUARIOS
require __DIR__ . '/auth.php';


Route::get('/dashboard', function () {
    return view('central.home');
})->middleware(['auth', 'verified'])->name('dashboard');

/* Landing Page */
Route::get('/landing', function () {
    return view('central.landing');
});

/* Formulario */
Route::get('/formulario', function (Request $request) {
    // dd($request);
    return view('central.formulario', [ 'idPlan' => $request->id ]);
})->name('central.formulario');

/* Home */
Route::get('/home', function () {
    return view('central.home');
});

/* Login Buscador */
Route::get('/login-buscador', function () {
    return view('central.login-buscador');
});

/* Buscador Empresa Controller */
Route::post('login-buscador', [BuscadorEmpresaController::class, 'index'])
    ->name('login-buscador');

Route::post('/cretae-empresa', [BuscadorEmpresaController::class, 'create'])
    ->name('create-empresa');