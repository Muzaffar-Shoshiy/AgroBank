<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.header')
@include('layouts.navbar')
<body>
    <div class="container my-5">
        <div class="row my-5 justify-content-center">
            @foreach($responds as $respond)
            <div class="col-8 my-3">
                <div class="jumbotron bg-light p-3">
                    <h3 class="text-primary">{{$respond->position}}</h3>
                    <p>{{$respond->name}} <i class="fa-regular fa-circle-check"></i></p>
                    <small>{{$respond->city}} <i class="fa-solid fa-location-dot"></i></small>
                    <p>{{$respond->experience}} year working experience</p>
                    <small class="fw-bold">${{$respond->salary}} for per month</small>
                    <div class="row justify-content-center">
                        <div class="col-12"><h6 class="text-end fw-bold">Clicked at: {{$respond->created_at}} Resume: {{$respond->resume_name}}</h6></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>
