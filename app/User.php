<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * [books description]
     * 
     * @return [type] [description]
     */
    public function books()
    {
        return $this->belongsToMany(Book::class)
                    ->withPivot(
                        'id',
                        'return_date', 
                        'borrowed_date', 
                        'returned_date', 
                        'violation', 
                        'status'
                    );
    }

    /**
     * [borrowed description]
     * 
     * @return [type] [description]
     */
    public function borrowed() {
        return $this->books()
                    ->wherePivot('status', false);
    }

    /**
     * [returned description]
     * 
     * @return [type] [description]
     */
    public function returned() {
        return $this->books()
                    ->wherePivot('status', true);
    }

    /**
     * [status description]
     * 
     * @param  [type] $pivotID [description]
     * @return [type]          [description]
     */
    public function status($pivotID)
    {
        return $this->books()
                    ->newPivotStatement()
                    ->where('id', $pivotID)
                    ->where('status', false)
                    ->get();
    }

    /**
     * [reserved_books description]
     * 
     * @return [type] [description]
     */
    public function reserved_books()
    {
        return $this->belongsToMany(Book::class, 'reserved_book')
                    ->withPivot(
                        'id',
                        'reserved_date', 
                        'status'
                    );;
    }

    public function pending()
    {
        return $this->reserved_books()
                    ->orderBy('status', 'asc');
    }
}
