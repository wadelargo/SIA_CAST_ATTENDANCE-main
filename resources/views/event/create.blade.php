@extends('pages.base')

@section('content')
    <div class="jumbotron">
            <h1 class="name">Create Event</h1>
        <center>
            <div class="col-md-5">
                <form action="{{url('event/create')}}" method="POST">
                    @csrf
                    <div class="form-group mt-2">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control">
                        @error('title')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="description">Description</label>
                        <input type="text" name="description" class="form-control">
                        @error('description')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control">
                        @error('date')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mu-3 d-grid gap-2 d-md-flex justify-content-end mt-3">
                        <button class="btn btn-primary">
                            Add Event
                        </button>
                    </div>
                </form>
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