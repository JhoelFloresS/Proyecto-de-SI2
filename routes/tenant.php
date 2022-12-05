<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use App\Models\tenant\Bitacora;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::prefix('/{tenant}')->middleware([
    'web',
    InitializeTenancyByPath::class,
])->group(function () {
    Route::get('/', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });

    // Route::get('/login', [LoginController::class, 'showLoginForm'])->name('tenant.login');
    // Route::post('/login', [LoginController::class, 'authenticate'])->name('tenant.login');
    require __DIR__ . '/auth-tenant.php';

    Route::get('/dashboard', function () {
        return view('tenant.dashboard');
    })->middleware(['auth', 'auth.session'])->name('tenant.dashboard');

   //backups
    Route::get('/backups',[App\Http\Controllers\tenant\BackupController::class,'index'] )
    ->middleware(['auth', 'auth.session'])/* ->middleware('can:backups') */->name('tenant.backups');

    Route::post('/backups/crear',[App\Http\Controllers\tenant\BackupController::class,'create'])
    ->middleware(['auth', 'auth.session'])/* ->middleware('can:backups') */->name('tenant.backups.crear');


     //users
     Route::get('/users',[App\Http\Controllers\tenant\UserController::class,'index'] )
     ->middleware(['auth', 'auth.session'])/* ->middleware('can:Gestionar Usuarios') */->name('tenant.users');

     Route::get('/users/create',[App\Http\Controllers\tenant\UserController::class,'create'] )
     ->middleware(['auth', 'auth.session'])/* ->middleware('can:Gestionar Usuarios') */->name('tenant.users.create');

     Route::post('/users/store',[App\Http\Controllers\tenant\UserController::class,'store'] )
     ->middleware(['auth', 'auth.session'])/* ->middleware('can:Gestionar Usuarios') */->name('tenant.users.store');

     Route::get('/{user}/users/edit',[App\Http\Controllers\tenant\UserController::class,'edit'] )
     ->middleware(['auth', 'auth.session'])/* ->middleware('can:Gestionar Usuarios') */->name('tenant.users.edit');

     Route::put('/{user}/users/update',[App\Http\Controllers\tenant\UserController::class,'update'] )
     ->middleware(['auth', 'auth.session'])/* ->middleware('can:Gestionar Usuarios') */->name('tenant.users.update');

     Route::delete('/{user}/users/',[App\Http\Controllers\tenant\UserController::class,'destroy'] )
     ->middleware(['auth', 'auth.session'])/* ->middleware('can:Gestionar Usuarios') */->name('tenant.users.delete');

      //roles
      Route::get('/roles',[App\Http\Controllers\tenant\RoleController::class,'index'] )
      ->middleware(['auth', 'auth.session'])/* ->middleware('can:Gestionar Roles') */->name('tenant.roles');
 
      Route::get('/roles/create',[App\Http\Controllers\tenant\RoleController::class,'create'] )
      ->middleware(['auth', 'auth.session'])/* ->middleware('can:Gestionar Roles') */->name('tenant.roles.create');
 
      Route::post('/roles/store',[App\Http\Controllers\tenant\RoleController::class,'store'] )
      ->middleware(['auth', 'auth.session'])/* ->middleware('can:Gestionar Roles') */->name('tenant.roles.store');
 
      Route::get('/{role}/roles/edit',[App\Http\Controllers\tenant\RoleController::class,'edit'] )
      ->middleware(['auth', 'auth.session'])/* ->middleware('can:Gestionar Roles') */->name('tenant.roles.edit');
 
      Route::put('/{role}/roles/update',[App\Http\Controllers\tenant\RoleController::class,'update'] )
      ->middleware(['auth', 'auth.session'])/* ->middleware('can:Gestionar Roles') */->name('tenant.roles.update');
 
      Route::delete('/{role}/roles',[App\Http\Controllers\tenant\RoleController::class,'destroy'] )
      ->middleware(['auth', 'auth.session'])/* ->middleware('can:Gestionar Roles') */->name('tenant.roles.delete');


    Route::get('/bitacoras', [App\Http\Controllers\tenant\BitacoraController::class, 'index'])/* ->middleware('can:Gestionar Bitacora') */

    ->name('tenant.bitacoras.index');
    Route::get('/bitacoras-download-pdf', [App\Http\Controllers\tenant\BitacoraController::class, 'downloadPDF'])/* ->middleware('can:Gestionar Bitacora') */
    ->name('tenant-bitacoras-download-pdf');

    //personalizacion
    Route::get('/personalizacion',[App\Http\Controllers\tenant\personalizacionController::class,'index'] )
    ->middleware(['auth', 'auth.session'])->name('tenant.personalizacion');

    Route::post('/personalizacion/edit',[App\Http\Controllers\tenant\personalizacionController::class,'edit'] )
    ->middleware(['auth', 'auth.session'])->name('tenant.personalizacion.edit');

});
