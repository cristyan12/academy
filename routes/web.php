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

    Route::get('users/{user}/profiles', [UserProfileController::class, 'index'])->name('profiles.index');
    Route::get('users/{user}/profiles/create', [UserProfileController::class, 'create'])->name('profiles.create');
    Route::get('users/{user}/profiles/edit', [UserProfileController::class, 'edit'])->name('profiles.edit');
    Route::put('profiles/{user}', [UserProfileController::class, 'update'])->name('profiles.update');
});

require __DIR__.'/auth.php';
