<?php

namespace App\Traits;

use App\Book;

trait BookLists {

    protected function bookLists() {

        return Book::all();

    }
}
