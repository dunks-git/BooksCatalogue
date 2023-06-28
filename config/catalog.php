<?php
return [
    'book_id_prefix' => 'bk',
    'xml_book_id_key' => '::id',
    'xml_book_keys' => '::id,author,title,genre,price,publish_date,description',
    'xml_books_schema' => 'book[::id,author,title,genre,price,publish_date,description]',
    'xml_books_import_path' => 'xml/',
    'per_page' => 10,
    'currency_exponent' => 2,
];
