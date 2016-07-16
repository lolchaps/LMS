<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('pending')->get();

        return view('reserve.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Book $book)
    {
        $user = Auth::user();

        $reserve_books = $user->reserved_books()
                              ->newPivotStatement()
                              ->where([
                                    ['status', false],
                                    ['user_id', Auth::id()],
                                ])
                              ->count();

        if($reserve_books >= 3)
        {
            flash('Only 3 reserve books for overnight!', 'danger');
        }

        else
        {
            $user->reserved_books()->save($book, [
                'reserved_date' => Carbon::now()
            ]);

            $book->decrement('instock');

            flash('Book has been reserved!');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Book $book, $pivotID)
    {
        $user->reserved_books()
             ->newPivotStatement()
             ->where('id', $pivotID)
             ->update(['status' => true]);

        flash('Book has been approved!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
