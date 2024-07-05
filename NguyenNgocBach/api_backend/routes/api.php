<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Session\Middleware\StartSession;
use App\Http\Controllers\Api\V1\ProductController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\StoreController;
use App\Http\Controllers\Api\V1\CategoryController;
use App\Http\Controllers\Api\V1\CityController;
use App\Http\Controllers\Api\V1\DistrictController;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::prefix('users')->middleware(StartSession::class)->group(function () {
        Route::post('/register', [UserController::class, 'register']);
        Route::post('/login', [UserController::class, 'login']);
        Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');
        Route::post('/forgot-password', [UserController::class, 'forgotPassword']);
        Route::post('/reset-password', [UserController::class, 'resetPassword']);
        Route::get('/check-reset-token', [UserController::class, 'checkResetToken']);
    });
    Route::prefix('page/products')->group(function (){
        Route::get('/total', [ProductController::class, 'total']);
        Route::get('/', [ProductController::class, 'index']);
        Route::get('/{id}', [ProductController::class, 'show']);
    });
    Route::prefix('categories')->group(function (){
        Route::get('/', [CategoryController::class, 'index']);
    });
    Route::prefix('cities')->group(function (){
        Route::get('/', [CityController::class, 'index']);
    });
    Route::prefix('districts')->group(function (){
        Route::get('/', [DistrictController::class, 'index']);
    });
    Route::middleware(['auth:sanctum'])->group(function(){
        Route::prefix('products')->group(function () {
            Route::get('/total', [ProductController::class, 'totalShop']);

            Route::get('/', [ProductController::class, 'indexShop']);
            Route::get('/{id}', [ProductController::class, 'showShop']);
            Route::post('/', [ProductController::class, 'store']);
            Route::put('/{id}', [ProductController::class, 'update']);
            Route::delete('/{id}', [ProductController::class, 'destroy']);

            Route::post('/draft', [ProductController::class, 'createDraft']);
            Route::patch('/{id}/draft', [ProductController::class, 'saveDraft']);
            Route::patch('/{id}/status', [ProductController::class, 'updateStatus']);
        });
        Route::prefix('store')->group(function () {
            Route::get('/', [StoreController::class, 'show']);
            Route::put('/', [StoreController::class, 'update']);
        });
    });
});
