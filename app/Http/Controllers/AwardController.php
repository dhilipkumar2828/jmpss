<?php

namespace App\Http\Controllers;

use App\Models\Award;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::active()->paginate(9);
        $years  = Award::active()->pluck('year')->unique()->sortDesc();
        return view('frontend.awards', compact('awards', 'years'));
    }
}
