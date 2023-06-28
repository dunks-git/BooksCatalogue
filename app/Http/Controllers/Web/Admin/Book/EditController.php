<?php

namespace App\Http\Controllers\Web\Admin\Book;

use App\Http\Controllers\Web\Book\BaseController;
use App\Models\Book;
use App\Models\Genre;


class EditController extends BaseController
{
    public function __invoke(Book $book)
    {
        $book->fresh();
        $genres = Genre::all();
        return view('admin.book.edit', compact('book', 'genres'));
    }
}
