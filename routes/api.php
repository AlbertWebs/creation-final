<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Public API Routes
Route::prefix('v1')->group(function () {
    // Blogs API
    Route::get('/blogs', [App\Http\Controllers\Api\BlogController::class, 'index']);
    Route::get('/blogs/{blog}', [App\Http\Controllers\Api\BlogController::class, 'show']);
    
    // Portfolios API
    Route::get('/portfolios', [App\Http\Controllers\Api\PortfolioController::class, 'index']);
    Route::get('/portfolios/{portfolio}', [App\Http\Controllers\Api\PortfolioController::class, 'show']);
    
    // Services API
    Route::get('/services', [App\Http\Controllers\Api\ServiceController::class, 'index']);
    Route::get('/services/{service}', [App\Http\Controllers\Api\ServiceController::class, 'show']);
    
    // Categories API
    Route::get('/categories', [App\Http\Controllers\Api\CategoryController::class, 'index']);
    Route::get('/categories/{category}', [App\Http\Controllers\Api\CategoryController::class, 'show']);
    
    // Clients API
    Route::get('/clients', [App\Http\Controllers\Api\ClientController::class, 'index']);
    
    // Messages API (POST only for submitting contact forms)
    Route::post('/messages', [App\Http\Controllers\Api\MessageController::class, 'store']);
});

// Note: Admin API endpoints can be added later if needed
// The web admin panel already provides full CRUD functionality
