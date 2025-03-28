<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAccountController;

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/show', [IndexController::class, 'show'])->name('show');

Route::resource('listing', App\Http\Controllers\ListingController::class)->only(['create', 'store', 'edit','update', 'destroy'])->middleware('auth');
Route::resource('listing', App\Http\Controllers\ListingController::class)->except(['create', 'store', 'edit', 'update', 'destroy']);

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)
->only(['create', 'store']);
