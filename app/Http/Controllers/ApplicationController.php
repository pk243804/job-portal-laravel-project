<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Profile;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function store(Request $request, $jobId)
    {
        $exists = Application::where('job_id', $jobId)
                  ->where('user_id', auth()->id())
                  ->exists();
        if($exists) {
            return redirect()->back()->with('error', 'Already applied ');
        }

        $resume = auth()->user()->profile->resume;

        Application::create([
            'job_id' => $jobId,
            'user_id' => auth()->id(),
            'resume' => $resume,
            'status' => 'applied'
        ]);

        return redirect()->back()->with('success', 'Job applied successfully');
    }

    public function index()
    {
        $applications = auth()->user()->applications;
        return view('applications.index', compact('applications'));
    }

}
