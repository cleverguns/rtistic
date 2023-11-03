<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

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

Route::get( '/gallery', [GalleryController::class, 'api'])->name('api.gallery');
Route::get( '/categories', [CategoryController::class, 'categories'])->name('api.categories');
Route::get( '/brands', [BrandController::class, 'api'])->name('api.brands');
Route::get( '/colors', [ProductController::class, 'colorApi'])->name('api.colors');
Route::get( '/products', [ProductController::class, 'productApi'])->name('api.products');
