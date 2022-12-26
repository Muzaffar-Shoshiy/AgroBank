    @include('admin_side.layouts.header')
    <!-- Content Start -->
        <!-- Form Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-secondary rounded h-60 p-4">
                        @if (session('created'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('created') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <h6 class="mb-4">Create Vacancy</h6>
                        <form action="/dashboard/create-vacancy" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name" class="form-control" placeholder="Name" required>
                            </div>
                            <div class="mb-3">
                                <select class="form-select" name="position" aria-label="Default select example" required>
                                    <option selected>Select Position</option>
                                    @foreach($positions as $position)
                                    <option value="{{$position->position}}">{{$position->position}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 addSkill">
                                <button class="add_form_field_1">Add Another Skill &nbsp;
                                    <span style="font-size:16px; font-weight:bold;">+</span>
                                </button><br>
                                <input type="text" name="myskill[]" class="form-control" placeholder="Skill" required>
                            </div>
                            <div class="mb-3">
                                <input type="number" name="salary" class="form-control" placeholder="Wanted Salary" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="work_mode" class="form-control" placeholder="Work Mode" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" name="city" class="form-control" placeholder="City" required>
                            </div>
                            <div class="mb-3">
                                <input type="number" name="experience" class="form-control" placeholder="Experience" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Vacancy</button>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12 col-xl-6">
                    <div class="bg-secondary rounded h-100 p-4">
                        @if (session('position'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('position') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <h6 class="mb-4">Add Position</h6>
                        <form action="/dashboard/add-position" method="post">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Position</label>
                                <div class="col-sm-10">
                                    <input type="text" name="position" class="form-control" id="inputEmail3" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Position</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form End -->
    <!-- Content End -->

@include('admin_side.layouts.footer')
