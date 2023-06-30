<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Web\Book\BaseController;
use App\Http\Filters\BookFilter;
use App\Http\Requests\Web\Book\FilterRequest;
use App\Http\Resources\Book\BookResource;
use App\Models\Book;


class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $page = $data['page'] ?? 1;
        $perPage = $data['per_page'] ?? config('catalog.per_page', 10);
        $filter = app()->make(BookFilter::class, ['queryParams' => array_filter($data)]);
        $books = Book::filter($filter)->orderBy('id','desc')->paginate($perPage, ['*'], 'page', $page );
        return BookResource::collection($books);
    }
}
