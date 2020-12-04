<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;

Route::get('/', function() {
    return Inertia::render('About', [
        'testimonials' => App\Models\Testimonial::orderBy('year', 'desc')->get(),
    ]);
})->name('about');

Route::get('/projects', fn() => Inertia::render('Projects'))->name('projects');

Route::get('/resume', function() {
    return Inertia::render('Resume', [
        'experiences' => App\Models\Experience::with('bulletPoints')->orderBy('started_on', 'desc')->get(),
        'education' => App\Models\Education::with('bulletPoints')->orderBy('started_on', 'desc')->get()
    ]);
})->name('resume');

Route::middleware(['auth:sanctum'])->prefix('admin')->group(function () {
    Route::get('/', fn() => Inertia::render('Admin'))->name('admin');
    Route::resources([
        'testimonials' => TestimonialController::class,
        'education' => EducationController::class,
        'experiences' => ExperienceController::class,
    ]);
});
