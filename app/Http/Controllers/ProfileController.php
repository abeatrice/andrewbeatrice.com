<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display current signed in user profile
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Profile', [
            'user' => auth()->user(),
        ]);
    }

    /**
     * Update current signed in user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Validator::make([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ], [
            'name' => ['required', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:100'],
        ])->validateWithBag('updateBag');

        auth()->user()->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        return back();
    }
}
