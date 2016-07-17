@extends("index")

@section('content')
<h1>Create new book </h1><hr>
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
    {{Form::open(['url' =>action('BooksController@store'), 'method' => 'POST'])}}
    <div class="form-group">
        <label for="author">Author:</label>
        <input type="text" class="form-control" id="author" name="author" value="">
    </div>
    <div class="form-group">
        <label for="lastName">Genre:</label>
        <input type="text" class="form-control" id="genre" name="genre" value="">
    </div>
    <div class="form-group">
        <label for="year">Year when book was published:</label>
        <input type="text" class="form-control" id="year" name="year" value="">
    </div>
    <div class="form-group">
        <label for="title">Book title:</label>
        <input type="text" class="form-control" id="title" name="title" value="">
    </div>
    {{Form::submit("Create book",['class' => 'btn btn-primary'])}}
    {{Form::close()}}
</div>
@stop

