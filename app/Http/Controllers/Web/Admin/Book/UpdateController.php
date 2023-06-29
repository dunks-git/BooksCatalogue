<?php

namespace App\Http\Controllers\Web\Admin\Book;

use App\Http\Controllers\Web\Book\BaseController;
use App\Http\Requests\Web\Book\UpdateRequest;
use App\Models\Book;


class UpdateController extends BaseController
{
    /**
     * @param UpdateRequest $request
     * @param Book $book
     */
    public function __invoke(UpdateRequest $request, Book $book)
    {
        return $this->service->update($book, $request->validated());
    }
}
