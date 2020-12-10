<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Experience;
use App\Models\Education;

class PageController extends Controller
{
    public function about() 
    {
        return Inertia::render('About', [
            'testimonials' => Testimonial::orderBy('year', 'desc')->get(),
        ]);
    }

    public function projects() 
    {
        return Inertia::render('Projects');
    }

    public function resume() 
    {
        return Inertia::render('Resume', [
            'profile' => User::where('admin', true)->select(['name', 'phone', 'email'])->first(),
            'experiences' => Experience::with('bulletPoints')->orderBy('started_on', 'desc')->get(),
            'education' => Education::with('bulletPoints')->orderBy('started_on', 'desc')->get()
        ]);
    }
}
