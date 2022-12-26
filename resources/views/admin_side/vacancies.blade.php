@include('admin_side.layouts.header')
<div class="container my-5">
    <div class="row justify-content-center">
        <h2 class="text-center mb-5">Vacancies you created</h2>
        @foreach($vacancies as $item)
        <div class="col-2">
            <h6><a href="/dashboard/vacancies/{{$item->id}}">{{$item->position}}</a></h6>
        </div>
        @endforeach
    </div>
</div>
@include('admin_side.layouts.footer')
