@extends('layouts.app')

@section('content')
<h3>Job Title: {{ $job->title }}</h3>

<p><b>Company:</b> {{ $job->company->comp_name }}</p>
<p><b>Description:</b> {{ $job->description }}</p>
<p><b>Location:</b> {{ $job->location }}</p>
<p><b>Salary:</b> {{ $job->salary }}</p>
<p><b>Job Type:</b> {{ $job->job_type }}</p>

@auth
<form method="POST" action="{{ url('apply/'.$job->id) }}" enctype="multipart/form-data">
    @csrf
    <button class="btn btn-primary">Apply</button>
</form>
@endauth
@endsection
