<?php

namespace App\Http\Controllers\Web\Admin\Book;

use App\Http\Controllers\Web\Book\BaseController;
use App\Models\Book;
use Illuminate\Support\Facades\DB;


class DestroyController extends BaseController
{
    public function __invoke(Book $book)
    {
        try {
            DB::beginTransaction();
            $book->deleteOrFail();
            DB::commit();
            return response()->json(["data" => ["bookId" => $book->id]], 204, ['Content-Type' => 'application/json']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["data" => null, "error" => $e->getMessage() . " bookId: " . $book->id], 400, ['Content-Type' => 'application/json']);
        }
    }
}
