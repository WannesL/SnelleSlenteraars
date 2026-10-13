<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\WandelingController;
use App\Http\Controllers\Public\InschrijvingController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/wandeling/{wandeling}/inschrijven', [InschrijvingController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('inschrijven');

Route::get('/wandeling/{wandeling}', [WandelingController::class, 'show'])->name('wandeling');
