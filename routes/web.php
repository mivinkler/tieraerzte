<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


Route::get('/', function () { return 'привет'; })->name('home.index');

Route::get('/search', [IndexController::class, 'index'])->name('praxen.index');
Route::get('/praxis/{praxis}', [ShowController::class, 'show'])->name('praxis.show');
Route::get('/create', [CreateController::class, 'create'])->name('praxis.create');
Route::post('/praxis', [StoreController::class, 'store'])->name('praxis.store');

Route::get('/praxis/{praxis}/edit', [EditController::class, 'edit'])->name('praxis.edit');

Route::patch('/praxis/{praxis}', [UpdateController::class, 'update'])->name('praxis.update');


Route::get('/agb', [AgbController::class, 'index'])->name('agb.index');
Route::get('/impressum', [ImpressumController::class, 'index'])->name('impressum.index');
