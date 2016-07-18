@extends("index")

@section('content')

    <h1>Book profile</h1>
    <hr>
    @if (session('dialog'))
        <div class="alert alert-success">
            {{ session('dialog') }}
        </div>
    @endif
     <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Author:</th>
                    <th>Genre:</th>
                    <th>Year:</th>
                    <th>Title:</th>
                    <th>Book User:</th>
                    <th>Assign to user:</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$book["author"]}}</td>
                        <td>{{$book["genre"]}}</td>
                        <td>{{$book["year"]}}</td>
                        <td>{{$book["title"]}}</td>
                        <td>
                            @if($owner)
                                <a href="{{action('BookUsersController@show',$owner["id"])}}">{{$owner["first_name"]}},{{$owner["last_name"]}}</a>
                            @else
                                Not assigned
                            @endif
                        </td>
                        <td>
                            @can("adminRole")
                                    {{Form::open(['url' =>action('EditorController@setNewUser',$book["id"]), 'method' => 'post'])}}
                                    <select id="bookUsers" name="newUserId">
                                        @foreach($allUsers as $newuser)
                                        <option value="{{$newuser->id}}">{{$newuser->first_name}},{{$newuser->last_name}}</option>
                                        @endforeach
                                    </select>
                                    {{Form::submit("Set new user")}}
                                    {{Form::close()}}
                            @endcan
                            @cannot("adminRole")
                                <span>Requires Admin access</span>
                            @endcannot
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
@stop


