<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('products', ProductController::class);
Route::resource('sales', SaleController::class);
Route::post('/sales/{sale}/add-detail', [SaleController::class, 'addDetail'])->name('sales.addDetail');
Route::delete('/sales/details/{detail}', [SaleController::class, 'destroyDetail'])->name('sales.details.destroy');
Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
Route::get('/sales/{sale}/edit', [SaleController::class, 'edit'])->name('sales.edit');
Route::delete('/sales/details/{detail}', [SaleController::class, 'destroyDetail'])->name('sales.details.destroy');
Route::resource('sales', SaleController::class);



