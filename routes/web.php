<?php

use App\Http\Controllers\AuthenticateController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\ProductModelController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
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
    Route::get('product_images', [ProductImageController::class, 'index'])->name('product_images.index');
    Route::get('product_images/{ProductName}/edit', [ProductImageController::class, 'edit'])->name('product_images.edit');
    Route::post('product_images', [ProductImageController::class, 'store'])->name('product_images.store');
    Route::get('/product_images/{ProductName}/delete', [ProductImageController::class, 'delete'])->name('product_images.delete');
    Route::delete('/product_images/{id}', [ProductImageController::class, 'destroy'])->name('product_images.destroy');
    // Product Model & Type
    Route::resource('product_models', ProductModelController::class);
    Route::get('/product_types', [ProductTypeController::class, 'index'])->name('product_types.index');
    Route::delete('/product_types', [ProductTypeController::class, 'destroy'])->name('product_types.destroy');
    // Staff
    Route::get('/staffs', [StaffController::class, 'index'])->name('staffs.index');
    Route::get('/staffs/create', [StaffController::class, 'create'])->name('staffs.create');
    Route::post('/staffs', [StaffController::class, 'store'])->name('staffs.store');
    Route::get('/staffs/{email}', [StaffController::class, 'show'])->name('staffs.show');
    Route::put('/staffs', [StaffController::class, 'update'])->name('staffs.update');
    // Customer
    Route::get('customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('customers/{id}', [CustomerController::class, 'show'])->name('customers.show');
    // Bill
    Route::get('bills', [BillController::class, 'index'])->name('bills.index');
    Route::get('bills/{id}/details', [BillController::class, 'show'])->name('bills.show');
    Route::put('update-bills', [BillController::class, 'update'])->name('bills.update');
});

// Giỏ hàng
Route::middleware('customer')->group(function () {
    Route::get('gio-hang', [CartController::class, 'index'])->name('carts.index');
    Route::post('them-vao-gio-hang', [CartController::class, 'addToCart'])->name('carts.add');
    Route::get('xac-nhan-thanh-toan', [CartController::class, 'show'])->name('carts.show');
    Route::post('cap-nhat-so-luong-gio-hang', [CartController::class, 'update'])->name('carts.update');
    Route::post('thanh-toan', [CartController::class, 'payment'])->name('carts.payment');
    Route::delete('xoa-khoi-gio-hang', [CartController::class, 'removeFromCart'])->name('carts.destroy');


    Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('profile/{email}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/reject', [ProfileController::class, 'reject'])->name('profile.reject');
    Route::put('profile/received', [ProfileController::class, 'received'])->name('profile.received');
});

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/search', [HomeController::class, 'search'])->name('search');
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



