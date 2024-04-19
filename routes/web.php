<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
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
    Route::get('/', function(){return view('admin.index');});
    Route::resource('products', ProductController::class);
    // Route::post('products/{product}', [ProductController::class, 'update'])->name('products.update');

    Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
    Route::resource('product_models', ProductModelController::class);
    Route::get('/product_types', [ProductTypeController::class, 'index'])->name('product_types.index');
    Route::delete('/product_types', [ProductTypeController::class, 'destroy'])->name('product_types.destroy');
});


Route::get('/', function () {
    return view('admin.index');
})->name('admin.index');
