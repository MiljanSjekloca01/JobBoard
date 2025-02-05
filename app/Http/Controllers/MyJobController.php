<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MyJobController extends \Illuminate\Routing\Controller
{
   use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAnyEmployer',Job::class);

        $jobs = auth()->user()->employer->jobs()
            ->with(["employer","jobApplications","jobApplications.user"])
            ->get();
        return view("my_job.index",["jobs" => $jobs]);
    }

    public function create()
    {
        $this->authorize('create',Job::class);
        return view("my_job.create", ['experience'=> Job::$experience, 'category' => Job::$categories]);
    }

    public function store(JobRequest $request,)
    {
        $this->authorize('create',Job::class);
        $request->user()->employer->jobs()->create($request->validated());

        return redirect()->route("my-jobs.index")
            ->with("success", "Job created successfully");
    }

    public function edit(Job $myJob)
    {
        $this->authorize('update',$myJob);
        
        return view("my_job.edit", [
            'job' => $myJob,
            'experience'=> Job::$experience,
            'category' => Job::$categories
        ]);
    }

    public function update(JobRequest $request, Job $myJob)
    {
        $myJob->update($request->validated());
    
        return redirect()->route('my-jobs.index')
            ->with('success', 'Job updated successfully');
    }

    public function destroy(string $id)
    {
        //
    }
}
