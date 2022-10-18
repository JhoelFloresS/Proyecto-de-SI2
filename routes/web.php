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
    return view('central.welcome');
});
//ROUTAS PARA LA AUTENTICACION DE LOS USUARIOS
require __DIR__ . '/auth.php';


Route::get('/dashboard', function () {
    return view('central.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

