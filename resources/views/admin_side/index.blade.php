@include('admin_side.layouts.header')
<!-- Content Start -->
<!-- Sale & Revenue Start -->
@can('isAdmin')
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col" class="text-danger">Vacancy Name</th>
                            <th scope="col">Vacancy Position</th>
                            <th scope="col">Vacancy City</th>
                            <th scope="col">Required Experience In years</th>
                            <th scope="col">Vacancy Salary</th>
                            <th scope="col" class="text-danger">Number of Responds</th>
                            <th scope="col">Vacancy Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($statistics_by_vacancies as $item)
                        <tr>
                            <td>{{$item->vacancy_id}}</td>
                            <td class="text-danger">{{$item->name}}</td>
                            <td>{{$item->position}}</td>
                            <td>{{$item->city}}</td>
                            <td>{{$item->experience}}</td>
                            <td>{{$item->salary}}</td>
                            <td class="text-danger">{{$item->number_of_otkliks}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col" class="text-danger">Resume Name</th>
                            <th scope="col">Resume Surname</th>
                            <th scope="col" class="text-danger">Number of Responds</th>
                            <th scope="col">Resume created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($statistics_by_resumes as $item)
                        <tr>
                            <td>{{$item->resume_id}}</td>
                            <td class="text-danger">{{$item->name}}</td>
                            <td>{{$item->surname}}</td>
                            <td class="text-danger">{{$item->number_of_otkliks}}</td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col" class="text-danger">Resume Name</th>
                            <th scope="col" class="text-danger">Number of Responds in last week</th>
                            <th scope="col" class="text-danger">Created at</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($weekly as $item)
                        <tr>
                            <td>{{$item->resume_id}}</td>
                            <td class="text-danger">{{$item->name}}</td>
                            <td class="text-danger">{{$item->number}}</td>
                            <td class="text-danger">{{$item->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endcan
<!-- Sale & Revenue End -->
<!-- Content End -->
@include('admin_side.layouts.footer')
