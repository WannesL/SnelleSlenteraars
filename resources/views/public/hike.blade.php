@extends('public.layout')

@section('title', $wandeling->title . ' – Snelle Slenteraars')

@section('content')
    <article class="max-w-3xl mx-auto px-6 py-10">

        <a href="{{ route('home') }}" class="text-mos-600 hover:underline print:hidden">
            ← Terug naar alle wandelingen
        </a>

        {{-- Kop, zoals bovenaan de flyer --}}
        <p class="mt-6 text-zon-600 font-semibold">Wandelclub De Snelle Slenteraars</p>
        <h1 class="font-display text-4xl md:text-5xl font-semibold pb-4 mb-4 border-b-2 border-mos-100">
            {{ $wandeling->title }}
        </h1>

        <div class="flex flex-wrap items-center gap-3 mb-6">
            <x-aantal-badge :aantal="$aantal" />

            @if ($wandeling->date_of_hike->isFuture())
                <a href="#inschrijven" class="text-sm font-semibold text-zon-600 hover:underline print:hidden">
                    Schrijf je in ↓
                </a>
            @endif
        </div>

        <img src="{{ $wandeling->imageUrl() }}" alt="{{ $wandeling->title }}"
            class="w-full h-72 md:h-96 object-cover rounded-3xl shadow-md">

        {{-- De flyerblokken, met een lijn ertussen --}}
        <div class="mt-4 divide-y divide-mos-100">

            <x-flyer-section title="Wat?">
                <p class="whitespace-pre-line">{{ $wandeling->description }}</p>
            </x-flyer-section>

            <x-flyer-section title="Wanneer?">
                <strong>{{ ucfirst($wandeling->date_of_hike->translatedFormat('l j F Y')) }}</strong>
            </x-flyer-section>

            <x-flyer-section title="Waar?">
                <p>We spreken af aan <strong>{{ lcfirst($wandeling->location) }}</strong>.</p>
                @if ($wandeling->meeting_info)
                    <p>{{ $wandeling->meeting_info }}</p>
                @endif
            </x-flyer-section>

            <x-flyer-section title="Vertrek">
                <strong>{{ $wandeling->date_of_hike->format('G\ui') }}</strong>
            </x-flyer-section>

            @if ($wandeling->end_of_hike)
                <x-flyer-section title="Verwachte aankomst">
                    Rond <strong>{{ $wandeling->end_of_hike->format('G\ui') }}</strong> zijn we terug aan de auto's.
                </x-flyer-section>
            @endif

            <x-flyer-section title="Afstand">
                De wandeling is <strong>{{ number_format($wandeling->distance, 1, ',', '.') }} km</strong> lang.
            </x-flyer-section>

            @if (count($wandeling->practicalInfoList()))
                <x-flyer-section title="Praktische info">
                    <ul class="list-disc pl-5 space-y-1 marker:text-zon-500">
                        @foreach ($wandeling->practicalInfoList() as $tip)
                            <li>{{ $tip }}</li>
                        @endforeach
                    </ul>
                </x-flyer-section>
            @endif

            {{-- INSCHRIJVEN --}}
            <section id="inschrijven" class="py-6 print:hidden">

                @if (session('success'))
                    <div class="mb-4 bg-mos-100 text-mos-800 rounded-2xl px-5 py-4 font-semibold">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($wandeling->date_of_hike->isFuture())
                    <details class="group bg-zon-100 rounded-3xl" @if ($errors->any()) open @endif>

                        <summary
                            class="flex items-center justify-between gap-4 p-6 cursor-pointer list-none [&::-webkit-details-marker]:hidden">
                            <span>
                                <span class="block font-display text-2xl font-semibold">Ga je mee? Schrijf je hier
                                    in!</span>
                                <span class="text-schors/70">Geen account nodig, gewoon je naam.</span>
                            </span>
                            <span
                                class="shrink-0 grid place-items-center size-10 rounded-full bg-zon-500 text-white text-2xl transition group-open:rotate-45">+</span>
                        </summary>

                        <form method="POST" action="{{ route('inschrijven', $wandeling) }}" class="px-6 pb-6 space-y-4">
                            @csrf

                            {{-- Honeypot: onzichtbaar voor mensen --}}
                            <div class="hidden" aria-hidden="true">
                                <label>Website <input type="text" name="website" tabindex="-1"
                                        autocomplete="off"></label>
                            </div>

                            <div class="grid sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="first_name" class="block font-semibold mb-1">Voornaam</label>
                                    <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}"
                                        required maxlength="50"
                                        class="w-full rounded-xl border border-mos-100 bg-white px-4 py-2 focus:outline-none focus:ring-2 focus:ring-zon-400">
                                    @error('first_name')
                                        <p class="text-red-700 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="last_name" class="block font-semibold mb-1">Achternaam</label>
                                    <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}"
                                        required maxlength="50"
                                        class="w-full rounded-xl border border-mos-100 bg-white px-4 py-2 focus:outline-none focus:ring-2 focus:ring-zon-400">
                                    @error('last_name')
                                        <p class="text-red-700 text-sm mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div>
                                <label for="people" class="block font-semibold mb-1">Met hoeveel personen kom je?</label>
                                <input id="people" name="people" type="number" min="1" max="10"
                                    value="{{ old('people', 1) }}"
                                    class="w-24 rounded-xl border border-mos-100 bg-white px-4 py-2 focus:outline-none focus:ring-2 focus:ring-zon-400">
                                <p class="text-sm text-schors/70 mt-1">Jezelf meegerekend.</p>
                                @error('people')
                                    <p class="text-red-700 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <button type="submit"
                                class="bg-zon-500 hover:bg-zon-600 text-white font-semibold px-6 py-3 rounded-full transition">
                                Inschrijven
                            </button>

                            <p class="text-sm text-schors/70">Je naam is enkel zichtbaar voor de organisatoren.</p>
                        </form>
                    </details>
                @else
                    <div class="bg-mos-50 rounded-3xl p-6">
                        <p class="font-display text-xl font-semibold">Inschrijvingen zijn gesloten</p>
                        <p class="text-schors/70">Deze wandeling is al vertrokken. Hopelijk tot de volgende keer!</p>
                    </div>
                @endif

            </section>

            <x-flyer-section title="Kaart">
                @if ($wandeling->map_image)
                    <img src="{{ asset('images/kaarten/' . $wandeling->map_image) }}"
                        alt="Kaart van de wandeling {{ $wandeling->title }}"
                        class="w-full rounded-2xl border border-mos-100">
                @else
                    <iframe src="https://maps.google.com/maps?q={{ urlencode($wandeling->location) }}&output=embed"
                        class="w-full h-80 rounded-2xl border-0" loading="lazy"></iframe>
                @endif
            </x-flyer-section>

        </div>
    </article>
@endsection
