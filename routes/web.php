<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProfileController,
    CategoryController,
    ProductController,
    UserController,
    FrontendController
};
use App\Models\Category;

// Public Routes

Route::get('/', function () {
    return view('welcome');
});


//  Dashboard

Route::get('/dashboard', function () {
    $categories = Category::all();
    return view('dashboard', compact('categories'));
})->middleware(['auth', 'verified'])->name('dashboard');


//  Auth Routes

require __DIR__ . '/auth.php';

//  AUTHENTICATED AREA


Route::middleware('auth')->group(function () {

//  PROFILE

    Route::controller(ProfileController::class)->group(function () {

        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');

    });

 //  ADMIN AREA

    Route::prefix('admin')
        ->middleware('role:Admin')
        ->group(function () {

            Route::get('/dashboard', fn () => "Admin Area")
                ->name('admin.dashboard');

            Route::controller(UserController::class)->group(function () {

                Route::get('/users', 'index')->name('users.index');

                Route::get('/users/{id}/roles', 'editRole')->name('users.roles');

                Route::post('/users/{id}/roles', 'updateRole')->name('users.roles.update');

                Route::get('/users/{id}/edit', 'edit')->name('users.edit');

                Route::put('/users/{id}', 'update')->name('users.update');

                Route::delete('/users/{id}', 'destroy')->name('users.destroy');
            });

        });

 //  MANAGER + ADMIN

    Route::middleware('role:Manager|Admin')
        ->group(function () {

            Route::resource('categories', CategoryController::class);
            Route::resource('products', ProductController::class);

        });

 //  FRONTEND / SHOP

    Route::prefix('shop')
        ->controller(FrontendController::class)
        ->group(function () {

            Route::get('/', 'index')->name('shop');

            Route::get('/product/{id}', 'show')->name('product.details');

            Route::get('/category/{id}', 'categoryProducts')->name('shop.category');

        });

});