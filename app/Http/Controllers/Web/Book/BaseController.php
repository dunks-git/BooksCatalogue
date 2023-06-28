<?php

namespace App\Http\Controllers\Web\Book;

use App\Http\Controllers\Controller;
use App\Services\Book\Service;

class BaseController extends Controller
{
    public Service $service;
    public function __construct( Service $service )
    {
        $this->service = $service;
    }
}
