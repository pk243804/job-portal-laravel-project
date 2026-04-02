@extends('layouts.app')

@section('content')
<h3>Manage Candidates</h3>

<table class="table table-bordered">
<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Action</th>
</tr>

@foreach($users as $user)
<tr>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
        <form method="POST" action="/admin/users/{{ $user->id }}/delete" class="d-inline">
            @csrf
            <button class="btn btn-danger btn-sm">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection
