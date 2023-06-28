<?php

namespace App\Http\Controllers\Web\Admin\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;


class ImportController extends Controller
{
    public function __invoke(string $fileName = 'books.xml')
    {

        try {
            $books = [];
            Book::xmlImport($books, $fileName);
            if (empty($books)) {
                return response()->json(["data" => [], "error" => "import file $fileName does not contain any book"], 404, ['Content-Type' => 'application/json']);
            }
        } catch (\Exception $e) {
            return response()->json(["data" => null, "error" => $e->getMessage()], 400, ['Content-Type' => 'application/json']);
        }

        try {
            DB::beginTransaction();
            $bookId = 0;
            foreach ($books as $book) {
                $bookId = $book['id'];
                $deletedBook = Book::onlyTrashed()->find($book['id']);
                if ($deletedBook) {
                    $deletedBook->restore();
                }

                $genre = Genre::withTrashed()->firstOrCreate(['title' => $book['genre']]);

                Book::withTrashed()->updateOrCreate([
                    'id' => $book['id'],
                ], [
                    'id' => $book['id'],
                    'id_prefix' => $book['id_prefix'],
                    'author' => $book['author'],
                    'title' => $book['title'],
                    'genre_id' => $genre->id,
                    'price' => $book['price'],
                    'publish_date' => $book['publish_date'],
                    'description' => $book['description']
                ]);
            }
            DB::commit();
            return response()->json(["bookId" => $bookId], 204, ['Content-Type' => 'application/json']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["data" => null, "error" => $e->getMessage() . " bookId: " . $bookId], 400, ['Content-Type' => 'application/json']);
        }
    }

}
