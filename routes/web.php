<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasakanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('orders', OrderController::class);

Route::get('/sign-in', function () {
    return view('pages.sign-in');
})->name('sign-in');

Route::get('/sign-up', function () {
    return view('pages.sign-up');
})->name('sign-up');

Route::get('/permissions', [UserController::class, 'index'])->name('permissions.index');

Route::get('/permissions/{user}/edit', [UserController::class, 'edit'])->name('permissions.edit');
Route::put('/permissions/{user}', [UserController::class, 'update'])->name('permissions.update');
Route::delete('/permissions/{user}', [UserController::class, 'destroy'])->name('permissions.destroy');

Route::get('/kasir', [KasirController::class, 'index'])->name('kasir');

// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource( 'menu', MasakanController::class);

Route::resource('users', UserController::class);

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/sign-in', [AuthController::class, 'showLoginForm'])->name('sign-in');
Route::post('/login', [AuthController::class, 'login'])->name('login');