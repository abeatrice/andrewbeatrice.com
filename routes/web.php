<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn() => Inertia::render('About'))->name('about');
Route::get('/projects', fn() => Inertia::render('Projects'))->name('projects');
Route::get('/resume', fn() => Inertia::render('Resume'))->name('resume');

Route::middleware(['auth:sanctum'])->prefix('admin')->group(function () {
    Route::get('/', fn() => Inertia::render('Admin'))->name('admin');
    Route::resources([
        'testimonials' => App\Http\Controllers\Web\TestimonialController::class,
    ]);
});

