<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Public\WandelingController;

Route::get('/', [WandelingController::class, 'index'])->name('home');
