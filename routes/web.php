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
use App\Http\Controllers\Admin\Catalog\CatalogIndexController;
use App\Http\Controllers\Admin\Catalog\CatalogUpdateController;
use App\Http\Controllers\Admin\Catalog\CatalogController;

use App\Http\Controllers\User\Praxis\CreateController;
use App\Http\Controllers\User\Praxis\StoreController;
use App\Http\Controllers\User\Praxis\EditController;
use App\Http\Controllers\User\Praxis\UpdateController;
use App\Http\Controllers\User\Profile\ProfileEditController;
use App\Http\Controllers\User\Profile\ProfileUpdateController;
use App\Http\Controllers\User\Profile\ProfileDestroyController;

use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\Main\ShowController;
use App\Http\Controllers\Main\MainController;
use App\Http\Controllers\Main\ContactController;
use App\Http\Controllers\Main\TimeController;


Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/search', [IndexController::class, '__invoke'])->name('praxis.index');
Route::get('/praxis/{id}/{slug}', [ShowController::class, '__invoke'])->name('praxis.show');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin_praxis')->group(function () {
        Route::get('/index', [PraxisIndexController::class, '__invoke'])->name('admin.praxis.index');
        Route::get('/create', [PraxisCreateController::class, '__invoke'])->name('admin.praxis.create');
        Route::post('/', [PraxisStoreController::class, '__invoke'])->name('admin.praxis.store');
        Route::get('/{praxis}/edit', [PraxisEditController::class, '__invoke'])->name('admin.praxis.edit');
        Route::patch('/{praxis}', [PraxisUpdateController::class, '__invoke'])->name('admin.praxis.update');
        Route::delete('/praxis/delete/{praxis}', [PraxisDestroyController::class, '__invoke'])->name('admin.praxis.delete');
    });
    Route::prefix('admin_user')->group(function () {
        Route::get('/index', [UserIndexController::class, '__invoke'])->name('admin.user.index');
        Route::post('/', [UserStoreController::class, '__invoke'])->name('admin.user.store');
        Route::get('/create', [UserCreateController::class, '__invoke'])->name('admin.user.create');
        Route::get('/{user}/edit', [UserEditController::class, '__invoke'])->name('admin.user.edit');
        Route::patch('/{user}', [UserUpdateController::class, '__invoke'])->name('admin.user.update');
        Route::delete('/user/delete/{user}', [UserDestroyController::class, '__invoke'])->name('admin.user.delete');
    });
   
    Route::prefix('admin_catalog')->group(function () {
        Route::get('/{type}', \App\Http\Controllers\Admin\Catalog\IndexController::class)->name('admin.catalog.index');
        Route::get('/{type}/create', \App\Http\Controllers\Admin\Catalog\CreateController::class)->name('admin.catalog.create');
        Route::post('/{type}', \App\Http\Controllers\Admin\Catalog\StoreController::class)->name('admin.catalog.store');
        Route::get('/{type}/{id}/edit', \App\Http\Controllers\Admin\Catalog\EditController::class)->name('admin.catalog.edit');
        Route::put('/{type}/{id}', \App\Http\Controllers\Admin\Catalog\UpdateController::class)->name('admin.catalog.update');
        Route::delete('/{type}/{id}', \App\Http\Controllers\Admin\Catalog\DestroyController::class)->name('admin.catalog.destroy');
    });
    
});

Route::middleware(['auth', 'user', 'verified'])->group(function () {
    Route::prefix('user_praxis')->group(function () {
        Route::get('/create', [CreateController::class, '__invoke'])->name('praxis.create');
        Route::post('/', [StoreController::class, '__invoke'])->name('praxis.store');
        Route::get('/{praxis}/edit', [EditController::class, '__invoke'])->name('praxis.edit');
        Route::patch('/{praxis}', [UpdateController::class, '__invoke'])->name('praxis.update');
    });
    Route::prefix('user')->group(function () {
        Route::get('/{user}/edit', [ProfileEditController::class, '__invoke'])->name('user.edit');
        Route::patch('/{user}', [ProfileUpdateController::class, '__invoke'])->name('user.update');
        Route::delete('/user/delete/{user}', [ProfileDestroyController::class, '__invoke'])->name('user.delete');
        Route::get('/delete', function () { return view('user.profile_delete'); })->name('profile.delete');
    });
});

Auth::routes(['verify' => true]);

Route::get('/agb', function () { return view('agb'); })->name('agb');
Route::get('/impressum', function () { return view('impressum'); })->name('impressum');
Route::get('/service', function () { return view('main.service'); })->name('service');

Route::post('/contact/praxis/{id}', [ContactController::class, 'sendMail'])->name('contact.praxis');
Route::get('/update-free-time/{id}', [TimeController::class, 'calculateNextFreeTime'])->name('free.time');

Route::get('/', [MainController::class, 'index'])->name('main');
