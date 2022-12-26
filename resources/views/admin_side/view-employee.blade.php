@include('admin_side.layouts.header')
<div class="container my-5">
    <div class="row justify-content-center">
        @foreach($resume as $item)
        <div class="col-10">
            <h4>{{$item->name}} {{$item->surname}}</h4>
            <p>Mobile number: {{$item->phone}}</p>
            <p>Current city: {{$item->city}}</p>
            <p>From: {{$item->country}}</p>
            <p>Date of Birth{{$item->d_birth}}</p>
            <p>Gender: {{$item->gender}}</p>
            <p>{{$item->experience}} year of experience</p>
            <p>Wants ${{$item->salary}} per month</p>
            <h5>Skills</h5>
            @foreach($skills as $skill)
                <p>{{$skill->skill}}</p>
            @endforeach
            <h5>Positions</h5>
            @foreach($positions as $item)
                <p>{{$item->position}}</p>
            @endforeach
            <h5>Languages</h5>
            @foreach($langs as $item)
                <p>{{$item->lang}}</p>
            @endforeach
            <h5>Portfolios</h5>
            @foreach($portfolios as $item)
                <a href="{{$item->portfolio}}" target="_blank">View Portfolio</a>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@include('admin_side.layouts.footer')
