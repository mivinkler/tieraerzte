<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function() {return 'привет';});
Route::get('/home', [App\Http\Controllers\Main\HomeController::class, 'index'])->name('home');

Route::namespace('App\Http\Controllers\Main')->group(function () {
    Route::get('/search', 'IndexController')->name('praxis.index');
    Route::get('/praxis/{slug}', 'ShowController')->name('praxis.show')->where('slug', '^(?!home$).*');
});

Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth', 'admin'])->group(function () {
    Route::prefix('praxis')->namespace('Praxis')->group(function () {
        Route::get('/index', 'PraxisIndexController')->name('admin.praxis.index');
        Route::get('/create', 'PraxisCreateController')->name('admin.praxis.create');
        Route::post('/', 'PraxisStoreController')->name('admin.praxis.store');
        Route::get('/{praxis}/edit', 'PraxisEditController')->name('admin.praxis.edit');
        Route::patch('/{praxis}', 'PraxisUpdateController')->name('admin.praxis.update');
        Route::delete('/praxis/{praxis}', 'PraxisDestroyController')->name('admin.praxis.delete');
    });
    Route::prefix('user')->namespace('User')->group(function () {
        Route::get('/index', 'UserIndexController')->name('admin.user.index');
        Route::get('/create', 'UserCreateController')->name('admin.user.create');
        Route::post('/', 'UserStoreController')->name('admin.user.store');
        Route::get('/{user}/edit', 'UserEditController')->name('admin.user.edit');
        Route::patch('/{user}', 'UserUpdateController')->name('admin.user.update');
        Route::delete('/user/{user}', 'UserDestroyController')->name('admin.user.delete');
    });
});

Route::prefix('user')->namespace('App\Http\Controllers\User')->middleware(['auth', 'user', 'verified'])->group(function () {
    Route::prefix('praxis')->namespace('Praxis')->group(function () {
        Route::get('/create', 'CreateController')->name('praxis.create');
        Route::post('/', 'StoreController')->name('praxis.store');
        Route::get('/{praxis}/edit', 'EditController')->name('praxis.edit');
        Route::patch('/{praxis}', 'UpdateController')->name('praxis.update');
    });
    Route::prefix('profile')->namespace('Profile')->group(function () {
        Route::get('/{user}/edit', 'EditController')->name('profile.edit');
        Route::patch('/{user}', 'UpdateController')->name('profile.update');
    });
});

Auth::routes(['verify' => true]);

Route::get('/agb', [App\Http\Controllers\AgbController::class, 'index'])->name('agb.index');
Route::get('/impressum', [App\Http\Controllers\ImpressumController::class, 'index'])->name('impressum.index');
