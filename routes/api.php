<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* controllers */
use App\Http\Controllers\AuthenticatedAPIController;
use App\Http\Controllers\central\CentralAPIController;
use App\Http\Controllers\tenant\TenantAPIController;

use Spatie\Permission\Contracts\Role;
use Stancl\Tenancy\Middleware\InitializeTenancyByPath;
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

/* tenantID */
Route::post('tenantID', [CentralAPIController::class, 'tenantID']);

/* login */
Route::post('login', [AuthenticatedAPIController::class, 'login']);

/* autent */
Route::middleware('auth:sanctum')->group(function () {
    /* logout */
    Route::post('logout', [AuthenticatedAPIController::class, 'logout']);
    /* perfil GET */
    Route::get('perfilGet', [AuthenticatedAPIController::class, 'perfilGet']);
    /* planes GET */
    Route::get('planesGet', [CentralAPIController::class, 'planesGet']);
    /* suscripciones GET */
    Route::get('suscripcionesGet', [CentralAPIController::class, 'suscripcionesGet']);
});

Route::prefix('/{tenant}')->middleware([
    'api',
    InitializeTenancyByPath::class,
])->group(function () {
    /* login */
    Route::post('login', [AuthenticatedAPIController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        /* logout */
        Route::post('logout', [AuthenticatedAPIController::class, 'logout']);
        /* perfil GET */
        Route::get('perfilGet', [AuthenticatedAPIController::class, 'perfilGet']);
        /* departamentos GET */
        Route::get('departamentosGet', [TenantAPIController::class, 'departamentosGet']);
        /* clientes GET */
        Route::get('clientesGet', [TenantAPIController::class, 'clientesGet']);
        /* notificaion */
        Route::post('notificacionToken', [TenantAPIController::class, 'notificacionToken']);
        /* solicitudes GET */
        Route::get('solicitudesGet', [TenantAPIController::class, 'solicitudesGet']);
        /* creditos GET */
        Route::get('creditosGet', [TenantAPIController::class, 'creditosGet']);
    });
});