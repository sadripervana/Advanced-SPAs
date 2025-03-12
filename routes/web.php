<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/show', [IndexController::class, 'show'])->name('show');
