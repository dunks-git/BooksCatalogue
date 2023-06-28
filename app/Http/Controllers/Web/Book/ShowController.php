<?php

namespace App\Http\Controllers\Web\Book;

use App\Models\Book;


class ShowController extends BaseController
{
    public function __invoke(Book $book)
    {
        $showKeys = Book::getShowKeys();
        return view('book.show', compact('book', 'showKeys'));
    }
}
