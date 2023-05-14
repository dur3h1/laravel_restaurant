<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderWaiter;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('restaurant.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    // Route::get('/admin/profile', 'Profile')->name('admin.profile');
    // Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    // Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    // Route::get('/change/password', 'ChangePassword')->name('change.password');
    // Route::post('/update/password', 'UpdatePassword')->name('update.password');

});

Route::controller(OrderWaiter::class)->group(function () {
    Route::get('/order', 'ViewOrder')->name('order.view');
    // Route::get('/order/{id}', 'addToCart')->name('add.to.cart');
    // Route::get('/order/{id}', 'addToCartbtn')->name('add.to.cartbtn');
    Route::get('/delete-from-cart/{id}', 'delete')->name('delete.from.cart');
    Route::post('/add-to-cart', 'addProductAjax');



});

require __DIR__.'/auth.php';
