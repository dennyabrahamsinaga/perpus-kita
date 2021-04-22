<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = auth()->user()->borrow();

        $books = Book::orderBy('created_at', 'DESC')->limit(3)->get();
        return view('home', [
            'books' => $books,
        ]);

    }

    public function backToIndex()
    {
        return view('homepage');
    }
}
