<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Public Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Public\HomeController;
use App\Http\Controllers\Public\ProductController as PublicProductController;
use App\Http\Controllers\Public\UmkmController as PublicUmkmController;


/*
|--------------------------------------------------------------------------
| Admin Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UmkmController;
use App\Http\Controllers\Admin\SearchController;


/*
|--------------------------------------------------------------------------
| Owner Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Owner\DashboardController as OwnerDashboardController;
use App\Http\Controllers\Owner\ProductController as OwnerProductController;
use App\Http\Controllers\Owner\ProfileController as OwnerProfileController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [
    HomeController::class,
    'index'
])
    ->name('home');


Route::view('/about', 'public.about')
    ->name('about');



/*
|--------------------------------------------------------------------------
| Public UMKM
|--------------------------------------------------------------------------
*/

Route::prefix('umkm')
    ->name('public.umkms.')
    ->group(function () {

        Route::get('/', [
            PublicUmkmController::class,
            'index'
        ])
            ->name('index');


        Route::get('/{umkm:slug}', [
            PublicUmkmController::class,
            'show'
        ])
            ->name('show');
    });



/*
|--------------------------------------------------------------------------
| Public Products
|--------------------------------------------------------------------------
*/

Route::prefix('produk')
    ->name('public.products.')
    ->group(function () {

        Route::get('/', [
            PublicProductController::class,
            'index'
        ])
            ->name('index');


        Route::get('/{product:slug}', [
            PublicProductController::class,
            'show'
        ])
            ->name('show');
    });




/*
|--------------------------------------------------------------------------
| Dashboard Redirect
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'verified'
])
    ->get('/dashboard', function () {

        return match (auth()->user()->role) {

            'admin' => redirect()
                ->route('admin.dashboard'),


            'owner' => redirect()
                ->route('owner.dashboard'),


            default => redirect()
                ->route('home'),
        };
    })
    ->name('dashboard');




/*
|--------------------------------------------------------------------------
| User Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')
    ->group(function () {

        Route::get('/profile', [
            ProfileController::class,
            'edit'
        ])
            ->name('profile.edit');


        Route::patch('/profile', [
            ProfileController::class,
            'update'
        ])
            ->name('profile.update');


        Route::delete('/profile', [
            ProfileController::class,
            'destroy'
        ])
            ->name('profile.destroy');
    });




/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:admin'
])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {


        Route::get('/dashboard', [
            AdminDashboardController::class,
            'index'
        ])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | Global Search
        |--------------------------------------------------------------------------
        */

        Route::get('/search', [
            SearchController::class,
            'index'
        ])
            ->name('search');


        /*
        |--------------------------------------------------------------------------
        | Master Data
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'categories',
            CategoryController::class
        );



        /*
        |--------------------------------------------------------------------------
        | UMKM Management
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'umkms',
            UmkmController::class
        );



        /*
        |--------------------------------------------------------------------------
        | Product Management
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'products',
            ProductController::class
        );
    });




/*
|--------------------------------------------------------------------------
| Owner Routes
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'role:owner'
])
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {


        Route::get('/dashboard', [
            OwnerDashboardController::class,
            'index'
        ])
            ->name('dashboard');



        /*
        |--------------------------------------------------------------------------
        | UMKM Profile
        |--------------------------------------------------------------------------
        */

        Route::get('/profile', [
            OwnerProfileController::class,
            'edit'
        ])
            ->name('profile.edit');


        Route::put('/profile', [
            OwnerProfileController::class,
            'update'
        ])
            ->name('profile.update');



        /*
        |--------------------------------------------------------------------------
        | Product Management
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'products',
            OwnerProductController::class
        )
            ->except([
                'show'
            ]);
    });



/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
