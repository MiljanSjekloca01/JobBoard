<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Job;

class JobRequest extends FormRequest
{
    
    public function rules(): array
    {
        return [
                "title" => "required|string|max:255",
                "location" => "required|string|max:255",
                "salary" => "required|numeric|min:5000",
                "description" => "required|string",
                "experience" => "required|in:" . implode(',', Job::$experience),
                "category" => "required|in:" . implode(',', Job::$categories)
        ];
    }
}
