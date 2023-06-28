<?php

namespace App\Http\Controllers\Web\Book;

use App\Http\Filters\BookFilter;
use App\Http\Requests\Web\Book\FilterRequest;
use App\Models\Book;


class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(BookFilter::class, ['queryParams' => array_filter($data)]);
        $books = Book::filter($filter)->orderBy('id','desc')->paginate(config('catalog.per_page', 10));

        return view('book.index', compact('books'));
    }
}
