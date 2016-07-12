<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Book;
use App\Http\Requests;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('books')
                     ->where('id', Auth::id())
                     ->get();

        return view('home', [
            'users' => $users
        ]);
    }
}
