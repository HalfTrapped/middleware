<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RouteMiddleware;
use App\Http\Middleware\GlobalMiddleware;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->middleware(RouteMiddleware::class);

Route::get('/user-page', function () {
    return view('user-page');
})->middleware('auth', 'RouteMiddleware:admin');

Route::get('/user-page', function () {
    return view('user-page');
})->middleware('auth', 'RouteMiddleware:admin');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
