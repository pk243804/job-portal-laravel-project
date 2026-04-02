<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Company;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = Job::where('status', 'approved')
            ->when($request->keyword, fn ($q) =>
                $q->where('title', 'like', '%' . $request->keyword . '%')
            )
            ->paginate(10);
//dd($jobs);
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        $companies = Company::all(); //dd($companies);
        return view('jobs.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'company_id' => 'required',
            'description' => 'required',
        ]);

        Job::create([
            'company_id' => $request->company_id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'job_type' => $request->job_type,
            'status' => 'pending',
        ]);
//dd($request->toArray());
        return redirect()->back()->with('success', 'Job posted');
    }

    public function show($id)
    {
        $job = Job::with('company')->find($id); //dd($job); 
        return view('jobs.show', compact('job'));
    }
}
