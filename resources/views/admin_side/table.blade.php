@include('admin_side.layouts.header')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Responds</h6>
                    <div class="container">
                        <div class="row">
                            @foreach($responds as $respond)
                            <div class="jumbotron bg-dark my-1 p-3 rounded">
                                <h6><small>Fullname:</small> <a href="/dashboard/view-employee/{{$respond->resume_id}}">{{$respond->employee_name}} {{$respond->employee_surname}}</a></h6>
                                <small>Clicked: {{$respond->created_at}}</small>
                                <p>For: <a href="">{{$respond->position}}</a> position</p>
                                <p>Phone: {{$respond->phone}}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
@include('admin_side.layouts.footer')
