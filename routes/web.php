<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/show', [IndexController::class, 'show'])->name('show');

Route::resource('listing', App\Http\Controllers\ListingController::class)->only([
    'index', 'show', 'create', 'store'
]);
