<?php

namespace App\Http\Controllers\Web\Admin\Book;

use App\Http\Controllers\Web\Book\BaseController;
use App\Http\Requests\Web\Book\StoreRequest;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        return $this->service->store($request->validated());
    }
}
