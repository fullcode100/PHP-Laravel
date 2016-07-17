@extends("index")

@section('content')
    <h1>Create new user </h1><hr>
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
        {{Form::open(['url' =>action('BookUsersController@store'), 'method' => 'POST'])}}
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="first_name" value="">
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="last_name" value="">
        </div>
        <div class="form-group">
            <label for="email">Last Name:</label>
            <input type="email" class="form-control" id="email" name="email" value="" placeholder="email">
        </div>
        {{Form::submit("Create user",['class' => 'btn btn-primary'])}}
        {{Form::close()}}
    </div>
@stop

