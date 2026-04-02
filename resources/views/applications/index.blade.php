@extends('layouts.app')

@section('content')
<h3>My Applications</h3>

<table class="table table-bordered">
<tr>
    <th>Job</th>
    <th>Status</th>
</tr>

@foreach($applications as $app)
<tr>
    <td>{{ $app->job->title }}</td>
    <td>{{ ucfirst($app->status) }}</td>
</tr>
@endforeach
</table>
@endsection
