<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'comp_name' => 'required',
            'description' => 'required',
            'logo' => 'nullable|image',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('company_logos');
        }

        Company::create($data);

        return redirect()->back()->with('success', 'Company profile created');
    }

    public function edit()
    {
        $company = auth()->user()->company;
        return view('company.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $company = auth()->user()->company;

        $data = $request->all();
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('company_logos');
        }

        $company->update($data);

        return redirect()->back()->with('success', 'Company updated');
    }
}
