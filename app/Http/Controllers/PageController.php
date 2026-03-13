<?php

namespace App\Http\Controllers;

use App\Models\HomeSection;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function principalDesk()
    {
        $section = HomeSection::active()->where('section_type', '=', 'principal', 'and')->first(['*']);
        return view('frontend.principal-desk', compact('section'));
    }

    public function correspondentDesk()
    {
        $section = HomeSection::active()->where('section_type', '=', 'correspondent', 'and')->first(['*']);
        return view('frontend.correspondent-desk', compact('section'));
    }
}
