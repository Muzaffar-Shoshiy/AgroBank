<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.header')
@include('layouts.navbar')
<body>
    <div class="container my-5">
        <a href="/" >Back</a>
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
        <div class="row justify-content-center my-5">
            @foreach($vacancy as $item)
            <div class="col-3">
                <h4 class="fw-bold"><small>Company</small>: {{$item->name}}</h4>
                <h2><small>Position</small>: {{$item->position}}</h2>
                <p>City: {{$item->city}}</p>
                <p>Work Mode: {{$item->work_mode}}</p>
                <p>Required Experience: {{$item->experience}}</p>
                <p>Offer: ${{$item->salary}}</p>
                <form action="/respond" method="POST">
                    @csrf
                    <input type="hidden" value="{{$item->id}}" name="vacancy_id" required>
                    <input type="hidden" value="{{$item->user_id}}" name="employer_id" required>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Choose your resume!</h5>
                            </div>
                            <div class="modal-body">
                                @forelse($resumes as $resume)
                                <div class="mb-3">
                                    <label for="{{$resume->id}}" class="form-label">{{$resume->name}}</label>
                                    <input type="radio" name="resume_id" value="{{$resume->id}}" id="{{$resume->id}}" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                @empty
                                <div class="mb-3">
                                    <h6>You need to create resume first!</h6>
                                </div>
                                @endforelse
                            </div>
                          </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Respond
                    </button>
                </form>
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
