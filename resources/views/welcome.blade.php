<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.header')
    <body class="antialiased">
        @include('layouts.navbar')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-8">
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-8">
                    <form class="d-flex" action="/search" method="get" accept-charset="utf-8">
                        @csrf
                        <input class="form-control me-2" name="position" type="text" placeholder="Search Jobs..." aria-label="Search" required>
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
            <h2 class="text-center my-5">Get Your Job!</h2>
            <div class="row justify-content-center">
                @foreach($vacancies as $vacancy)
                <div class="col-8 my-2">
                    <div class="jumbotron bg-light p-3">
                        <h3 class="text-primary"><a href="/view-vacancy/{{$vacancy->id}}" class="text-decoration-none">{{$vacancy->position}}</a></h3>
                        <p>{{$vacancy->name}} <i class="fa-regular fa-circle-check"></i></p>
                        <small>{{$vacancy->city}} <i class="fa-solid fa-location-dot"></i></small>
                        <p>{{$vacancy->experience}} year working experience</p>
                        <p class="fw-bold">${{$vacancy->salary}} for per month</p>
                        <a href="/view-vacancy/{{$vacancy->id}}" class="btn btn-primary">Respond</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
