<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


Route::get('/', function () { return 'привет'; })->name('home.index');;

Route::get('/praxen', [IndexController::class, 'index'])->name('praxen.index');
Route::get('/praxis/{praxis}', [ShowController::class, 'show'])->name('praxis.show');
Route::get('/create', [CreateController::class, 'create'])->name('praxis.create');;
Route::post('/praxis', [CreateController::class, 'store'])->name('praxis.store');


Route::get('/agb', [AgbController::class, 'index'])->name('agb.index');
Route::get('/impressum', [ImpressumController::class, 'index'])->name('impressum.index');
