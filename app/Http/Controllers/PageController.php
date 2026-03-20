<?php

namespace App\Http\Controllers;

use App\Models\HomeSection;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function chairmanDesk()
    {
        return view('frontend.chairman-desk');
    }

    public function correspondentDesk()
    {
        return view('frontend.correspondent-desk');
    }
}
