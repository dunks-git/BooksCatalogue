<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Orchestra\Parser\Xml\Facade as XmlParser;

class Book extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;

    protected $table = 'books';
//    protected $guarded = []; //TODO:remove this
    protected $fillable = ['id', 'id_prefix', 'author', 'title', 'genre_id', 'price', 'publish_date', 'description'];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }

    /**
     * @return string[]
     */
    public static function getEditKeys (): array
    {
        return ['Id', 'Author', 'Title', 'Genre', 'Price', 'Publish date', 'Description', '&nbsp;'];
    }

    /**
     * @return string[]
     */
    public static function getShowKeys (): array
    {
        return ['Id', 'Author', 'Title', 'Genre', 'Price', 'Publish date', 'Description'];
    }

    /**
     * @param array $book
     * @return void
     */
    public static function removeXmlIdes(array $book): array
    {
        $idKey = config('catalog.xml_book_id_key', '::id');
        if ($idKey !== 'id') {
            unset($book[$idKey]);
        }
        return $book;
    }

    /**
     * @param array $book
     * @return bool
     */
    public static function filterByIdPrefix(array $book): bool
    {
        $idPrefix = config('catalog.book_id_prefix', 'bk');
        $idKey = config('catalog.xml_book_id_key', '::id');

        $ok = array_key_exists($idKey, $book) &&
            is_string($book[$idKey]) &&
            preg_match("/^(" . $idPrefix . ")\d+$/", $book[$idKey]);
        if (!$ok) return false;

        $matches = [];
        if (preg_match('#(\d+)$#', $book[$idKey], $matches)) {
            return intval($matches[1]) > 0;
        }

        return false;
    }

    /**
     * @param array $books
     * @param string $filename
     * @return void
     * @throws \Exception
     */
    public static function xmlImport(array &$books, string $filename = 'books.xml'): void
    {
        try {
            $idKey = config('catalog.xml_book_id_key', '::id');
            $xmlSchema = config('catalog.xml_books_schema', 'book[::id,author,title,genre,price,publish_date,description]');
            $xmlPath = config('catalog.xml_books_import_path', 'xml/') . $filename;
            if(!file_exists($xmlPath)){
                throw new \Exception(" $filename file not found, ");
            }
            $xml = XmlParser::load(public_path($xmlPath));
            $books = $xml->parse([
                'books' => ['uses' => $xmlSchema]
            ]);

            if (empty($books['books'])) {
                throw new \Exception(" $filename does not contain any book, ");
            }

            foreach ($books['books'] as &$b) {
                $b = array_map('truncateWhitespaces', $b);
                $idMatches = [];
                if (preg_match('#(\d+)$#', $b[$idKey], $idMatches)) {
                    $b['id'] = intval($idMatches[1]);
                }
                $b['price'] = intval(floatval($b['price']) * 100);

                $prefixMatches = [];
                if (preg_match('#^[a-z]+#', $b[$idKey], $prefixMatches)) {
                    $b['id_prefix'] = $prefixMatches[0];
                }
            }

            $books = array_filter($books['books'], 'self::filterByIdPrefix');
            $books = array_map('self::removeXmlIdes', $books);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage() . " xmlPath: $xmlPath, idKey: $idKey, xmlSchema: $xmlSchema");
        }
    }

}
