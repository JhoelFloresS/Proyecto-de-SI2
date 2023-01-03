<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\tenant\CreditoController;
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
        return redirect()->route('tenant.login', tenant('id'));
    });

    // Route::get('/login', [LoginController::class, 'showLoginForm'])->name('tenant.login');
    // Route::post('/login', [LoginController::class, 'authenticate'])->name('tenant.login');
    require __DIR__ . '/auth-tenant.php';

    Route::get('/dashboard', function () {
        return view('tenant.dashboard');
    })->middleware(['auth', 'auth.session'])->name('tenant.dashboard');

    //backups
    Route::get('/backups', [App\Http\Controllers\tenant\BackupController::class, 'index'])
        ->middleware(['auth', 'auth.session'])->middleware('can:backups')->name('tenant.backups');

    Route::post('/backups/crear', [App\Http\Controllers\tenant\BackupController::class, 'create'])
        ->middleware(['auth', 'auth.session'])->middleware('can:backups')->name('tenant.backups.crear');


    //users
    Route::get('/users', [App\Http\Controllers\tenant\UserController::class, 'index'])
        ->middleware(['auth', 'auth.session'])->middleware('can:Gestionar Usuarios')->name('tenant.users');

    Route::get('/users/create', [App\Http\Controllers\tenant\UserController::class, 'create'])
        ->middleware(['auth', 'auth.session'])->middleware('can:Gestionar Usuarios')->name('tenant.users.create');

    Route::post('/users/store', [App\Http\Controllers\tenant\UserController::class, 'store'])
        ->middleware(['auth', 'auth.session'])->middleware('can:Gestionar Usuarios')->name('tenant.users.store');

    Route::get('/{user}/users/edit', [App\Http\Controllers\tenant\UserController::class, 'edit'])
        ->middleware(['auth', 'auth.session'])->middleware('can:Gestionar Usuarios')->name('tenant.users.edit');

    Route::put('/{user}/users/update', [App\Http\Controllers\tenant\UserController::class, 'update'])
        ->middleware(['auth', 'auth.session'])->middleware('can:Gestionar Usuarios')->name('tenant.users.update');

    Route::delete('/{user}/users/', [App\Http\Controllers\tenant\UserController::class, 'destroy'])
        ->middleware(['auth', 'auth.session'])->middleware('can:Gestionar Usuarios')->name('tenant.users.delete');

    //roles
    Route::get('/roles', [App\Http\Controllers\tenant\RoleController::class, 'index'])
        ->middleware(['auth', 'auth.session'])->middleware('can:Gestionar Roles')->name('tenant.roles');

    Route::get('/roles/create', [App\Http\Controllers\tenant\RoleController::class, 'create'])
        ->middleware(['auth', 'auth.session'])->middleware('can:Gestionar Roles')->name('tenant.roles.create');

    Route::post('/roles/store', [App\Http\Controllers\tenant\RoleController::class, 'store'])
        ->middleware(['auth', 'auth.session'])->middleware('can:Gestionar Roles')->name('tenant.roles.store');

    Route::get('/{role}/roles/edit', [App\Http\Controllers\tenant\RoleController::class, 'edit'])
        ->middleware(['auth', 'auth.session'])->middleware('can:Gestionar Roles')->name('tenant.roles.edit');

    Route::put('/{role}/roles/update', [App\Http\Controllers\tenant\RoleController::class, 'update'])
        ->middleware(['auth', 'auth.session'])->middleware('can:Gestionar Roles')->name('tenant.roles.update');

    Route::delete('/{role}/roles', [App\Http\Controllers\tenant\RoleController::class, 'destroy'])
        ->middleware(['auth', 'auth.session'])->middleware('can:Gestionar Roles')->name('tenant.roles.delete');


    //bitacoras
    Route::get('/bitacoras', [App\Http\Controllers\tenant\BitacoraController::class, 'index'])
        ->middleware('can:Gestionar Bitacora')->name('tenant.bitacoras.index');

    Route::get('/bitacoras-download-pdf', [App\Http\Controllers\tenant\BitacoraController::class, 'downloadPDF'])->middleware('can:Gestionar Bitacora')->name('tenant-bitacoras-download-pdf');

    //personalizacion
    Route::get('/personalizacion', [App\Http\Controllers\tenant\personalizacionController::class, 'index'])
        ->middleware(['auth', 'auth.session'])->name('tenant.personalizacion');

    Route::post('/personalizacion/edit', [App\Http\Controllers\tenant\personalizacionController::class, 'edit'])
        ->middleware(['auth', 'auth.session'])->name('tenant.personalizacion.edit');

    //perfil
    Route::get('/perfil', [App\Http\Controllers\tenant\PerfilController::class, 'index'])
        ->middleware(['auth', 'auth.session'])->name('tenant.perfil');

    //Creditos
    Route::get('/creditos', [App\Http\Controllers\tenant\CreditoController::class, 'index'])
        ->name('tenant.creditos.index');
    Route::get('/creditos/create/', [App\Http\Controllers\tenant\CreditoController::class, 'create'])
        ->name('tenant.creditos.create');
    Route::post('/creditos', [App\Http\Controllers\tenant\CreditoController::class, 'store'])
        ->name('tenant.creditos.store');
    Route::get('/creditos/{credito}/edit/', [App\Http\Controllers\tenant\CreditoController::class, 'edit'])
        ->name('tenant.creditos.edit');
    Route::put('/creditos/{credito}', [App\Http\Controllers\tenant\CreditoController::class, 'update'])
        ->name('tenant.creditos.update');
    Route::delete('/creditos/{credito}', [App\Http\Controllers\tenant\CreditoController::class, 'destroy'])
        ->name('tenant.creditos.delete');

    //solicitudes
    Route::get('/solicitudes', [App\Http\Controllers\tenant\SolicitudCreditoController::class, 'index'])
        ->name('tenant.solicitudes.index');
    Route::get('/solicitudes/create/', [App\Http\Controllers\tenant\SolicitudCreditoController::class, 'create'])
        ->name('tenant.solicitudes.create');
    Route::post('/solicitudes', [App\Http\Controllers\tenant\SolicitudCreditoController::class, 'store'])
        ->name('tenant.solicitudes.store');
    Route::get('/solicitudes/{solicitud}/edit/', [App\Http\Controllers\tenant\SolicitudCreditoController::class, 'edit'])
        ->name('tenant.solicitudes.edit');
    Route::put('/solicitudes/{solicitud}', [App\Http\Controllers\tenant\SolicitudCreditoController::class, 'update'])
        ->name('tenant.solicitudes.update');
    Route::delete('/solicitudes/{solicitud}', [App\Http\Controllers\tenant\SolicitudCreditoController::class, 'destroy'])
        ->name('tenant.solicitudes.delete');
    Route::get('/solcitudes/{solicitud}', [App\Http\Controllers\tenant\SolicitudCreditoController::class, 'show'])->name('tenant.solicitudes.show');

    Route::get('/solicitudes/documentos/{carpetaId}', [App\Http\Controllers\tenant\SolicitudCreditoController::class, 'showDocuments'])
    ->name('tenant.solicitudes.show.documents');
    

    //carpeta credito
    Route::get('/carpeta-credito', [App\Http\Controllers\tenant\CarpetaCreditoController::class, 'index'])
        ->name('tenant.carpeta-credito.index');
    Route::get('/carpeta-credito/create/', [App\Http\Controllers\tenant\CarpetaCreditoController::class, 'create'])
        ->name('tenant.carpeta-credito.create');
    Route::post('/carpeta-credito', [App\Http\Controllers\tenant\CarpetaCreditoController::class, 'store'])
        ->name('tenant.carpeta-credito.store');
    Route::get('/carpeta-credito/{carpeta}/edit/', [App\Http\Controllers\tenant\CarpetaCreditoController::class, 'edit'])
        ->name('tenant.carpeta-credito.edit');
    Route::put('/carpeta-credito/{carpeta}', [App\Http\Controllers\tenant\CarpetaCreditoController::class, 'update'])
        ->name('tenant.carpeta-credito.update');
    Route::delete('/carpeta-credito/{carpeta}', [App\Http\Controllers\tenant\CarpetaCreditoController::class, 'destroy'])
        ->name('tenant.carpeta-credito.delete');


    // Documentos
    Route::get('/documentos', [App\Http\Controllers\tenant\DocumentoController::class, 'index'])
    ->name('tenant.documentos.index');
    Route::get('/documentos/create/{carpetaId}', [App\Http\Controllers\tenant\DocumentoController::class, 'create'])
    ->name('tenant.documentos.create');
    Route::post('/documentos/{carpetaId}', [App\Http\Controllers\tenant\DocumentoController::class, 'store'])
    ->name('tenant.documentos.store');
    Route::get('/documentos/{documento}/{carpetaId}/edit/', [App\Http\Controllers\tenant\DocumentoController::class, 'edit'])
    ->name('tenant.documentos.edit');
    Route::put('/documentos/{documento}', [App\Http\Controllers\tenant\DocumentoController::class, 'update'])
    ->name('tenant.documentos.update');
    Route::get('/documentos/{documento}/{carpetaId}', [App\Http\Controllers\tenant\DocumentoController::class, 'show'])->name('tenant.documentos.show');
    Route::delete('/documentos/{documento}', [App\Http\Controllers\tenant\DocumentoController::class, 'destroy'])
    ->name('tenant.documentos.delete');

});
