<?php

namespace App\Http\Controllers\Web\Admin\Book;

use App\Http\Controllers\Controller;
use App\Http\Filters\BookFilter;
use App\Http\Requests\Web\Book\FilterRequest;
use App\Models\Book;
use App\Models\Genre;


class IndexController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(BookFilter::class, ['queryParams' => array_filter($data)]);
        $books = Book::filter($filter)->orderBy('id','desc')->paginate(config('catalog.per_page', 10));
        $editKeys = Book::getEditKeys();
        $genres = Genre::all();
        return view('admin.book.index', compact('books', 'editKeys', 'genres'));
    }
}
