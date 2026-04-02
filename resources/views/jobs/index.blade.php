@extends('layouts.app')

@section('content')
<h3>Job Listings</h3>

<form method="GET" class="row mb-3">
    <div class="col-md-4">
        <input type="text" name="keyword" class="form-control" placeholder="Search job">
    </div>
    <div class="col-md-2">
        <button class="btn btn-primary">Search</button>
    </div>
</form>

@foreach($jobs as $job)
<div class="card mb-2">
    <div class="card-body">
        <h5>{{ $job->title }}</h5>
        <p>{{ Str::limit($job->description, 100) }}</p>
        <a href="/job/{{ $job->id }}/view" class="btn btn-sm btn-info">View</a>
    </div>
</div>
@endforeach

{{ $jobs->links() }}
@endsection
