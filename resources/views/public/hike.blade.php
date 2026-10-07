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

    <x-aantal-badge :aantal="$aantal" class="mb-6" />

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
