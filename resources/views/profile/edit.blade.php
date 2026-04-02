@extends('layouts.app')

@section('content')
<h3>My Profile</h3>

       <form method="POST" action="/profile/update" enctype="multipart/form-data">
       @csrf

       <label for="skills" class="col-form-label text-md-end">Skills</label>
       <textarea name="skills" class="form-control mb-3" id="skills">
       {{ $profile->skills ?? '' }}</textarea>

       <label for="experience" class="col-form-label text-md-end">Experience</label>
       <input type="text" name="experience" id="experience" class="form-control mb-3" value="{{ $profile->experience ?? '' }}">
       <label for="education" class="col-form-label text-md-end">Education</label>
       <input type="text" name="education" id="education" class="form-control mb-3" value="{{ $profile->education ?? '' }}">

       <label for="resume" class="col-form-label text-md-end">Resume</label>
       <input type="file" id="resume" name="resume" class="form-control mb-5">
       <button class="btn btn-success">Save</button>

       </form>
@endsection
