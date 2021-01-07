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

    Route::post('/store-profile/', [UserProfileController::class, 'store'])->name('profiles.store');
    Route::get('/edit-profile/', [UserProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('/update-profile/', [UserProfileController::class, 'update'])->name('profiles.update');
});

require __DIR__.'/auth.php';
