<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.header')
@include('layouts.navbar')
<body>
    <div class="container my-5">
        <div class="row my-5">
            @foreach($resumes as $resume)
            <div class="col-2">
                <h4>{{$resume->name}}</h4>
                <small>Created At: {{$resume->ca}}</small>
                <form action="/my-resume/resume" method="POST">
                    @csrf
                    <input type="hidden" name="resume_id" value="{{$resume->resume_id}}" required>
                    <button type="submit" class="btn btn-secondary btn-sm">View</button>
                </form>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
