<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;

class MyJobApplicationController extends Controller
{
    
    public function index()
    {
       $applications = auth()->user()->jobApplications()
       ->with([
            'job' => fn($query) => $query->withCount('jobApplications')
                ->withAvg('jobApplications', 'expected_salary'),
            'job.employer'
       ])
       ->latest()->get();

       return view("my_job_application.index", ["applications" => $applications]);
    }

    public function destroy(JobApplication $myJobApplication)
    {
        $myJobApplication->delete();

        return redirect()->back()->with("success", "Job application removed");
    }
}
