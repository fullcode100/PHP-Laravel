@extends("index")

@section('content')
    <h1>User <b><i>{{$user->first_name}},{{$user->last_name}}</i></b> profile </h1><hr>

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
        {{Form::open(['url' =>action('BookUsersController@update',$user->id), 'method' => 'PUT'])}}
        <div class="form-group">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="first_name" value="{{$user->first_name}}">
        </div>
        <div class="form-group">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="last_name" value="{{$user->last_name}}">
        </div>
        <div class="form-group">
            <label for="email">Last Name:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
            <input type="hidden" name="id" value="{{$user->id}}">
        </div>
        {{Form::submit("Update user",['class' => 'btn btn-primary'])}}
        {{Form::close()}}
    </div>
@stop

