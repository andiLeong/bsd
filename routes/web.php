<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackagePaymentController;
use App\Http\Controllers\PackagePriceController;
use App\Http\Controllers\SlipController;
use App\Http\Controllers\TrackingController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('login'));
Route::get('/login', fn() => view('login'))->name('login');

Route::post('/login', [\App\Http\Controllers\LoginController::class,'store']);


Route::middleware(['auth','admin.only'])->group(function () {

    Route::get('/users', [UsersController::class,'index'])->name('users.index');
    Route::get('/trackings', [TrackingController::class,'index'])->name('trackings.index');

    Route::get('/packages', [PackageController::class,'index'])->name('packages.index');
    Route::get('/packages/{package}', [PackageController::class,'show'])->name('packages.show');
    Route::patch('/packages/{package}/payment', [PackagePaymentController::class,'update'])->name('packages.payment.update');
    Route::get('/packages/{package}/price', [PackagePriceController::class,'edit'])->name('packages.price.edit');
    Route::patch('/packages/{package}/price', [PackagePriceController::class,'update'])->name('packages.price.update');

    Route::get('/slip', [SlipController::class,'index'])->name('slip.index');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LogoutController::class, 'store']);

});


