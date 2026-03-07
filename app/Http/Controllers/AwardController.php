<?php

namespace App\Http\Controllers;

use App\Models\Award;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Throwable;

class AwardController extends Controller
{
    public function index()
    {
        try {
            $awards = Award::active()->paginate(9);
            $years = Award::active()->pluck('year')->unique()->sortDesc();
        } catch (Throwable $e) {
            report($e);
            $awards = new LengthAwarePaginator(
                collect(),
                0,
                9,
                LengthAwarePaginator::resolveCurrentPage(),
                ['path' => LengthAwarePaginator::resolveCurrentPath()]
            );
            $years = new Collection();
        }

        return view('frontend.awards', compact('awards', 'years'));
    }
}
