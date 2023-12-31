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
        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? config('catalog.per_page', 10);
        $filter = app()->make(BookFilter::class, ['queryParams' => array_filter($data)]);
        $books = Book::filter($filter)->orderBy('id', 'desc')->paginate($perPage, ['*'], 'page', $page);

        return view('book.index', compact('books'));
    }
}
