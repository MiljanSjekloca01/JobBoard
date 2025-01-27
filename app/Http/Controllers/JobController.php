<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    
    public function index()
    {
        $filters = request()->only(
            "search",
            "min_salary",
            "max_salary",
            "experience",
            "category"
        );

        return view('job.index', [
            'jobs' => Job::with("employer")->filter($filters)->get(),
            'experience'=> Job::$experience,
            'category' => Job::$categories
        ]);
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Job $job)
    {
        return view('job.show', [
            'job' => $job->load(['employer.jobs' => function ($query) use($job) {
                $query->where('id','!=',$job->id);
            }])
        ]);

        /* With same job in employer 
            return view("job.show", [
                "job" => $job->load("employer.jobs")
            ]);
        */ 
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
