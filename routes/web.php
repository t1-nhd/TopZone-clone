<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductModelController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\StaffController;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->group(function(){
    Route::get('/', function(){return view('admin.index');})->name('admin.index');
    // Product
    Route::resource('products', ProductController::class);
    // ProductImage
    Route::get('/product_images', [ProductImageController::class, 'index'])->name('product_images.index');
    Route::get('/product_images/{ProductName}/edit', [ProductImageController::class, 'edit'])->name('product_images.edit');
    Route::post('/product_images', [ProductImageController::class, 'store'])->name('product_images.store');
    Route::get('/product_images/{ProductName}/delete', [ProductImageController::class, 'delete'])->name('product_images.delete');
    Route::delete('/product_images/{id}', [ProductImageController::class, 'destroy'])->name('product_images.destroy');



    Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
    Route::resource('product_models', ProductModelController::class);
    Route::get('/product_types', [ProductTypeController::class, 'index'])->name('product_types.index');
    Route::delete('/product_types', [ProductTypeController::class, 'destroy'])->name('product_types.destroy');
});

Route::get('/{productType}', [ProductController::class, 'list'])->name('products.list');
Route::get('/', function () {
    return view('welcome');
})->name('index');
