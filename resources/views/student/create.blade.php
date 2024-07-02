@extends('pages.base')

@section('content')
    <div class="jumbotron">
        <h1 class="name">Create Student</h1>
        <div class="col-md-5 mx-auto">
            <form action="{{ url('student/create') }}" method="POST">
                @csrf
                
                <!-- Event ID Field Removed -->
                
                <div class="form-group mt-2">
                    <label for="full_name">Full Name</label>
                    <input type="text" name="full_name" class="form-control">
                    @error('full_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="year_level">Year Level</label>
                    <input type="text" name="year_level" class="form-control">
                    @error('year_level')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control">
                    @error('address')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mt-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button class="btn btn-primary">
                        Add Student
                    </button>
                </div>
            </form>
        </div>
    </div>

    <style scoped>
        .name {
            color: rgb(244, 244, 249);
            text-shadow: 5px 5px 5px black;
        }

        label {
            color: rgb(244, 244, 249);
            text-shadow: 5px 5px 5px black;
        }

        .jumbotron {
            padding: 20px;
            padding-top: 25px;
            height: 440px;
            background-color: rgb(74, 73, 73, 0.5);
        }
    </style>
@endsection
