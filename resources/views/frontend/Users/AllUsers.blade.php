@extends("index")

@section('content')
    <h1>All users</h1><hr>
    @if (session('dialog'))
        <div class="alert alert-success">
            {{ session('dialog') }}
        </div>
    @endif
    @can("adminRole")
        <h2>Create new user</h2>
        <a class="btn btn-info btn-lg" href="{{action('BookUsersController@create')}}" role="button">Create new user</a>
        <hr>
    @endcan
    <h2>All existng users</h2>
    @foreach(array_chunk($users->getCollection()->all(),4) as $block)
        <div class="row">
            @foreach($block as $user)
                <div class="col-md-3">
                    <h3>{{$user->first_name}},{{$user->last_name}}</h3>
                    <a class="btn btn-default" href="{{action('BookUsersController@show',$user->id)}}" role="button">Books</a>
                    @can("adminRole")
                        <a class="btn btn-default" href="{{action('BookUsersController@edit',$user->id)}}" role="button">Edit</a>
                    @endcan
                    @can("adminRole")
                        {{Form::open(['url' =>action('BookUsersController@destroy',$user->id), 'method' => 'delete'])}}
                        {{Form::hidden("id",$user->id)}}
                        {{Form::submit("delete user",['class' => 'btn btn-danger'])}}
                        {{Form::close()}}
                    @endcan
                </div>
            @endforeach
        </div>
    @endforeach
    {{$users->links()}}
@stop

