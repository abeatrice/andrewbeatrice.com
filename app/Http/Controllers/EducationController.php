<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\BulletPoint;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Resources/Education', [
            'education' => Education::with('bulletPoints')->orderBy('started_on', 'desc')->get()
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
            'provider' => $request->provider,
            'degree' => $request->degree,
            'started_on' => $request->started_on,
        ], [
            'provider' => ['required', 'string', 'max:100'],
            'degree' => ['required', 'string', 'max:100'],
            'started_on' => ['required', 'date'],
        ])->validateWithBag('createBag');

        $education = Education::create([
            'provider' => $request->provider,
            'degree' => $request->degree,
            'started_on' => (new Carbon($request->started_on))->format('Y-m-d'),
            'ended_on' => !is_null($request->ended_on) ? (new Carbon($request->ended_on))->format('Y-m-d') : null,
        ]);

        $bullet_points = collect($request->bullet_points)->where('content', '!=', null);
        foreach ($bullet_points as $index => $bullet_point) {
            $education->bulletPoints()->save(
                new BulletPoint([
                    'order' => $index,
                    'content' => $bullet_point['content'],
                ])
            );
        }

        return back()->with('flash', [
            'education' => $education
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Education $education)
    {
        Validator::make([
            'provider' => $request->provider,
            'degree' => $request->degree,
            'started_on' => $request->started_on,
        ], [
            'provider' => ['required', 'string', 'max:100'],
            'degree' => ['required', 'string', 'max:100'],
            'started_on' => ['required', 'date'],
        ])->validateWithBag('updateBag');

        $education->update([
            'provider' => $request->provider,
            'degree' => $request->degree,
            'started_on' => (new Carbon($request->started_on))->format('Y-m-d'),
            'ended_on' => !is_null($request->ended_on) ? (new Carbon($request->ended_on))->format('Y-m-d') : null,
        ]);

        //delete current bullet points not in the request
        $currentBulletPoints = collect($education->bulletPoints()->pluck('id'));
        $bulletPointsInRequest = collect($request->bullet_points)->where('id', '!=', null)->pluck('id')->toArray();
        BulletPoint::whereIn('id', $currentBulletPoints->diff($bulletPointsInRequest))->delete();

        //update or create bullet points in the request
        $bullet_points = collect($request->bullet_points)->where('content', '!=', null);
        foreach($bullet_points as $bullet_point) {
            if(!empty($bullet_point['id'])) {
                BulletPoint::find($bullet_point['id'])->update([
                    'content' => $bullet_point['content']
                ]);
            } else {
                $education->bulletPoints()->save(
                    new BulletPoint([
                        'order' => BulletPoint::max('order') + 1,
                        'content' => $bullet_point['content'],
                    ])
                );
            }
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Education  $education
     * @return \Illuminate\Http\Response
     */
    public function destroy(Education $education)
    {
        $education->bulletPoints()->delete();
        $education->delete();
        return back();
    }
}
