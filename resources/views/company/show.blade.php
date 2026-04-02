@extends('layouts.app')

@section('content')
<h3>{{ $job->title }}</h3>

<p>{{ $job->description }}</p>
<p><b>Location:</b> {{ $job->location }}</p>

@auth
<form method="POST" action="{{ url('apply/'.$job->id) }}" enctype="multipart/form-data">
    @csrf
    <input type="file" name="resume" class="form-control mb-2">
    <button class="btn btn-primary">Apply</button>
</form>
@endauth
@endsection
