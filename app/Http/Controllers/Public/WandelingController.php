<?php

declare(strict_types=1);

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Wandeling;

final class WandelingController extends Controller
{
    public function show($id): View
    {
        $wandeling= Wandeling::query()->where('id', $id)->firstOrFail();

        return view('public.hike', ['wandeling' => $wandeling]);
        }
        }

