<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
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
    Route::get('/backups',[App\Http\Controllers\tenant\backupController::class,'index'] )
    ->middleware(['auth', 'auth.session'])->name('tenant.backups');

    Route::post('/backups/crear',[App\Http\Controllers\tenant\backupController::class,'create'])
    ->middleware(['auth', 'auth.session'])->name('tenant.backups.crear');

    //personalizacion
    Route::get('/personalizacion',[App\Http\Controllers\tenant\personalizacionController::class,'index'] )
    ->middleware(['auth', 'auth.session'])->name('tenant.personalizacion');
   
    Route::post('/personalizacion/edit',[App\Http\Controllers\tenant\personalizacionController::class,'edit'] )
    ->middleware(['auth', 'auth.session'])->name('tenant.personalizacion.edit');

});
