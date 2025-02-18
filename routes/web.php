<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasakanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WaiterController;

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

//Login Sign In Sign Up
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::get('/sign-in', function () {
    return view('pages.sign-in');
})->name('sign-in');
Route::get('/sign-up', function () {
    return view('pages.sign-up');
})->name('sign-up');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/sign-in', [AuthController::class, 'showLoginForm'])->name('sign-in');
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::get('/order', [DashboardController::class, 'index'])->name('dashboard')->middleware('role');

Route::post('/orders/store', [OrderController::class, 'store'])->name('orders.store')->middleware('role');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware('role');
Route::delete('/orders/{order}/cancel', [OrderController::class, 'cancelOrder'])->name('orders.cancel')->middleware('role');
Route::post('/orders/{order}/confirm', [OrderController::class, 'confirmOrder'])->name('orders.confirm')->middleware('role');

Route::get('/order/success', function () {
    return view('pages.order.success');
})->name('order.success');

Route::get('/waiter', [WaiterController::class, 'index'])->name('waiter')->middleware('role');
Route::put('/order/{order}/update', [WaiterController::class, 'updateStatus'])->name('order.updateStatus')->middleware('role');

Route::get('/kasir', [KasirController::class, 'index'])->name('kasir')->middleware('role');

Route::get('/permissions', [UserController::class, 'index'])->name('permissions.index')->middleware('role:1');

Route::get('/permissions/{user}/edit', [UserController::class, 'edit'])->name('permissions.edit')->middleware('role:1');
Route::put('/permissions/{user}', [UserController::class, 'update'])->name('permissions.update')->middleware('role:1');
Route::delete('/permissions/{user}', [UserController::class, 'destroy'])->name('permissions.destroy')->middleware('role:1');


Route::resource('menu', MasakanController::class)->middleware('role');
Route::resource('users', UserController::class)->middleware('role:1');

