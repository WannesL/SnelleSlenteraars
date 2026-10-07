<?php

declare(strict_types=1);

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Wandeling;

final class WandelingController extends Controller
{
    public function show(Wandeling $wandeling): View
    {

        $aantal = (int) $wandeling->inschrijvingen()->sum('people');

        return view('public.hike', ['wandeling' => $wandeling, 'aantal' => $aantal,]);
    }
}
