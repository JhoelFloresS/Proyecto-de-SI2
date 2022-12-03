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
    Route::get('/backups',[App\Http\Controllers\tenant\backupController::class,'index'] )
    ->middleware(['auth', 'auth.session'])->name('tenant.backups');

    Route::post('/backups/crear',[App\Http\Controllers\tenant\backupController::class,'create'])
    ->middleware(['auth', 'auth.session'])->name('tenant.backups.crear');

    Route::get('/bitacoras', [App\Http\Controllers\tenant\BitacoraController::class, 'index'])
    ->name('tenant.bitacoras.index');

});
