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
        try {
            return $this->service->update($book, $request->validated() );
//        return new BookResource($book); // in case if service->update returns Book object
        } catch (\Exception $e) {
            return response()->json(["data" => null, "error" => $e->getMessage() . " bookId: " . $book->id], 400, ['Content-Type' => 'application/json']);
        }
    }

}
