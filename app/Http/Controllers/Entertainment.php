<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Entertainment extends Controller
{
    //
    public function index()
    {
        return view('pages/entertainment/index', [
            'title' => 'Entertainment',
            'active' => 'entertainment'
        ]);
    }
}
