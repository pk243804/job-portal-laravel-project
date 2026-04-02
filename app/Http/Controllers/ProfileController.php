<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function edit()
    {
        $profile = auth()->user()->profile;
        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'resume' => 'nullable|mimes:pdf,doc,docx',
        ]);

        $data = $request->all();

        if ($request->hasFile('resume')) {
            $data['resume'] = $request->file('resume')->store('resumes');
        }

        Profile::updateOrCreate(['user_id' => auth()->id()], $data);

        return redirect()->back()->with('success', 'Profile updated');
    }
}
