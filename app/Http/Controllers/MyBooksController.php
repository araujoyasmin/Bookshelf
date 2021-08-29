<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\MyBook;

class MyBooksController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
     }


     public function index(){

      $books = MyBook::select('*','books.name as book_name','users.name as user_name')
      ->leftJoin('books', function($join){
            $join->on('my_books.id_book','=','books.id');
      })
      ->leftJoin('users',function($join2){
          $join2->on('my_books.id_user', '=','users.id');
      })
      ->get();

      /*foreach ($books as $book){
          print_r($book);
      }
        */

      
        return view('meus_livros',[
            'books' => $books
        ]);
     }


     public function favoritos(){

        $books = MyBook::select('*','books.name as book_name','users.name as user_name')
                        ->leftJoin('books', function($join){
                                $join->on('my_books.id_book','=','books.id');
                        })
                        ->leftJoin('users',function($join2){
                            $join2->on('my_books.id_user', '=','users.id');
                        })
                        ->where('fav',1)
                        ->get();

                      
         
         return view('favoritos',[
             'books' => $books
         ]);
     }

     public function lendo(){

        $books = MyBook::select('*','books.name as book_name','users.name as user_name')
                        ->leftJoin('books', function($join){
                                $join->on('my_books.id_book','=','books.id');
                        })
                        ->leftJoin('users',function($join2){
                            $join2->on('my_books.id_user', '=','users.id');
                        })
                        ->where('status',2)
                        ->get();

                        return view('lendo',[
                            'books' => $books
                        ]);
     }

     public function abandonados(){
        $books = MyBook::select('*','books.name as book_name','users.name as user_name')
        ->leftJoin('books', function($join){
                $join->on('my_books.id_book','=','books.id');
        })
        ->leftJoin('users',function($join2){
            $join2->on('my_books.id_user', '=','users.id');
        })
        ->where('status',4)
        ->get();

        return view('abandonados',[
            'books' => $books
        ]);
     }

     public function queroler(){
        $books = MyBook::select('*','books.name as book_name','users.name as user_name')
        ->leftJoin('books', function($join){
                $join->on('my_books.id_book','=','books.id');
        })
        ->leftJoin('users',function($join2){
            $join2->on('my_books.id_user', '=','users.id');
        })
        ->where('status',3)
        ->get();

        return view('queroler',[
            'books' => $books
        ]);
     }

}
