<?php

use App\Http\Controllers\BrainTreeController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Listing\ListingContactController;
use App\Http\Controllers\Listing\ListingController;
use App\Http\Controllers\Listing\ListingFavoriteController;
use App\Http\Controllers\Listing\ListingPaymentController;
use App\Http\Controllers\Listing\ListingViewedController;
use App\Http\Controllers\User\AreaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/braintree/token', [BrainTreeController::class, 'token'])
    ->name('braintree.token');

Route::get('/user/area/{area}', [AreaController::class, 'store'])
    ->name('user.area.store');

Route::prefix('/{area}')->group(function () {
    // Category
    Route::prefix('/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])
            ->name('category.index');

        // Category Listings
        Route::prefix('/{category}')->group(function () {
            Route::get('/listings', [ListingController::class, 'index'])
                ->name('listings.index');
        });
    });

    // Listings
    Route::prefix('/listing')->namespace('Listing')->group(function () {
        Route::get('/favorites', [ListingFavoriteController::class, 'index'])
            ->name('listings.favorites.index');
        Route::post('/{listing}/favorites', [ListingFavoriteController::class, 'store'])
            ->name('listings.favorites.store');
        Route::delete('/{listing}/favorites', [ListingFavoriteController::class, 'destroy'])
            ->name('listings.favorites.destroy');
        Route::get('/viewed', [ListingViewedController::class, 'index'])
            ->name('listings.viewed.index');
        Route::post('/{listing}/contact', [ListingContactController::class, 'store'])
            ->name('listings.contact.store');

        // Payment Routes
        Route::get('/{listing}/payment', [ListingPaymentController::class, 'show'])
            ->name('listings.payment.show');
        Route::post('/{listing}/payment', [ListingPaymentController::class, 'store'])
            ->name('listings.payment.store');

        // Added Auth middleware in controllers where needed above, trying route grouping here as well
        Route::middleware(['auth'])->group(function () {
            Route::get('/create', [ListingController::class, 'create'])
                ->name('listings.create');
            Route::post('/store', [ListingController::class, 'store'])
                ->name('listings.store');
            Route::get('/{listing}/edit', [ListingController::class, 'edit'])
                ->name('listings.edit');
            Route::patch('/{listing}/update', [ListingController::class, 'update'])
                ->name('listings.update');
        });
    });

    Route::get('/{listing}', [ListingController::class, 'show'])
        ->name('listings.show');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
