<?php

namespace App\Http\Controllers;

use App\Models\HomeSection;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function principalDesk()
    {
        return view('frontend.principal-desk');
    }

    public function correspondentDesk()
    {
        return view('frontend.correspondent-desk');
    }
}
