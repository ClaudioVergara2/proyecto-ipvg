<?php

use App\Http\Controllers\RentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehiclesController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '/login'], function(){
    Route::get('/', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/', [AuthController::class, 'attemptLogin'])->name('login.attempt');
});
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => '/register'], function(){
    Route::get('/', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/', [AuthController::class, 'storeAccount'])->name('register.store');
});

Route::post('/categories', [CategoriesController::class, 'store'])->name('categories.store')->middleware('auth');
Route::post('/vehicles', [VehiclesController::class, 'store'])->name('vehicles.store')->middleware('auth');
Route::post('/rent', [RentController::class, 'store'])->name('rent.store')->middleware('auth');

//RUTA VISTAS
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/formulario', [AuthController::class, 'form'])->name('formulario');
Route::get('/listado', [AuthController::class, 'list'])->name('listado');

Route::delete('/eliminarvehicles/{id}', [VehiclesController::class, 'delete'])->name('eliminarvehicles')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});
