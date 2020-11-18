<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = Testimonial::orderBy('year', 'desc')->get();

        return Inertia::render('Resources/Testimonials', ['testimonials' => $testimonials]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make([
            'content' => $request->content,
            'year' => $request->year,
        ], [
            'content' => ['required', 'string', 'max:1024'],
            'year' => ['required', 'string', 'min:4', 'max:4'],
        ])->validateWithBag('createTestimonial');

        $testimonial = Testimonial::create([
            'content' => $request->content,
            'provider' => $request->provider,
            'subprovider' => $request->subprovider,
            'year' => $request->year,
        ]);

        return back()->with('flash', [
            'testimonial' => $testimonial
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        Validator::make([
            'content' => $request->content,
            'year' => $request->year,
        ], [
            'content' => ['required', 'string', 'max:1024'],
            'year' => ['required', 'min:4', 'max:4'],
        ])->validateWithBag('updateTestimonial');

        $testimonial->update([
            'content' => $request->content,
            'provider' => $request->provider,
            'subprovider' => $request->subprovider,
            'year' => $request->year,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return back();
    }
}
