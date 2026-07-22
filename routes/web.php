<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Public
use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\UmkmController as PublicUmkmController;
use App\Http\Controllers\Public\ProductController as PublicProductController;

// Admin
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\ProductController;

// Owner
use App\Http\Controllers\Owner\DashboardController as OwnerDashboardController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::view('/about', 'public.about')
    ->name('about');

Route::prefix('umkm')
    ->name('public.umkms.')
    ->group(function () {

        Route::get('/', [PublicUmkmController::class, 'index'])
            ->name('index');

        Route::get('/{umkm:slug}', [PublicUmkmController::class, 'show'])
            ->name('show');
    });

Route::prefix('produk')
    ->name('public.products.')
    ->group(function () {

        Route::get('/', [PublicProductController::class, 'index'])
            ->name('index');

        Route::get('/{product:slug}', [PublicProductController::class, 'show'])
            ->name('show');
    });

/*
|--------------------------------------------------------------------------
| Dashboard Redirect
|--------------------------------------------------------------------------
|
| Single entry point after login.
| Redirect users to the correct dashboard based on their role.
|
*/

Route::middleware(['auth', 'verified'])
    ->get('/dashboard', function () {

        return match (auth()->user()->role) {

            'admin' => redirect()->route('admin.dashboard'),

            'owner' => redirect()->route('owner.dashboard'),

            default => redirect()->route('home'),

        };

    })
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Master Data
        |--------------------------------------------------------------------------
        */

        Route::resource('categories', CategoryController::class);

        /*
        |--------------------------------------------------------------------------
        | UMKM
        |--------------------------------------------------------------------------
        */

        Route::resource('umkms', UmkmController::class);

        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        */

        Route::resource('products', ProductController::class);
    });

/*
|--------------------------------------------------------------------------
| Owner Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:owner'])
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {

        Route::get('/dashboard', [OwnerDashboardController::class, 'index'])
            ->name('dashboard');

        // Route::resource('umkms', OwnerUmkmController::class);
        // Route::resource('products', OwnerProductController::class);
    });

require __DIR__.'/auth.php';
