<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function() {
    return Inertia::render('About', [
        'testimonials' => App\Models\Testimonial::orderBy('year', 'desc')->get()
    ]);
})->name('about');

Route::get('/projects', fn() => Inertia::render('Projects'))->name('projects');
Route::get('/resume', fn() => Inertia::render('Resume'))->name('resume');

Route::middleware(['auth:sanctum'])->prefix('admin')->group(function () {
    Route::get('/', fn() => Inertia::render('Admin'))->name('admin');
    Route::resources([
        'testimonials' => App\Http\Controllers\TestimonialController::class,
    ]);
});

