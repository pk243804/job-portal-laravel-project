@extends('layouts.app')

@section('content')
<h3>Post Job</h3>

<form method="POST" action="{{ url('jobs/save') }}">
@csrf

<input type="text" name="title" class="form-control mb-2" placeholder="Job title">

<select name="company_id" class="form-control mb-2">
    @foreach($companies as $company)
        <option value="{{ $company->id }}">{{ $company->comp_name }}</option>
    @endforeach
</select>

<textarea name="description" class="form-control mb-2" placeholder="Job description"></textarea>

<input type="text" name="location" class="form-control mb-2" placeholder="Location">
<input type="text" name="salary" class="form-control mb-2" placeholder="Salary">

<select name="job_type" class="form-control mb-2">
    <option value="full-time">Full time</option>
    <option value="part-time">Part time</option>
</select>
<button class="btn btn-success">Post Job</button>
</form>
@endsection
