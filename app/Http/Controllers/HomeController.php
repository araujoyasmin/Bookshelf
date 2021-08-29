<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Book;


class HomeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
     }

    public function index(){

        $data = Book::all();
        


        return view('index',[
            'books' => $data
        ]);
    }
}
