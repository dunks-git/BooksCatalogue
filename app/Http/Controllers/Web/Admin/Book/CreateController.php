<?php

namespace App\Http\Controllers\Web\Admin\Book;

use App\Http\Controllers\Web\Book\BaseController;
use App\Models\Genre;


class CreateController extends BaseController
{
    public function __invoke()
    {
        $genres = Genre::all();
        return view('admin.book.create', compact('genres'));
    }
}
