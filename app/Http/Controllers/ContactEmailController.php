<?php

namespace App\Http\Controllers;

use App\Models\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class ContactEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Resources/ContactEmails', [
            'emails' => ContactEmail::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ], [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'message' => ['required', 'string', 'max:512'],
        ])->validateWithBag('createEmailBag');

        $email = ContactEmail::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->with('flash', ['email' => $email]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactEmail  $contactEmail
     * @return \Illuminate\Http\Response
     */
    public function show(ContactEmail $contactEmail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactEmail  $contactEmail
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactEmail $contactEmail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactEmail  $contactEmail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactEmail $contactEmail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactEmail  $contactEmail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactEmail $contactEmail)
    {
        //
    }
}
