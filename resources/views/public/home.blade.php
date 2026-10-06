@extends('public.layout')

@section('content')

    {{-- HERO --}}
    <section class="relative bg-mos-700 bg-cover bg-center text-white"
             style="background-image: url('{{ asset('images/hero.jpg') }}')">

        {{-- Groene waas over de foto --}}
        <div class="absolute inset-0 bg-linear-to-r from-mos-800/90 via-mos-800/60 to-transparent"></div>

        <div class="relative max-w-6xl mx-auto px-6 py-20 md:py-28 grid md:grid-cols-2 gap-10 items-center">

            {{-- Slogan --}}
            <div>
                <p class="text-zon-400 font-semibold mb-2">Wandelclub uit Brugge</p>
                <h1 class="font-display text-4xl md:text-6xl font-semibold leading-tight mb-4">
                    Stapje voor stapje,<br>samen op pad.
                </h1>
                <p class="text-lg text-mos-50 mb-8 max-w-md">
                    Geen haast, geen stress. Gewoon goed gezelschap, mooie paden en onderweg altijd tijd voor een koffie.
                </p>
                <a href="#wandelingen"
                   class="inline-block bg-zon-500 hover:bg-zon-600 text-white font-semibold px-6 py-3 rounded-full transition">
                    Bekijk de wandelingen ↓
                </a>
            </div>

            {{-- Briefje met de volgende wandeling --}}
            @php $volgende = $hikes->first(); @endphp

            @if ($volgende)
                <a href="{{ route('wandeling', $volgende) }}"
                   class="block bg-zon-100 text-schors rounded-3xl p-6 shadow-xl max-w-sm md:ml-auto rotate-2 hover:rotate-0 transition">
                    <p class="text-sm font-semibold text-zon-600 uppercase tracking-wide">📌 Volgende wandeling</p>
                    <p class="font-display text-2xl font-semibold mt-1">{{ $volgende->title }}</p>
                    <p class="mt-3">📅 {{ $volgende->date_of_hike->translatedFormat('l j F') }}
                        <span class="text-mos-600">({{ $volgende->date_of_hike->diffForHumans() }})</span>
                    </p>
                    <p>📍 {{ $volgende->location }} · 🚶 {{ $volgende->distance }} km</p>
                </a>
            @endif

        </div>
    </section>

    {{-- WANDELINGEN --}}
    <div id="wandelingen" class="max-w-6xl mx-auto p-6 pt-12">
        <h2 class="font-display text-3xl font-semibold mb-6">Komende wandelingen</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($hikes as $wandeling)
                <x-hikecard :wandeling="$wandeling" />
            @empty
                <p>Er zijn nog geen wandelingen gepland. Kom snel terug!</p>
            @endforelse
        </div>
    </div>

@endsection
