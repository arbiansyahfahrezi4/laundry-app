<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;


// =========================
// BERANDA
// =========================

Route::get('/', function () {
    return view('welcome');
})->name('home');


// =========================
// LAYANAN
// =========================

// Semua user bisa melihat layanan

Route::get('/services', [ServiceController::class, 'index'])
    ->name('services.index');


// =========================
// LAYANAN ADMIN
// =========================

Route::middleware(['auth', 'admin'])->group(function () {

    // Tambah layanan
    Route::get('/services/create', [ServiceController::class, 'create'])
        ->name('services.create');

    // Simpan layanan
    Route::post('/services', [ServiceController::class, 'store'])
        ->name('services.store');

    // Form edit layanan
    Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])
        ->name('services.edit');

    // Update layanan
    Route::put('/services/{service}', [ServiceController::class, 'update'])
        ->name('services.update');

    // Hapus layanan
    Route::delete('/services/{service}', [ServiceController::class, 'destroy'])
        ->name('services.destroy');

});


// =========================
// REGISTER
// =========================

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);


// =========================
// LOGIN
// =========================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);


// =========================
// USER DASHBOARD
// =========================

Route::get('/user', [UserController::class, 'dashboard'])
    ->middleware('auth')
    ->name('user.dashboard');


// =========================
// ADMIN DASHBOARD
// =========================

Route::get('/admin', [AdminController::class, 'dashboard'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

// =========================
// LAPORAN ADMIN
// =========================

Route::get('/admin/laporan', [AdminController::class, 'laporan'])
    ->middleware(['auth', 'admin'])
    ->name('admin.laporan');


// =========================
// LOGOUT
// =========================

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// =========================
// ORDERS
// =========================

// Form pesan laundry
Route::get('/orders/create', [OrderController::class, 'create'])
    ->middleware('auth')
    ->name('orders.create');


// Simpan pesanan
Route::post('/orders', [OrderController::class, 'store'])
    ->middleware('auth')
    ->name('orders.store');


// Riwayat pesanan
// Admin  : semua pesanan
// User   : pesanan miliknya sendiri
Route::get('/orders', [OrderController::class, 'index'])
    ->middleware('auth')
    ->name('orders.index');


// Detail pesanan
Route::get('/orders/{order}', [OrderController::class, 'show'])
    ->middleware('auth')
    ->name('orders.show');


// Edit pesanan - khusus admin
Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])
    ->middleware(['auth', 'admin'])
    ->name('orders.edit');


// Update pesanan - khusus admin
Route::put('/orders/{order}', [OrderController::class, 'update'])
    ->middleware(['auth', 'admin'])
    ->name('orders.update');


// Update status - khusus admin
Route::put('/orders/{order}/status', [OrderController::class, 'updateStatus'])
    ->middleware(['auth', 'admin'])
    ->name('orders.updateStatus');

// Hapus pesanan - khusus admin
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])
    ->middleware(['auth', 'admin'])
    ->name('orders.destroy');