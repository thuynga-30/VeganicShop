<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\MainController;
use App\Http\Controllers\User\AccountController;
use App\Http\Controllers\User\ProductController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\OrderController;

// Route chính của trang shop
Route::get('main/shop/index', [MainController::class, 'index'])->name('index');
Route::get('users/log-sign/signup', [AccountController::class, 'signup'])->name('signup');
Route::get('/verify-account/{email}',[AccountController::class, 'verify'])->name('verify');
Route::post('users/log-sign/signup/save', [AccountController::class, 'save']);

Route::get('users/log-sign/login', [AccountController::class, 'login'])->name('login');
Route::post('users/log-sign/login/store', [AccountController::class, 'store']);

Route::get('users/log-sign/forgot-password', [AccountController::class, 'forgotPass'])->name('forgot');
Route::post('/check-forgot', [AccountController::class, 'check_forgot']);

Route::get('/reset-password/{token}', [AccountController::class, 'resetPass'])->name('reset');
Route::post('/check-reset/{token}', [AccountController::class, 'Check_resetPass']);


// Route cần đăng nhập (dùng middleware 'auth')
Route::middleware(['auth'])->group(function () {
  Route::prefix('admin')->group(function(){
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin.admin');
    Route::get('/admin/user_manager', [AdminController::class, 'user_manager'])->name('admin.user_manager');
    //add_user
    Route::post('/admin/add_user', [AdminController::class, 'add_user'])->name('admin.add_user');
    Route::post('/admin/user_manager/update/{id}', [AdminController::class, 'update_user'])->name('admin.update_user');
    Route::post('/admin/user_manager/delete/{user}', [AdminController::class, 'user_delete'])->name('admin.delete_user');

    Route::get('/admin/product_manager', [AdProductController::class, 'product_manager'])->name('admin.product_manager');
    Route::post('/admin/add_product', [AdProductController::class, 'save_product'])->name('admin.add_product');
    Route::get('/admin/edit_manager/{$id}', [AdProductController::class, 'edit_manager'])->name('admin.edit');

    Route::post('/admin/product_manager/update/{product}', [AdProductController::class, 'update_product'])->name('admin.update_product');
    Route::post('/admin/product_manager/delete/{product}', [AdProductController::class, 'product_delete'])->name('admin.delete_product');
    Route::get('/admin/order_manager', [AdminController::class, 'order_manager'])->name('admin.order_manager');
  });
    Route::get('/logout', [MainController::class, 'logout'])->name('logout');
    Route::get('/profile', [MainController::class, 'profile'])->name('profile');
    Route::post('/update-profile', [MainController::class, 'updateProfile'])->name('updateProfile');
    Route::get('/contact', [MainController::class, 'contact'])->name('contact');
    Route::post('/contact/store', [MainController::class, 'contact_store'])->name('contact-store');
});
   
    // about
    Route::get('/about', [MainController::class, 'about'])->name('about');
   
    //product
    Route::get('/product', [ProductController::class, 'product'])->name('product');
    Route::get('/product/{product}', [ProductController::class, 'product_details'])->name('details');
    Route::get('/product/{product}/add-to-cart', [ProductController::class, 'add_to_cart'])->name('add_to_cart');
    //search
    Route::get('/search', [ProductController::class, 'search'])->name('search');
    // Route::get('/search/{search}', [ProductController::class, 'search_product'])->name('search_product');
   
    //group prefix
    Route::prefix('cart')->group(function () {
        Route::get('/cart', [CartController::class, 'cart'])->name('cart.cart');
        Route::get('/cart/add/{product}', [CartController::class, 'add_cart'])->name('cart.add');
        Route::get('/cart/delete/{product}', [CartController::class, 'delete_cart'])->name('cart.delete');
        Route::get('cart/update/{product}', [CartController::class, 'update_cart'])->name('cart.update');
        Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
        Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
      });
    //order
    Route::prefix('order')->group(function () {
      Route::get('/order', [OrderController::class, 'order'])->name('order.order');
      Route::post('/order/checkout', [OrderController::class, 'checkout'])->name('order.checkout');
      Route::get('/order/detail/{order}', [OrderController::class, 'orderDetail'])->name('order.detail');
    });


  
        


    
    
