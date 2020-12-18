<?php

use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('welcome'));

Route::get('/dashboard', fn() => view('dashboard'))
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware(['auth'])->group(
    fn() => Route::resource('plans', PlanController::class)
);

require __DIR__.'/auth.php';
