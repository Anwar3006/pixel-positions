<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //JobSeeder will use sequence to create 10 jobs for false-featured and 10 for true-featured, we group them here
        $jobs = Job::latest()->with(['employer', 'tags'])->get()->groupBy('featured'); //will return an array of array of objects [[{}, {}], [{}, {}]]

        return view('jobs.index', [
            'featuredJobs' => $jobs[1], //featured = true
            'jobs' => $jobs[0],         //feaured = false
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            "title"     => ['required'],
            "salary"    => ['required'],
            "location"  => ['required'],
            "schedule"  => ['required'],
            "url"       => ['required', 'active_url'],
            "tags"      => ['nullable']
        ]);

        $attributes['featured'] = $request->has('featured');

        //creating the job through the authenticated user to make sure no only authenticated users can create jobs
        //creating through the employer so the job is always associated with the employer and it's id will be added to the job automatically
        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags']) {
            foreach (explode(',', $attributes['tags']) as $tag) { //explode returns an array
                $job->tag($tag);
            }
        }
        return redirect("/");
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
