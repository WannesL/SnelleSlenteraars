<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\WandelingController;
use App\Http\Controllers\Public\InschrijvingController;
use App\Http\Controllers\Admin\LoginController;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/wandeling/{wandeling}/inschrijven', [InschrijvingController::class, 'store'])->middleware('throttle:5,1')->name('inschrijven');

Route::get('/wandeling/{wandeling}', [WandelingController::class, 'show'])->name('wandeling');

Route::middleware('guest')->group(function (){
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->middleware('throttle:5,1');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function (){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
});
