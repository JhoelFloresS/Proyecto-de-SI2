<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/* controllers */
use App\Http\Controllers\central\AutenticarController;
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

/* login */
Route::post('login', [AutenticarController::class, 'login']);

/* autent */
Route::middleware('auth:sanctum')->group(function () {
    /* logout */
    Route::post('logout', [AutenticarController::class, 'logout']);
    /* perfil GET */
    Route::get('perfilGet', [AutenticarController::class, 'perfilGet']);
    /* planes GET */
    Route::get('planesGet', [AutenticarController::class, 'planesGet']);
    /* suscripciones GET */
    Route::get('suscripcionesGet', [AutenticarController::class, 'suscripcionesGet']);
});

Route::prefix('/{tenant}')->middleware([
    'api',
    InitializeTenancyByPath::class,
])->group(function () {
    /* login */
    Route::post('login', [AutenticarController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        /* logout */
        Route::post('logout', [AutenticarController::class, 'logout']);
        /* perfil GET */
        Route::get('perfilGet', [AutenticarController::class, 'perfilGet']);
        /* planes GET */
        Route::get('planesGet', [AutenticarController::class, 'planesGet']);
        /* suscripciones GET */
        Route::get('suscripcionesGet', [AutenticarController::class, 'suscripcionesGet']);
    });
});
