<?php

namespace App\Http\Controllers;

use App\Book;
use App\Traits\BookLists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    use BookLists;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $books = $this->bookLists();
        return view('home',compact('books'));
    }
}
