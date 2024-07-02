@extends('pages.base')

@section('content')

@if (session('info'))
<div class="alert alert-success">{{ session('info') }}</div>
@endif

<div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
    <a href="{{ url('/student/create') }}" class="btn btn-outline-success mb-3" type="button">
        Add New Student
    </a>

    <a href="students/pdf" target="_blank"  class="btn btn-outline-warning mb-3">Generate PDF</a>
</div>

<div class="container-fluid">
    <div class="row">
        @foreach($students as $student)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <div class="d-flex justify-content-center mb-3">
                            <!-- Generate QR code with student ID and name as content -->
                            {!! QrCode::size(150)->generate($student->id . ' - ' . $student->full_name) !!}
                        </div>
                        <h5 class="card-title">
                         <strong>{{ $student->full_name }}</strong>
                        </h5>

                        <div class="text-start">
                            <p class="card-text">
                                <strong>Year Level:</strong> {{ $student->year_level }}<br>
                                <strong>Address:</strong> {{ $student->address }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="btn-group">
                                <a href="{{ url('student/'.$student->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            </div>
                            <small class="text-muted">{{ $student->created_at->format('M d, Y') }}</small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
