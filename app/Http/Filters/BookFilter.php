<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class BookFilter extends AbstractFilter
{
    public const ID = 'id';
    public const AUTHOR = 'author';
    public const TITLE = 'title';
    public const PRICE = 'price';
    public const PUBLISH_YEAR = 'publish_year';
    public const DESCRIPTION = 'description';
    public const GENRE_ID = 'genre_id';

    protected function getCallbacks(): array
    {
        return [
            self::ID => [$this, 'id'],
            self::AUTHOR => [$this, 'author'],
            self::TITLE => [$this, 'title'],
            self::PRICE => [$this, 'price'],
            self::PUBLISH_YEAR => [$this, 'publishYear'],
            self::DESCRIPTION => [$this, 'description'],
            self::GENRE_ID => [$this, 'genreId'],
        ];
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }

    public function author(Builder $builder, $value)
    {
        $builder->where('author', 'like', "%{$value}%");
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function price(Builder $builder, $value)
    {
        $builder->where('price', $value);
    }

    public function publishYear(Builder $builder, $value)
    {
        $builder->whereYear('publish_date', $value);
    }

    public function description(Builder $builder, $value)
    {
        $builder->where(__FUNCTION__, 'like', "%{$value}%");
    }

    public function genreId(Builder $builder, $value)
    {
        $builder->where('genre_id', $value);
    }

}
