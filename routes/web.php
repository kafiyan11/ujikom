<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisPembayaranController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login',[AuthController::class, 'login']);
Route::post('logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'RoleMiddleware:Admin'])->group(function () {

    Route::get('/dashboard/admin',[DashboardController::class, 'admin'])->name('admin.index');

    //tambah konsumen
    Route::get('konsumens', [KonsumenController::class, 'index'])->name('konsumens.index');
    Route::get('konsumens/create', [KonsumenController::class, 'create'])->name('konsumens.create');
    Route::post('konsumens', [KonsumenController::class, 'store'])->name('konsumens.store');
    Route::get('konsumens/{konsumen}/edit', [KonsumenController::class, 'edit'])->name('konsumens.edit');
    Route::put('konsumens/{konsumen}', [KonsumenController::class, 'update'])->name('konsumens.update');
    Route::delete('konsumens/{konsumen}', [KonsumenController::class, 'destroy'])->name('konsumens.destroy');

    // tambah produk
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    // tambah layanan
    Route::get('layanan', [LayananController::class, 'index'])->name('layanan.index');
    Route::get('layanan/create', [LayananController::class, 'create'])->name('layanan.create');
    Route::post('layanan', [LayananController::class, 'store'])->name('layanan.store');
    Route::get('layanan/{layanan}/edit', [LayananController::class, 'edit'])->name('layanan.edit');
    Route::put('layanan/{layanan}', [LayananController::class, 'update'])->name('layanan.update');
    Route::delete('layanan/{layanan}', [LayananController::class, 'destroy'])->name('layanan.destroy');

    // Route untuk bagian jenis pembayaran
    Route::get('jenis_pembayaran', [JenisPembayaranController::class, 'index'])->name('jenis_pembayaran.index');
    Route::get('jenis_pembayaran/create', [JenisPembayaranController::class, 'create'])->name('jenis_pembayaran.create');
    Route::post('jenis_pembayaran', [JenisPembayaranController::class, 'store'])->name('jenis_pembayaran.store');
    Route::get('jenis_pembayaran/{jenis_pembayaran}/edit', [JenisPembayaranController::class, 'edit'])->name('jenis_pembayaran.edit');
    Route::put('jenis_pembayaran/{jenis_pembayaran}', [JenisPembayaranController::class, 'update'])->name('jenis_pembayaran.update');
    Route::delete('jenis_pembayaran/{jenis_pembayaran}', [JenisPembayaranController::class, 'destroy'])->name('jenis_pembayaran.destroy');

    Route::get('petugas', [PetugasController::class, 'index'])->name('admin.petugas.index');
    Route::get('petugas/create', [PetugasController::class, 'create'])->name('admin.petugas.create');
    Route::post('petugas', [PetugasController::class, 'store'])->name('admin.petugas.store');
    Route::get('petugas/{user}/edit', [PetugasController::class, 'edit'])->name('admin.petugas.edit');
    Route::put('petugas/{user}', [PetugasController::class, 'update'])->name('admin.petugas.update');
    Route::delete('petugas/{user}', [PetugasController::class, 'destroy'])->name('admin.petugas.destroy');

    // route untuk bagian order
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{order}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('destroy/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::resource('orders', OrderController::class)->except(['show']);
    Route::get('/orders/pdf', [OrderController::class, 'generatePDF'])->name('orders.pdf');
});
Route::middleware(['auth', 'RoleMiddleware:Petugas'])->group(function () {

    Route::get('/dashboard/petugas',[DashboardController::class, 'petugas'])->name('petugas.index');

});
Route::middleware(['auth', 'RoleMiddleware:Pimpinan'])->group(function () {

    Route::get('/dashboard/pimpinan',[DashboardController::class, 'pimpinan'])->name('pimpinan.index');

});
