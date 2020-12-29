<?php

use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));

Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::view('plans', 'plans.index')->name('plans.index');

    Route::resource('plans', PlanController::class)->except('index');
});

require __DIR__.'/auth.php';
