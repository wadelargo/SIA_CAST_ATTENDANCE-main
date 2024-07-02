@extends('pages.base')

@section('content')
<!-- Modal -->
<div class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="deleteEventLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteEventLabel">Delete Event - {{$event->id}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <form action="{{url('event/'.$event->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    Are you sure you want to delete this event?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete Event</button>
                </div>
            </form>
        </div>
    </div>
</div>

@if (session('message'))
<div class="success">{{session('message')}}</div>
@endif
<div class="jumbotron">
    <h1>Edit Event</h1>
    <center>
        <div class="row">
            <div class="col-md-5">
                <form action="{{url('event/'.$event->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" placeholder="Enter title..." class="form-control" value="{{$event->title}}">
                        @error('title')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" placeholder="Enter description..." class="form-control" value="{{$event->description}}">
                        @error('description')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="date">Date</label>
                        <input type="date" name="date" id="date" class="form-control" value="{{$event->date}}">
                        @error('date')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group my-3 d-grid gap-2 d-md-flex justify-content-end">
                        <button class="btn btn-sm btn-outline-primary">
                            Update Event
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteEventModal">
                            Delete Event
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
