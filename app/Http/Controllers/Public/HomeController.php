<?php

declare(strict_types=1);

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Wandeling;

final class HomeController extends Controller
{
    public function index(): View
{
    $hikes = Wandeling::where('date_of_hike', '>=', today())
        ->orderBy('date_of_hike')
        ->take(4)
        ->get();

    return view('public.home', [
        'hikes' => $hikes,
    ]);
    }
}
