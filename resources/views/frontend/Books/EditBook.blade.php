@extends("index")

@section('content')
    <h1>{{$book->title}}</h1><hr>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>
        {{Form::open(['url' =>action('BooksController@update',$book->id), 'method' => 'PUT'])}}
        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" class="form-control" id="author" name="author" value="{{$book->author}}">
        </div>
        <div class="form-group">
            <label for="genre">Genre:</label>
            <input type="text" class="form-control" id="genre" name="genre" value="{{$book->genre}}">
        </div>
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$book->title}}">
        </div>
        <div class="form-group">
            <label for="year">Year:</label>
            <input type="year" class="form-control" id="year" name="year" value="{{$book->year}}">
            <input type="hidden" name="id" value="{{$book->id}}">
        </div>
        {{Form::submit("Update book",['class' => 'btn btn-primary'])}}
        {{Form::close()}}
    </div>
@stop

