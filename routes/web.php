<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Tipo_MaterialController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\IngresoMaterialController;
use App\Http\Controllers\GestorController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\RolController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/Usuarios/{id}/confirmDelete',[UsuarioController::class,'confirmDelete']);
Route::post('/Prestamos', [PrestamoController::class, 'consultarPrestamos'])->name('consultarPrestamos');
Route::get('/Prestamos', [PrestamoController::class, 'index'])->name('prestamos.index');
Route::resource('/Tipo_Materiales', Tipo_MaterialController::class);
Route::get('/Tipo_Materiales/{id}/confirmDelete',[Tipo_MaterialController::class,'confirmDelete']);
Route::resource('/Materiales', MaterialController::class);
Route::get('/Materiales/{id}/confirmDelete',[MaterialController::class,'confirmDelete']);
Route::resource('/Ingresos', IngresoMaterialController::class);
Route::get('/Ingresos/{id}/confirmDelete',[IngresoMaterialController::class,'confirmDelete']);
Route::resource('/Gestores',GestorController::class);
Route::get('/Gestores/{id}/confirmDelete',[GestorController::class,'confirmDelete']);
Route::resource('/Usuarios', UsuarioController::class);
Route::get('/index', [UsuarioController::class, 'index'])->name('Usuarios.index');
Route::get('/', [IndexController::class, 'index'])->name('index.index'); //Esta linea de codigo cambia la pagina principal de laravel, la cual es el welcome de este archivo PHP que esta en la linea 25-27

Route::post('/Prestamos', [PrestamoController::class, 'consultarPrestamos'])->name('consultarPrestamos');

Route::resource('Roles', RolController::class);
Route::get('/Roles/{id}/confirmDelete',[RolController::class,'confirmDelete']);
