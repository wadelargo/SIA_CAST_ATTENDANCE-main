@extends('pages.base')

@section('content')
    <!-- Delete Attendance Modal -->
    <div class="modal fade" id="deleteAttendanceModal" tabindex="-1" aria-labelledby="deleteAttendanceLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteAttendanceLabel">Delete Attendance - {{ $attendance->student->full_name }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('attendance/' . $attendance->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        Are you sure you want to delete this attendance?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete Attendance</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (session('message'))
        <div class="success">{{ session('message') }}</div>
    @endif

    <div class="jumbotron">
            <h1>Edit Attendance</h1>
        <center>
            <div class="row">
                <div class="col-md-5">
                    <form action="{{ url('attendance/' . $attendance->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mt-2">
                            <label for="student_id">Select Student</label>
                            <select class="form-select" name="student_id" id="student_id">
                                <option disabled>Select Student</option>
                                @foreach ($students as $studentId => $studentName)
                                    <option value="{{ $studentId }}" {{ $attendance->student_id == $studentId ? 'selected' : '' }}>
                                        {{ $studentName }}
                                    </option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="event_id">Select Event</label>
                            <select class="form-select" name="event_id" id="event_id">
                                <option disabled>Select Event</option>
                                @foreach ($events as $eventId => $eventName)
                                    <option value="{{ $eventId }}" {{ $attendance->event_id == $eventId ? 'selected' : '' }}>
                                        {{ $eventName }}
                                    </option>
                                @endforeach
                            </select>
                            @error('event_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for="status">Status</label>
                            <select class="form-select" name="status" id="status">
                                <option value="Present" {{ $attendance->status == 'Present' ? 'selected' : '' }}>Present</option>
                                <option value="Absent" {{ $attendance->status == 'Absent' ? 'selected' : '' }}>Absent</option>
                            </select>
                            @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mt-3 d-grid gap-2 d-md-flex justify-content-end">
                            <button class="btn btn-sm btn-outline-primary">
                                Update Attendance
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteAttendanceModal">
                                Delete Attendance
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
            height: 400px;
            background-color: rgb(74, 73, 73,0.5);
        }
    </style>
@endsection
