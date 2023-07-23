<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolapiController;
use App\Http\Controllers\GestorApiController;
use App\Http\Controllers\IngresoMaterialApiController;
use App\Http\Controllers\MaterialApiController;
use App\Http\Controllers\TipoMaterialApiController;
use App\Http\Controllers\UsuarioApiController;
use App\Models\Tipo_Material;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('rol', RolApiController::class);
Route::apiResource('gestor', GestorApiController::class);
Route::apiResource('ingresoMaterial', IngresoMaterialApiController::class);
Route::apiResource('tipoMaterial', TipoMaterialApiController::class);
Route::apiResource('material', MaterialApiController::class);
Route::apiResource('users', UsuarioApiController::class);


