<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\RealtorListingController;
use App\Http\Controllers\RealtorListingImageController;
use App\Http\Controllers\ListingOfferController;
use App\Http\Controllers\RealtorListingAcceptOfferController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationSeenController;


Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::get('/show', [IndexController::class, 'show'])->name('show');


Route::resource('listing', App\Http\Controllers\ListingController::class)->only(['index', 'show']);

Route::resource('listing.offer', ListingOfferController::class)
  ->middleware('auth')
  ->only(['store']);

  Route::resource('notification', App\Http\Controllers\NotificationController::class)
  ->middleware('auth')
    ->only(['index']);

    Route::put('notification/{notification}/seen', App\Http\Controllers\NotificationSeenController::class)
    ->middleware('auth')
    ->name('notification.seen');

Route::get('login', [AuthController::class, 'create'])->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');

Route::resource('user-account', UserAccountController::class)
    ->only(['create', 'store']);

Route::prefix('realtor')
    ->name('realtor.')
    ->middleware('auth')
    ->group(function () {
        Route::name('listing.restore')
        ->put('listing/{listing}/restore',
        [RealtorListingController::class, 'restore']
        )->withTrashed();
        Route::resource('listing', RealtorListingController::class)
            // ->only(['index', 'destroy', 'edit', 'update', 'create', 'store'])
            ->withTrashed();

            Route::name('offer.accept')
            ->put('offer/{offer}/accept', RealtorListingAcceptOfferController::class);

            Route::resource('listing.image', RealtorListingImageController::class)
            ->only(['create', 'store', 'destroy']);
        });
