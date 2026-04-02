@extends('layouts.app')

@section('content')

    @if(auth()->user()->isAdmin())
        <h3>Welcome Admin</h3>
    @endif

    @if(auth()->user()->isEmployer())
        <h3>Welcome Employer</h3>
    @endif

    @if(auth()->user()->isCandidate())
        <h3>Welcome Candidate</h3>
    @endif


@endsection
