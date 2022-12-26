@include('admin_side.layouts.header')
<div class="container my-5">
    <div class="row justify-content-center">
        <h2 class="text-center mb-5">Vacancy you created</h2>
        @foreach($vacancy as $item)
        <div class="col-2">
            <h6>{{$item->name}}</h6>
            <p>Position: {{$item->position}}</p>
            <p>Work mode: {{$item->work_mode}}</p>
            <p>Location: {{$item->city}}</p>
            <p>Required experience - {{$item->experience}} years</p>
            <p>${{$item->salary}} salary for per month</p>
            <p>Created at: {{$item->created_at}}</p>
            <h5>Skills</h5>
            @foreach($skills as $skill)
                <p>{{$skill->skill}}</p>
            @endforeach
        </div>
        @endforeach
    </div>
</div>
@include('admin_side.layouts.footer')
