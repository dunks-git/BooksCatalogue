<?php

namespace App\Http\Controllers\Web\Book;

use App\Http\Controllers\Controller;
use App\Services\Book\Service;

class BaseController extends Controller
{
    public function __construct( public Service $service )
    {
    }
}
