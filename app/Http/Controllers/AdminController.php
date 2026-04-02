<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $jobs = Job::all(); 
        return view('admin.jobs', compact('jobs'));
    }

    public function approve(Job $job)
    {
        $job->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Job approved');
    }

    public function cancel(Job $job)
    {
        $job->update(['status' => 'pending']);
        return redirect()->back()->with('success', 'Job pending');
    }

    public function users()
    {
        $users = User::where('role', 'candidate')->get();
        return view('admin.users', compact('users'));
    }

    public function delete_user($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success', 'User deleted');
    }
}
