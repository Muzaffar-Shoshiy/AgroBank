<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.header')
@include('layouts.navbar')
<body>
    <div class="container my-5">
        <a href="/my-resume" >Back</a>
        <div class="row justify-content-center my-5">
            @foreach($resumes as $resume)
            <div class="col-3">
                <h3>{{$resume->name}} {{$resume->surname}}</h3>
                <p>Phone: {{$resume->phone}}</p>
                <p>City: {{$resume->city}}</p>
                <p>Country: {{$resume->country}}</p>
                <p>Date of Birth: {{$resume->d_birth}}</p>
                <p>Gender: {{$resume->gender}}</p>
                <p>Experience: {{$resume->experience}}</p>
                <p>Wanted Salary: ${{$resume->salary}}</p>
            </div>
            @endforeach
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-3">
                SKILLS
                @foreach($skills as $skill)
                <p>{{$skill->skill}}</p>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-3">
                POSITIONS
                @foreach($positions as $item)
                <p>{{$item->position}}</p>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-3">
                PORTFOLIOS <br>
                @foreach($portfolios as $item)
                <a href="{{$item->portfolio}}" class="btn-link">View Portfolio</a>
                @endforeach
            </div>
        </div>
        <div class="row justify-content-center my-5">
            <div class="col-3">
                LANGUAGES <br>
                @foreach($langs as $item)
                <p>{{$item->lang}}</p>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
