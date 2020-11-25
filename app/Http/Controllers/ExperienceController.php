<?php

namespace App\Http\Controllers;

use App\Models\BulletPoint;
use App\Models\Experience;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Resources/Experiences', [
            'experiences' => Experience::with('bulletPoints')->orderBy('started_on', 'desc')->get()
        ]);
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
            'company' => $request->company,
            'title' => $request->title,
            'started_on' => $request->started_on,
        ], [
            'company' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:100'],
            'started_on' => ['required', 'date'],
        ])->validateWithBag('createBag');

        $experience = Experience::create([
            'company' => $request->company,
            'title' => $request->title,
            'started_on' => (new Carbon($request->started_on))->format('Y-m-d'),
            'ended_on' => !is_null($request->ended_on) ? (new Carbon($request->ended_on))->format('Y-m-d') : null,
        ]);

        return back()->with('flash', [
            'experience' => $experience
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        //dd($request);
        Validator::make([
            'company' => $request->company,
            'title' => $request->title,
            'started_on' => $request->started_on,
        ], [
            'company' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:100'],
            'started_on' => ['required', 'date'],
        ])->validateWithBag('updateBag');

        $experience->update([
            'company' => $request->company,
            'title' => $request->title,
            'started_on' => (new Carbon($request->started_on))->format('Y-m-d'),
            'ended_on' => !is_null($request->ended_on) ? (new Carbon($request->ended_on))->format('Y-m-d') : null,
        ]);

        foreach($request->bullet_points as $bullet_point) {
            if(!empty($bullet_point['id'])) {
                BulletPoint::find($bullet_point['id'])->update([
                    'content' => $bullet_point['content']
                ]);
            } 
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        $experience->delete();
        return back();
    }
}
