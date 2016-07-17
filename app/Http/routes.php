<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get("/testUser",function(){
    $user = \App\User::find(1);
    dd($user->UserBooks->toArray());
});

Route::get("/testBook",function(){
    $book = \App\Book::find(1);
    dd($book->owner->toArray());
});

Route::get("/book/{id}","BookController@showBook");

Route::get("/gitlogin","GithubAuthController@redirectToProvider");
Route::get("/auth/github/callback","GithubAuthController@handleProviderCallback");
Route::get("/dashboard",function(){
        $userName = Auth::getUser()["first_name"];
       return "<h1>{$userName}</h1>";
});

Route::auth();
Route::get('/home', 'HomeController@index');
