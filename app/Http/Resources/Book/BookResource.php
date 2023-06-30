<?php

namespace App\Http\Resources\Book;

use App\Http\Resources\Genre\GenreResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "author" => $this->author,
            "title" => $this->title,
            "genre" => new GenreResource($this->genre),
            "price" => $this->price,
            "publish_date" => $this->publish_date,
            "description" => $this->description,
        ];
    }
}
