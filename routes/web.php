<?php

use App\Http\Controllers\BuscadorEmpresaController;
use App\Http\Controllers\central\BitacoraController;
use App\Http\Controllers\central\PlanController;
use App\Http\Controllers\central\UserController;
use App\Http\Controllers\central\PerfilController;
use App\Http\Controllers\TenantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
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
    return view('central.dashboard');
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

Route::post('/create_empresa', [TenantController::class, 'create'])
    ->name('tenant.create');

//users
Route::get('/users',[UserController::class,'index'] )->name('central.users');

Route::get('/users/create/',[UserController::class,'create'] )->name('central.users.create');

Route::post('/users/store',[UserController::class,'store'] )->name('central.users.store');

Route::get('/{user}/users/edit',[UserController::class,'edit'] )
->name('central.users.edit');

Route::put('/{user}/users/update',[UserController::class,'update'] )
->name('central.users.update');

Route::delete('/{user}/users',[UserController::class,'destroy'] )
->name('central.users.delete');   


//tenants
Route::get('/tenants',[TenantController::class,'index'] )->name('central.tenants');

Route::get('/tenants/create/',[TenantController::class,'create2'] )->name('central.tenants.create');

Route::post('/tenants/store',[TenantController::class,'store'] )->name('central.tenants.store');

Route::get('/{tenant}/tenants/edit',[TenantController::class,'edit'] )
->name('central.tenants.edit');

Route::put('/{tenant}/tenants/update',[TenantController::class,'update'] )
->name('central.tenants.update');

Route::delete('/{tenant}/tenants',[TenantController::class,'destroy'] )
->name('central.tenants.delete');   


//Planes
Route::get('/planes',[PlanController::class,'index'] )->name('central.planes');

Route::get('/planes/create/',[PlanController::class,'create'] )->name('central.planes.create');

Route::post('/planes/store',[PlanController::class,'store'] )->name('central.planes.store');

Route::get('/{plan}/planes/edit',[PlanController::class,'edit'] )
->name('central.planes.edit');

Route::put('/{plan}/planes/update',[PlanController::class,'update'] )
->name('central.planes.update');

Route::delete('/{plan}/planes',[PlanController::class,'destroy'] )
->name('central.planes.delete');   

//bitacoras
Route::get('/bitacoras', [BitacoraController::class, 'index'])->name('central.bitacoras.index');

Route::get('/bitacoras-download-pdf', [BitacoraController::class, 'downloadPDF'])
->name('central-bitacoras-download-pdf');

//perfil
Route::get('perfil/', [PerfilController::class, 'index'])->name('central.perfil.index');
Route::put('perfil/{user}/update',[PerfilController::class, 'update'])->name('central.perfil.update');
