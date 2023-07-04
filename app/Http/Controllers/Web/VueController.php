<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class VueController extends Controller
{
    public function index()
    {
        return view('vue.base');
    }
    public function lists()
    {
        return view('vue.lists');
    }
    public function component()
    {
        return view('vue.component');
    }
}
