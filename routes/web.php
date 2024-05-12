<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Main\HomeController;
use App\Http\Controllers\Admin\Praxis\PraxisIndexController;
use App\Http\Controllers\Admin\Praxis\PraxisCreateController;
use App\Http\Controllers\Admin\Praxis\PraxisStoreController;
use App\Http\Controllers\Admin\Praxis\PraxisEditController;
use App\Http\Controllers\Admin\Praxis\PraxisUpdateController;
use App\Http\Controllers\Admin\Praxis\PraxisDestroyController;
use App\Http\Controllers\Admin\User\UserIndexController;
use App\Http\Controllers\Admin\User\UserCreateController;
use App\Http\Controllers\Admin\User\UserStoreController;
use App\Http\Controllers\Admin\User\UserEditController;
use App\Http\Controllers\Admin\User\UserUpdateController;
use App\Http\Controllers\Admin\User\UserDestroyController;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Main\ShowController;
use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\AgbController;
use App\Http\Controllers\ImpressumController;




Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    Route::prefix('praxis')->group(function () {
        Route::get('/index', [PraxisIndexController::class, '__invoke'])->name('admin.praxis.index');
        Route::get('/create', [PraxisCreateController::class, '__invoke'])->name('admin.praxis.create');
        Route::post('/', [PraxisStoreController::class, '__invoke'])->name('admin.praxis.store');
        Route::get('/{praxis}/edit', [PraxisEditController::class, '__invoke'])->name('admin.praxis.edit');
        Route::patch('/{praxis}', [PraxisUpdateController::class, '__invoke'])->name('admin.praxis.update');
        Route::delete('/praxis/delete/{praxis}', [PraxisDestroyController::class, '__invoke'])->name('admin.praxis.delete');
    });
    Route::prefix('user')->group(function () {
        Route::get('/index', [UserIndexController::class, '__invoke'])->name('admin.user.index');
        Route::post('/', [UserStoreController::class, '__invoke'])->name('admin.user.store');
        Route::get('/create', [UserCreateController::class, '__invoke'])->name('admin.user.create');
        Route::get('/{user}/edit', [UserEditController::class, '__invoke'])->name('admin.user.edit');
        Route::patch('/{user}', [UserUpdateController::class, '__invoke'])->name('admin.user.update');
        Route::delete('/user/delete/{user}', [UserDestroyController::class, '__invoke'])->name('admin.user.delete');
    });
});


Route::get('/search', [IndexController::class, '__invoke'])->name('praxis.search.index');
Route::get('/praxis/{slug}/{id}', [ShowController::class, '__invoke'])->name('praxis.show');
// Route::get('/praxis/{slug}', [ShowController::class, '__invoke'])->name('praxis.show')->where('slug', '^(?!home$).*');

Auth::routes(['verify' => true]);

// Route::get('/agb', [AgbController::class, 'index'])->name('agb.index');
Route::get('/agb', function () { return view('agb'); })->name('agb');
Route::get('/impressum', function () { return view('impressum'); })->name('impressum');
Route::get('/service', function () { return view('service'); })->name('service');
Route::get('/', [MainController::class, 'index'])->name('main');
