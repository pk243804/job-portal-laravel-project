@extends('layouts.app')

@section('content')
<h3>Job Listings</h3>

<table class="table table-bordered">
<tr>
    <th>Title</th>
    <th>Description</th>
    <th>Status</th>
    <th>Action</th>
</tr>

@foreach($jobs as $job)
<tr>
    <td>{{ $job->title }}</td>
    <td>{{ $job->description }}</td>
    <td>{{ $job->status }}</td>
    @if( $job->status == 'pending')
    <td>
        <form method="POST" action="/admin/jobs/{{ $job->id }}/approve" class="d-inline">
            @csrf
            <button class="btn btn-success btn-sm">Approve</button>
        </form>
    </td>
    @else
    <td>
        <form method="POST" action="/admin/jobs/{{ $job->id }}/cancel" class="d-inline">
            @csrf
            <button class="btn btn-danger btn-sm">Cancel</button>
        </form>
    </td>
    @endif
</tr>
@endforeach
</table>
@endsection
