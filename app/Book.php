<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'author',
        'publisher',
        'edition',
        'shelf',
        'stock',
        'instock'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function reserved_users()
    {
        return $this->belongsToMany(User::class, 'reserved_book');
    }
}
