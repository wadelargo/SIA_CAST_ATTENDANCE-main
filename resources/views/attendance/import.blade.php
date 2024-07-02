@extends('pages.base')

@section('content')
@if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif
<form action="{{ url('attendance/import-csv') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="csv_file" class="form-label">Upload CSV File</label>
        <input type="file" class="form-control" id="csv_file" name="csv_file" required>
    </div>
    <button type="submit" class="btn btn-primary mcdonalds-button">Import CSV</button>
</form>
@endsection
