<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;

Route::get('/login',[AuthController::class,'loginPage']);
Route::post('/login',[AuthController::class,'login']);

Route::get('/register',[AuthController::class,'registerPage']);
Route::post('/register',[AuthController::class,'register']);

Route::post('/logout',[AuthController::class,'logout']);



Route::middleware(['auth','role:user'])->get('/user',[DashboardController::class,'user']);
Route::middleware(['auth','role:admin'])->get('/admin/dashboard',[DashboardController::class,'admin']);
Route::middleware(['auth','role:superadmin'])->get('/superadmin',[DashboardController::class,'superadmin']);

Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']); 
Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/admin/rekap/pdf', [AdminReportController::class, 'pdf'])
        ->name('admin.rekap.pdf');

    Route::get('/rekap/excel', [AdminReportController::class, 'excel'])
        ->name('admin.rekap.excel');
});


Route::prefix('admin')->middleware('auth')->group(function () {

});
Route::get('/admin/product', [ProductController::class, 'index']);
Route::get('/admin/product/create', [ProductController::class, 'create']);
Route::post('/admin/product', [ProductController::class, 'store']);

Route::get('/admin/product/{id}/edit', [ProductController::class, 'edit']);

Route::post('/admin/product/update/{id}', [ProductController::class, 'update']);
Route::post('/admin/product/{id}/delete', [ProductController::class, 'destroy']);


Route::prefix('admin')->middleware(['auth',])->group(function () {
    Route::get('/ordersadmin', [AdminOrderController::class, 'index']);
    Route::post('/orders/{id}/status', [AdminOrderController::class, 'updateStatus']);
    Route::post('/orders/{id}/confirm', [AdminOrderController::class, 'confirmPayment']);
});




Route::get('/user', [HomeController::class, 'index'])
     ->name('user.dashboard');

Route::post('/add-to-cart/{id}', [CartController::class, 'add']);
Route::get('/cart', [CartController::class, 'index']);
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/checkout', [CheckoutController::class, 'store']);

Route::get('/orders', [OrderController::class, 'index'])
    ->name('orders.index');

Route::post('/orders/{order}/cancel', 
    [OrderController::class, 'cancel']
)->name('orders.cancel');


Route::get('/menu', [MenuController::class, 'index'])
    ->middleware('auth');


