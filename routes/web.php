<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ContactEmailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;

// Pages
Route::get('/', [PageController::class, 'about'])->name('about');
Route::get('/projects', [PageController::class, 'projects'])->name('projects');
Route::get('/resume', [PageController::class, 'resume'])->name('resume');

// Create Contact Email
Route::post('contact-emails', [ContactEmailController::class, 'store'])->name('contact-emails.store');

// Admin
Route::middleware(['auth:sanctum'])->prefix('admin')->group(function () {
    Route::get('/', fn() => Inertia::render('Admin'))->name('admin');
    
    Route::resources([
        'profile' => ProfileController::class,
        'testimonials' => TestimonialController::class,
        'education' => EducationController::class,
        'experiences' => ExperienceController::class,
    ]);
    
    Route::resource('contact-emails', ContactEmailController::class)->except(['store']);
});
