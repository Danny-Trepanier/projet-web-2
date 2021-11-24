<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BottleController;
use App\Http\Controllers\CellarController;
use App\Http\Controllers\ScraperController;

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


// Routes de l'application
Route::get('/dashboard', [BottleController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('dashboard');

// Route du scraper
Route::get('/scraper', [ScraperController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('scraper');


// Routes pour le cellier
Route::get('/cellar', [CellarController::class, 'index'])->middleware(['auth:sanctum', 'verified'])->name('cellar');
Route::get('/cellar/{cellarPost}', [CellarController::class, 'show'])->middleware(['auth:sanctum', 'verified']);
Route::get('/cellar/create/cellar', [CellarController::class, 'create'])->middleware(['auth:sanctum', 'verified']);
Route::post('/cellar/create/cellar', [CellarController::class, 'store'])->middleware(['auth:sanctum', 'verified']);
Route::get('/cellar/{cellarPost}/edit', [CellarController::class, 'edit'])->middleware(['auth:sanctum', 'verified']);
Route::put('/cellar/{cellarPost}/edit', [CellarController::class, 'update'])->middleware(['auth:sanctum', 'verified']);
Route::delete('/cellar/{cellarPost}', [CellarController::class, 'destroy'])->middleware(['auth:sanctum', 'verified']);

// Routes pour une bouteille
Route::get('/bottle/{bottlePost}', [BottleController::class, 'show'])->middleware(['auth:sanctum', 'verified']);
Route::get('/bottle/create/bottle', [BottleController::class, 'create'])->middleware(['auth:sanctum', 'verified'])->name('bottle');
Route::post('/bottle/create/bottle', [BottleController::class, 'store'])->middleware(['auth:sanctum', 'verified']);
Route::get('/bottle/{bottlePost}/edit', [BottleController::class, 'edit'])->middleware(['auth:sanctum', 'verified']);
Route::put('/bottle/{bottlePost}/edit', [BottleController::class, 'update'])->middleware(['auth:sanctum', 'verified']);
//Route pour ajouter une note à une bouteille
Route::post('/bottle/create/comment', [BottleController::class, 'storeComment'])->middleware(['auth:sanctum', 'verified'])->name('bottle.create.comment');
