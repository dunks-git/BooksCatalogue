<?php

namespace App\Http\Controllers\Api\Book;

use App\Http\Controllers\Web\Book\BaseController;
use App\Http\Requests\Api\Book\UpdateRequest;
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
//        return new BookResource($book); // in case if service->update returns Book object
    }
}
