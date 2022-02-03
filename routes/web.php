<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BottleController;
use App\Http\Controllers\CellarController;
use App\Http\Controllers\LocalizationController;

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
    return view('auth.login');
});

// Route pour changer la langue du site
Route::get('/lang/{locale}', [LocalizationController::class, 'index']);

// Routes pour le cellier
Route::get('/cellar', [CellarController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('cellar');
Route::get('/cellar/{cellarPost}', [CellarController::class, 'show'])->middleware(['auth:sanctum', 'verified']);
Route::get('/cellar/create/cellar', [CellarController::class, 'create'])->middleware(['auth:sanctum', 'verified']);
Route::post('/cellar/create/cellar', [CellarController::class, 'store'])->middleware(['auth:sanctum', 'verified']);
Route::get('/cellar/{cellarPost}/edit', [CellarController::class, 'edit'])->middleware(['auth:sanctum', 'verified']);
Route::put('/cellar/{cellarPost}/edit', [CellarController::class, 'update'])->middleware(['auth:sanctum', 'verified']);
Route::delete('/cellar/{cellarPost}/edit', [CellarController::class, 'destroy'])->middleware(['auth:sanctum', 'verified']);

// Routes pour une bouteille
Route::get('/bottle', [BottleController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('bottle');
Route::get('/bottle/{bottlePost}', [BottleController::class, 'show'])->middleware(['auth:sanctum', 'verified']);
