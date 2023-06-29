<?php

namespace App\Http\Controllers\Web\Admin\Book;

use App\Http\Controllers\Web\Book\BaseController;
use App\Http\Requests\Web\Book\DestroyRequest;
use App\Models\Book;


class DestroyController extends BaseController
{
    public function __invoke(DestroyRequest $request, Book $book)
    {
        return $this->service->destroy($book, $request->validated());
    }

}
