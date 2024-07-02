@extends('pages.base')

@section('content')

@if (session('message'))
<div class="alert alert-success">{{ session('message') }}</div>
@endif

<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
    <a href="{{ url('/attendance/create') }}" class="btn btn-primary me-md-2" type="button">
        Add New Attendance
    </a>
    <a href="{{ route('attendance.csv') }}" class="btn btn-primary me-md-2" type="button">
        Download CSV
    </a>
    <a href="{{ route('attendance.import') }}" class="btn btn-secondary" type="button">
        Import CSV
    </a>
</div>

<div class="container-fluid">
    <div class="row">
        @foreach($attendances as $attendance)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title font-weight-bold">{{ $attendance->student->full_name }}</h5>
                        <div class="text-start">
                            <p class="card-text">
                                <strong>Event Title:</strong> {{ $attendance->event->title }}<br>
                                <strong>Status:</strong>
                                @if ($attendance->status == 'Absent')
                                    <span class="text-danger">{{ $attendance->status }}</span>
                                @elseif ($attendance->status == 'Present')
                                    <span class="text-success">{{ $attendance->status }}</span>
                                @else
                                    {{ $attendance->status }}
                                @endif
                            </p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="btn-group">
                                <a href="{{ url('attendance/'.$attendance->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            </div>
                        </div>
                        <small class="text-muted">Attended: {{ $attendance->created_at->format('M d, Y h:i A') }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
