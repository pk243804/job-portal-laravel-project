@extends('layouts.app')

@section('content')
<h3>Create Company</h3>

<form method="POST" action="{{ url('company/save') }}">
@csrf

<input type="text" name="comp_name" class="form-control mb-2" placeholder="Company name">
<textarea name="description" class="form-control mb-2" placeholder="Company description"></textarea>
Logo<input type="file" name="logo" class="form-control mb-2">

<button class="btn btn-success">Add Company</button>
</form>
@endsection
