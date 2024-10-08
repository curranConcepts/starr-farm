<?php

namespace App\Http\Controllers;

use App\Models\Chicken;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index(Request $request)
    {
        // data on breed percentage, avg age
        $totalChickens = Chicken::count();

        return view('welcome', compact('totalChickens'));
    }

    public function page($slug, Request $request)
    {
        return view("pages.$slug");
    }
}
