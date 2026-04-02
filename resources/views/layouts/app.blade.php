<!DOCTYPE html>
<html>
<head>
    <title>Job Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Job Portal</a>

        <ul class="navbar-nav ms-auto">
            @if(!auth()->user())
            <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
            @endif
            @auth
            
                @if(auth()->user()->isAdmin())
                    <li class="nav-item"><a class="nav-link" href="/admin/jobs">Manage Jobs</a></li>
                    <li class="nav-item"><a class="nav-link" href="/admin/users">Manage Candidates</a></li>
                @endif

                @if(auth()->user()->isEmployer())
                     <li class="nav-item"><a class="nav-link" href="/company/create">Add Company</a></li>
                    <li class="nav-item"><a class="nav-link" href="/jobs/create">Post Job</a></li>
                @endif

                @if(auth()->user()->isCandidate())
                     <li class="nav-item"><a class="nav-link" href="/profile/edit">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="/jobs">Jobs</a></li>
                    <li class="nav-item"><a class="nav-link" href="/applications">My Applications</a></li>
                @endif

                @if(auth()->user())
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-link nav-link">Logout</button>
                    </form>
                </li>
            @else
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
            @endif
            @endauth

        </ul>
    </div>
</nav>

<div class="container mt-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @yield('content')
</div>

</body>
</html>
