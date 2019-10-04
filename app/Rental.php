<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $guarded = [];

    public function rentalsBook()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function rentalsUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
