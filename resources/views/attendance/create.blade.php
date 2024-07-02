@extends('pages.base')

@section('content')
    <div class="jumbotron">
        <h1 class="name">Create Attendance</h1>
        <div class="col-md-5 mx-auto">
            <form action="{{ url('attendance/create') }}" method="POST">
                @csrf
                <div class="form-group mt-2">
                    <label for="event_id">Select Event</label>
                    <select class="form-select" name="event_id" id="event_id">
                        <option disabled {{ old('event_id') ? '' : 'selected' }}>Select Event</option>
                        @foreach ($events as $eventId => $eventName)
                            <option value="{{ $eventId }}" {{ old('event_id') == $eventId ? 'selected' : '' }}>
                                {{ $eventName }}
                            </option>
                        @endforeach
                    </select>
                    @error('event_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="student_id">Select Student</label>
                    <select class="form-select" name="student_id" id="student_id">
                        <option disabled {{ old('student_id') ? '' : 'selected' }}>Select Student</option>
                        @foreach ($students as $studentId => $studentName)
                            <option value="{{ $studentId }}" {{ old('student_id') == $studentId ? 'selected' : '' }}>
                                {{ $studentName }}
                            </option>
                        @endforeach
                    </select>
                    @error('student_id')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="form-group mt-2">
                    <label for="status">Status</label>
                    <select class="form-select" name="status" id="status">
                        <option disabled {{ old('status') ? '' : 'selected' }}>Select Status</option>
                        <option value="Present" {{ old('status') == 'Present' ? 'selected' : '' }}>Present</option>
                        <option value="Absent" {{ old('status') == 'Absent' ? 'selected' : '' }}>Absent</option>
                    </select>
                    @error('status')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group mt-3 d-grid gap-2 d-md-flex justify-content-end">
                    <button class="btn btn-primary">
                        Add Attendance
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
            height: 400px;
            background-color: rgb(74, 73, 73, 0.5);
        }
    </style>
@endsection
