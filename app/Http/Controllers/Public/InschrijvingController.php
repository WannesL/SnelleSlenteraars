<?php

declare(strict_types=1);

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Wandeling;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

final class InschrijvingController extends Controller
{
    public function store(Request $request, Wandeling $wandeling): RedirectResponse
    {
        // Na afloop springen we terug naar het formulier op de detailpagina
        $terug = route('wandeling', $wandeling) . '#inschrijven';

        // 1. Al vertrokken? Dan kan je niet meer inschrijven.
        if ($wandeling->date_of_hike->isPast()) {
            return redirect($terug);
        }

        // 2. Honeypot: dit verborgen veld vult alleen een bot in.
        if ($request->filled('website')) {
            return redirect($terug)->with('success', 'Bedankt voor je inschrijving!');
        }

        // 3. Controleren of alles correct is ingevuld
        $validator = Validator::make($request->all(), [
            'first_name' => [
                'required',
                'string',
                'max:50',
                Rule::unique('inschrijvings')->where(fn($query) => $query
                    ->where('wandeling_id', $wandeling->id)
                    ->where('last_name', $request->input('last_name'))),
            ],
            'last_name' => ['required', 'string', 'max:50'],
            'people'    => ['required', 'integer', 'min:1', 'max:10'],
        ], [
            'first_name.required' => 'Vul je voornaam in.',
            'first_name.unique'   => 'Je bent al ingeschreven voor deze wandeling.',
            'last_name.required'  => 'Vul je achternaam in.',
            'max'                 => 'Dat is wel een heel lange naam (max. :max tekens).',
            'people.integer'      => 'Vul een getal in.',
            'people.min'          => 'Minstens 1 persoon, jezelf!',
            'people.max'          => 'Met meer dan 10? Stuur ons even een berichtje.',
        ]);

        if ($validator->fails()) {
            return redirect($terug)->withErrors($validator)->withInput();
        }

        // opslaan
        $gegevens = $validator->validated();
        $wandeling->inschrijvingen()->create($gegevens);

        return redirect($terug)->with('success', "Top, {$gegevens['first_name']}! Je bent ingeschreven. Tot dan!");
    }
}
