<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CellarController;

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


// Routes sans être connecté
Route::get('/', function () {
    return view('welcome');
});


// Routes de l'application
Route::get('/dashboard', [\App\Http\Controllers\BottleController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('dashboard');




// Routes pour le cellier
Route::get('/cellar', [\App\Http\Controllers\CellarController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('cellar');
Route::get('/cellar/{cellarPost}', [\App\Http\Controllers\CellarController::class, 'show'])->middleware(['auth:sanctum', 'verified']);
Route::get('/cellar/create/cellar', [\App\Http\Controllers\CellarController::class, 'create'])->middleware(['auth:sanctum', 'verified']);
Route::post('/cellar/create/cellar', [\App\Http\Controllers\CellarController::class, 'store'])->middleware(['auth:sanctum', 'verified']);
Route::get('/cellar/{cellarPost}/edit', [\App\Http\Controllers\CellarController::class, 'edit'])->middleware(['auth:sanctum', 'verified']);
Route::put('/cellar/{cellarPost}/edit', [\App\Http\Controllers\CellarController::class, 'update'])->middleware(['auth:sanctum', 'verified']);
Route::delete('/cellar/{cellarPost}', [\App\Http\Controllers\CellarController::class, 'destroy'])->middleware(['auth:sanctum', 'verified']);

// Routes pour une bouteille
Route::get('/bottle/{bottlePost}', [\App\Http\Controllers\BottleController::class, 'show'])->middleware(['auth:sanctum', 'verified']);
Route::get('/bottle/create/bottle', [\App\Http\Controllers\BottleController::class, 'create'])->middleware(['auth:sanctum', 'verified'])->name('bottle');
Route::post('/bottle/create/bottle', [\App\Http\Controllers\BottleController::class, 'store'])->middleware(['auth:sanctum', 'verified']);
Route::get('/bottle/{bottlePost}/edit', [\App\Http\Controllers\BottleController::class, 'edit'])->middleware(['auth:sanctum', 'verified']);
Route::put('/bottle/{bottlePost}/edit', [\App\Http\Controllers\BottleController::class, 'update'])->middleware(['auth:sanctum', 'verified']);
