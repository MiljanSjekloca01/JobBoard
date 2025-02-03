<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class JobApplicationController extends Controller
{
   use AuthorizesRequests;

    public function create(Job $job)
    {
        $this->authorize("apply", $job);
        return view("job_application.create", ["job" => $job]);
    }

    public function store(Request $request, Job $job)
    {
        $this->authorize("apply", $job);

        $validatedData = $request->validate([
            "expected_salary" => "required|numeric|min:1|max:1000000",
            "cv" => "required|file|mimes:pdf|max:2048"
        ]);

        $file = $request->file("cv");
        $path = $file->store("cvs","local");

        $job->jobApplications()->create([
            "user_id" => request()->user()->id,
            'expected_salary' => $validatedData["expected_salary"],
            "cv_path" => $path
        ]);

        return redirect()->route("jobs.show",$job)->with("success", "Job Application submitted");
    }

    public function show(string $id)
    {
        //
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
