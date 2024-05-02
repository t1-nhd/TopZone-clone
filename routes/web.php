<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductModelController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\StaffController;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Staff;
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

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    // Product
    Route::resource('products', ProductController::class);
    Route::get('/products/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');
    // ProductImage
    Route::get('/product_images', [ProductImageController::class, 'index'])->name('product_images.index');
    Route::get('/product_images/{ProductName}/edit', [ProductImageController::class, 'edit'])->name('product_images.edit');
    Route::post('/product_images', [ProductImageController::class, 'store'])->name('product_images.store');
    Route::get('/product_images/{ProductName}/delete', [ProductImageController::class, 'delete'])->name('product_images.delete');
    Route::delete('/product_images/{id}', [ProductImageController::class, 'destroy'])->name('product_images.destroy');
    // Product Model & Type
    Route::resource('product_models', ProductModelController::class);
    Route::get('/product_types', [ProductTypeController::class, 'index'])->name('product_types.index');
    Route::delete('/product_types', [ProductTypeController::class, 'destroy'])->name('product_types.destroy');

    Route::resource('staffs', StaffController::class);
});
// Giỏ hàng
Route::middleware('login')->group(function () {
    Route::get('gio-hang', [CartController::class, 'index'])->name('carts.index');
    Route::post('them-vao-gio-hang', [CartController::class, 'addToCart'])->name('carts.add');
    Route::post('cap-nhat-so-luong-gio-hang', [CartController::class, 'update'])->name('carts.update');
    Route::delete('xoa-khoi-gio-hang', [CartController::class, 'removeFromCart'])->name('carts.destroy');
});

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('index');
// Khóa tài khoản


// Danh mục sản phẩm
Route::get('/danh-muc/{productType}', [HomeController::class, 'list'])->name('list');
Route::get('/dong-san-pham/{productModel}', [HomeController::class, 'filter'])->name('filter');
Route::get('/{productName}-{Memory}', [HomeController::class, 'show'])->name('show');

// Đăng nhập
Route::get('login', [AuthenticateController::class, 'showLogin'])->name('show-login');
Route::post('login', [AuthenticateController::class, 'login'])->name('login');
Route::get('registration', [AuthenticateController::class, 'showRegistration'])->name('show-registration');
Route::post('registration', [AuthenticateController::class, 'registration'])->name('registration');
Route::get('logout', [AuthenticateController::class, 'logout'])->name('logout');



