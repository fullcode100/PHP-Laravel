<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Books\Book;

class EditorController extends Controller
{
    /**
     * Revokes the specified book from user.
     *
     * @param  int  $bookid
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin', ['except' =>["show","index"]]);
    }
    public function revokeBook($bookid){
        $book = Book::findOrFail($bookid);
        $bookUser = $book->book_user_id;
        $book->book_user_id=null;
        $book->save();

        return redirect()->action('BookUsersController@show',$bookUser)
                                ->with('dialog', 'Book revoked back to library');
    }
    /**
     * Sets new user.
     *
     * @param  int  $bookid
     * @return \Illuminate\Http\Response
     */
    public function setNewUser($bookid,Request $request){
        $newUser =$request->input('newUserId', null);
        $book = Book::findOrFail($bookid);
        $book->book_user_id=$newUser;
        $book->save();


        return redirect()->action('BooksController@index')
                                ->with('dialog', 'New owner is set');
    }

}
