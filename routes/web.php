<?php

use App\Http\Controllers\Home\IndexController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| route::prefix('my-cart')->group(function () {
*/
// -----------------------------------------Home
Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('/Tim-kiem', [IndexController::class, 'search'])->name('search');
Route::get('detai/{slug}', [IndexController::class, 'detail'])->name('detail');
Route::get('/category', [IndexController::class, 'category'])->name('category');
Route::get('/category/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('/my-cart', [IndexController::class, 'cart'])->name('cart');
Route::get('/pay', [IndexController::class, 'pay'])->name('pay');
Route::get('/find-cart', [IndexController::class, 'findOrder'])->name('findOrder');
Route::resource('cart', 'CartController')->only(['index', 'store', 'update', 'edit'])
    ->names([
        'edit' => 'remove',
        'index' => 'clear'
    ]);

// -----------------------------------------Admin
Route::get('/admin-login', [AuthController::class, 'login'])->name('login');
route::post('admin-logon', [AuthController::class, 'logon'])->name('logon');
route::prefix('admin')->middleware('auth')->group(function () {
    route::get('', [AuthController::class, 'index'])->name('admin');
    route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    route::get('/product/Delete-List', [ProductController::class, 'deleteList'])->name('deleteList')->middleware('can:productListDelete');
    route::get('/product/restore/{id}', [ProductController::class, 'restore'])->name('restore')->middleware('can:productRestore');
    route::get('/product/Delete/{id}', [ProductController::class, 'deleteOver'])->name('deleteOver')->middleware('can:productForceDelete');
    Route::get('order', 'OrderController@order')->name('order');
    Route::resource('category', 'CategoryController')->except(['show'])->middleware('can:category');
    Route::resource('product', 'ProductController')->middleware('can:product');
    Route::resource('banner', 'BannerController')->middleware('can:banner');
    Route::resource('permisstion', 'PermisstionController')->only(['store','destroy','index','create'])->middleware('can:permisstion');
    Route::resource('role', 'RoleController')->middleware('can:role');
    Route::resource('setting', 'SettingController')->middleware('can:setting');
    Route::resource('user', 'UserController')->middleware('can:user');
    Route::resource('managerOrder', 'ManagerOrderController')->middleware('can:order');
    // Route::resources([
    //     'category' => 'CategoryController',
    //     'product' => 'ProductController',
    //     'banner' => 'BannerController',
    //     'order' => 'OrderController',
    //     'permisstion' => 'PermisstionController',
    //     'role' => 'RoleController',
    //     'setting' => 'SettingController',
    //     'user' => 'UserController',
    // ]);
});
