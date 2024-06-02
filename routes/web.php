<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TiketController;

Route::get('/keranjang', [BookingController::class, 'showCart'])->name('keranjang');
Route::post('/keranjang/add/{lapanganId}', [BookingController::class, 'addToCart'])->name('keranjang.add');
Route::get('/checkout/{bookingId}', [BookingController::class, 'checkout'])->name('checkout');
Route::post('/checkout/process', [BookingController::class, 'processCheckout'])->name('checkout.process');
Route::get('/payment', [BookingController::class, 'showPaymentPage'])->name('payment');
Route::post('/payment/process', [BookingController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/success', [BookingController::class, 'successPayment'])->name('payment.success');
Route::delete('/keranjang/remove/{bookingId}', [BookingController::class, 'removeFromCart'])->name('keranjang.remove');


// Rute untuk mendaftarkan lapangan
Route::get('/daftarkan-lapangan', [LapanganController::class, 'showDaftarLapanganForm'])->name('daftarkan-lapangan');
Route::post('/daftarkan-lapangan', [LapanganController::class, 'storeLapangan'])->name('storeLapangan');

// Routes untuk booking
Route::post('/booking/add-to-cart/{lapanganId}', [BookingController::class, 'addToCart'])->name('booking.add_to_cart');
Route::post('/checkout/{bookingId}', [BookingController::class, 'checkout'])->name('checkout');
Route::post('/complete-checkout', [BookingController::class, 'completeCheckout'])->name('completeCheckout');
Route::delete('/remove-from-cart/{bookingId}', [BookingController::class, 'removeFromCart'])->name('remove_from_cart'); // Rute untuk menghapus item dari keranjang

// Rute untuk login dan register
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk halaman landing
Route::get('/landing', function () {
    return view('welcome');
})->name('landing');

// Rute untuk halaman utama
Route::get('/main', function () {
    return view('main');
})->name('main')->middleware('auth');

// Rute untuk halaman profil
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile')->middleware('auth');

Route::get('/fields', function () {
    return 'Daftar Lapangan - Under Construction';
})->name('fields')->middleware('auth');

// Rute untuk dashboard admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('auth')->name('admin.dashboard');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/main', [MainPageController::class, 'mainView'])->name('main');

Route::get('/lapangan/{id}', [MainPageController::class, 'detail'])->name('lapangan.detail');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/admin/dashboard/approve/{id}', [AdminController::class, 'approve'])->name('admin.dashboard.approve');
Route::post('/admin/dashboard/reject/{id}', [AdminController::class, 'reject'])->name('admin.dashboard.reject');

Route::get('/tiket', [TiketController::class, 'index'])->name('tiket');
