<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Inertia\Inertia::render('About');
})->name('about');

Route::get('/projects', function () {
    return Inertia\Inertia::render('Projects');
})->name('projects');

Route::get('/resume', function () {
    return Inertia\Inertia::render('Resume');
})->name('resume');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');
