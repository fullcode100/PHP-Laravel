<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <style type="text/css">
        form{
            display:inline-block;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-inverse">
        <div class="container">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="/">BSA 2016 PHP</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{action('BookUsersController@index')}}">Book users</a></li>
                <li><a href="{{action('BooksController@index')}}">Books</a></li>
            </ul>
        </div>
        </div>
    </nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>