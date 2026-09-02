<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\WandelingController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/wandeling/{id}', [WandelingController::class, 'show']);
