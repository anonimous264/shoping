<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustumerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PymentController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\Shoping_OrderController;
use App\Http\Controllers\UserController;
use App\Models\Custumer;
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
/*
*:::::::::::::::::::Rutas de los shoping:::::::::::::::::::::::
*/
Route::resource('users', UserController::class)->middleware('auth');
Route::resource('custumers', CustumerController::class)->middleware('auth');
Route::resource('categories', CategoryController::class)->middleware('auth');
Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('sellers', SellerController::class)->middleware('auth');
Route::resource('pyments',PymentController::class)->middleware('auth');
Route::resource('deliveries', DeliveryController::class)->middleware('auth');
Route::resource('shoping_orders', Shoping_orderController::class)->middleware('auth');
