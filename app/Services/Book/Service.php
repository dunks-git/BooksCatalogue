<?php

namespace App\Services\Book;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;

class Service
{
    public function destroy(Book $book, $data)
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

    public function store($data)
    {
        try {
            DB::beginTransaction();
            $data['price'] = priceToInt($data['price']);
            $genre = genre::withTrashed()->firstOrCreate(['title' => $data['genre']]);
            $data['genre_id'] = $genre->id;
            unset($data['genre']);
            $result = Book::create($data);
            DB::commit();
            $id = $result->id ?? 0;
            return response()->json(["data" => ["id" => $id]], 200, ['Content-Type' => 'application/json']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["data" => null, "error" => $e->getMessage()], 400, ['Content-Type' => 'application/json']);
        }
    }

    public function update(Book $book, $data)
    {
        try {
            DB::beginTransaction();
            if (array_key_exists('genre', $data) && strlen($data['genre']) > 2) {
                $genre = Genre::withTrashed()->firstOrCreate(['title' => $data['genre']]);
                $data['genre_id'] = $genre->id;
                unset($data['genre']);
            }
            if (array_key_exists('price', $data)) {
                $data['price'] = priceToInt($data['price']);
            }
            $book->update($data);
            $book->fresh();
            DB::commit();
            return response()->json(["data" => ["bookId" => $book->id]], 204, ['Content-Type' => 'application/json']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(["data" => null, "error" => $e->getMessage() . " bookId: " . $book->id], 400, ['Content-Type' => 'application/json']);
        }

    }

}
