<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomProductController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\DeleteTemporaryProductImageController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TemporaryProductImageController;
use App\Http\Controllers\UserController;
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

Route::get('/', [DefaultController::class, 'index'])->name('home');
Route::get('/gallery', [DefaultController::class, 'gallery'])->name('home.gallery');
Route::get('/products', [DefaultController::class, 'products'])->name('home.products');
Route::get('/brand-supplier', [DefaultController::class, 'brandSupplier'])->name('home.brand-supplier');
Route::get('/products/{product_id}', [DefaultController::class, 'productsView'])->name('products.show');
Route::get('/workshop', [DefaultController::class, 'workshop'])->name('home.workshop');
Route::get('/templates', [DefaultController::class, 'templates'])->name('home.templates');
Route::get('/template/view/{tab}', [DefaultController::class, 'templateView'])->name('home.template-view');
Route::get('/our-story', [DefaultController::class, 'ourStory'])->name('home.story');
Route::get('/customer-reviews', [DefaultController::class, 'customerReviews'])->name('home.customer-reviews');
Route::get('/store-location', [DefaultController::class, 'storeLocation'])->name('home.store-location');
Route::get('/help-center', [AuthController::class, 'help'])->name('home.help-center');

// Auth Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/auth/signup', [AuthController::class, 'authRegister'])->name('auth.signup');
Route::post('/auth/login', [AuthController::class, 'authLogin'])->name('auth.login');
Route::get('/auth/logout', [AuthController::class, 'authLogout'])->name('auth.logout');

Route::prefix('admin')->group(function () {
    Route::prefix('manage')->group(function () {
        Route::get('/', [AdminController::class, 'manageDashboard'])->name('admin.manage.dashboard');
        Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.manage.users');
        Route::get('/gallery', [AdminController::class, 'manageGallery'])->name('admin.manage.gallery');
        Route::get('/categories', [AdminController::class, 'manageCategories'])->name('admin.manage.categories');
        Route::get('/products', [AdminController::class, 'manageProducts'])->name('admin.manage.products');
        Route::get('/brands', [AdminController::class, 'manageBrands'])->name('admin.manage.brands');
        Route::get('/orders', [AdminController::class, 'manageOrders'])->name('admin.manage.orders');
        Route::get('/settings', [AdminController::class, 'manageSettings'])->name('admin.manage.settings');


        Route::get('/promotion', [AdminController::class, 'managePromotion'])->name('admin.manage.promotion');
        Route::get('/payments', [AdminController::class, 'managePayments'])->name('admin.manage.payments');
        Route::get('/fulfillment', [AdminController::class, 'manageFulfillment'])->name('admin.manage.fulfillment');
        Route::get('/generate-report', [AdminController::class, 'manageReports'])->name('admin.manage.reports');
    });

    Route::prefix('gallery')->group(function () {
        Route::post('/store', [GalleryController::class, 'store'])->name('gallery.store');
        Route::put('/update', [GalleryController::class, 'store'])->name('gallery.update');
        Route::delete('/delete', [GalleryController::class, 'destroy'])->name('gallery.delete');
    });

    Route::prefix('products')->group(function () {
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::get('/colors', [ProductController::class, 'colors'])->name('product.colors');
        Route::post('/colors/store', [ProductController::class, 'storeColor'])->name('product.colors.store');
        Route::get('/custom-template', [CustomProductController::class, 'create'])->name('product.custom');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::post('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update', [ProductController::class, 'update'])->name('product.update');
        Route::post('/upload-temp', TemporaryProductImageController::class);
        Route::delete('/delete-temp', DeleteTemporaryProductImageController::class);
        Route::delete('/delete', [ProductController::class, 'delete'])->name('product.delete');
    });

    Route::prefix('brands')->group(function () {
        Route::get('/create', [BrandController::class, 'create'])->name('brands.create');
        Route::post('/store', [BrandController::class, 'store'])->name('brands.store');
        Route::put('/update', [BrandController::class, 'store'])->name('brands.update');
        Route::delete('/delete', [BrandController::class, 'delete'])->name('brands.delete');
    });

    Route::prefix('category')->group(function () {
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/update', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/delete', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
});

Route::prefix('users')->group(function () {
    Route::get('/profile', [UserController::class, 'profile'])->name('users.profile');
    Route::get('/checkout', [UserController::class, 'checkout'])->name('users.checkout');
    Route::get('/ship', [UserController::class, 'ship'])->name('users.ship');
    Route::post('/delete', [UserController::class, 'delete'])->name('users.delete');
});
Route::prefix('admin')->group(function () {
    Route::post('/image-upload-tshirt', [MasterController::class, 'imageUploadTshirt'])->name('admin.image.upload.tshirt');
});
