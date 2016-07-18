@extends("index")

@section('content')
    <h1>All books</h1><hr>
    @if (session('dialog'))
        <div class="alert alert-success">
            {{ session('dialog') }}
        </div>
    @endif
    @can('adminRole')
        <div>
            <h2>Add new book</h2>
                <a href="{{action('BooksController@create')}}" class="btn btn-info btn-lg">Create new book</a>
         </div>
        <hr>
    @endcan
    @foreach(array_chunk($books->getCollection()->all(),3) as $block)
        <div class="row">
            @foreach($block as $book)
                <div class="col-md-4">
                    <h3>{{$book->title}}</h3>
                    <ul>
                        <li>Author:{{$book->author}}</li>
                        <li>Year:{{$book->year}}</li>
                        <li>Genre:{{$book->genre}}</li>
                    </ul>
                    <a class="btn btn-default " href="{{action('BooksController@show',$book->id)}}" role="button">Book profile</a>
                    @can("adminRole")
                     <a class="btn btn-default" href="{{action('BooksController@edit',$book->id)}}" role="button">Edit book</a>
                    @endcan
                    @can("adminRole")
                        {{Form::open(['url' =>action('BooksController@destroy',$book->id), 'method' => 'delete'])}}
                        {{Form::hidden("id",$book->id)}}
                        {{Form::submit("Delete book",['class' => 'btn btn-danger'])}}
                        {{Form::close()}}
                    @endcan
                </div>
            @endforeach
        </div>
    @endforeach
    {{$books->links()}}
@stop

