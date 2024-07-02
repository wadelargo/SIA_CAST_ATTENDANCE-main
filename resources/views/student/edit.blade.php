@extends('pages.base')

@section('content')
<!-- Delete Student Modal -->
<div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteStudentLabel">Delete Student - {{ $student->full_name }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ url('student/' . $student->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure you want to delete this student?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete Student</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (session('message'))
<div class="success">{{ session('message') }}</div>
@endif

<div class="jumbotron">
        
    <h1>Edit Student</h1>
    <center>
        <div class="row">
            <div class="col-md-5">
                <form action="{{ url('student/' . $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- Event ID Field Removed -->

                    <div class="form-group mt-2">
                        <label for="full_name">Full name</label>
                        <input type="text" name="full_name" id="full_name" placeholder="Enter full_name..." class="form-control" value="{{ $student->full_name }}">
                        @error('full_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="year_level">Year level</label>
                        <input type="text" name="year_level" id="year_level" placeholder="Enter year_level..." class="form-control" value="{{ $student->year_level }}">
                        @error('year_level')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{ $student->address }}">
                        @error('address')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                        <button class="btn btn-sm btn-outline-primary">
                            Update Student
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteStudentModal">
                            Delete Student
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </center>
</div>
<style scoped>
    .name{
        color: rgb(244, 244, 249);
        text-shadow: 5px 5px 5px black;
    }
    label{
        color: rgb(244, 244, 249);
        text-shadow: 5px 5px 5px black;
    }
    .jumbotron{
        padding: 20px;
        padding-top: 25px;
        height: 440px;
        background-color: rgb(74, 73, 73,0.5);
    }
</style>
@endsection
