<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));

Route::get('/dashboard', fn () => view('dashboard'))
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::view('plans', 'plans.index')->name('plans.index');
    Route::resource('plans', PlanController::class)->except('index');

    Route::get('/user/profile/create/', [UserProfileController::class, 'create'])->name('profile.create');
    Route::post('/user/profile/', [UserProfileController::class, 'store'])->name('profile.store');
});

require __DIR__.'/auth.php';
