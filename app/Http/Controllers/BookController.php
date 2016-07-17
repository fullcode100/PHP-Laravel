<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\User;
use Illuminate\Http\Request;
use Gate;

class BookController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @param $id
     * @return string
     */
    public  function showBook($id,Request $request){
        $book = \App\Book::find($id);
        if(\Auth::guest()){
            print("You are guest!!!");
        }
        if(\Auth::user()) print("<h1>Registered user</h1>");
        dd(\Auth::getUser()->toArray());
        $this->authorize('view-book',$book);
        print($book->title);
    }
}
