@extends('public.layout')

@section('title', $wandeling->title . ' - Snelle Slenteraars')

@section('content')
    <div class="max-w-3xl mx-auto p-6">

        <a href="{{ route('home') }}" class="text-green-700 hover:underline">
            ← Terug naar alle wandelingen
        </a>

        <img src="https://placehold.co/800x300?text={{ urlencode($wandeling->location) }}" alt="{{ $wandeling->title }}"
            class="w-full h-64 object-cover rounded-2xl mt-4">

        <h1 class="font-display text-3xl font-semibold mb-6">{{ $wandeling->title }}</h1>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-sm text-gray-500">Datum</p>
                <p class="font-semibold">{{ $wandeling->date_of_hike->translatedFormat('l j F Y') }}</p>
                <p class="text-sm text-gray-600">Start om {{ $wandeling->date_of_hike->format('H:i') }}</p>
            </div>

            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-sm text-gray-500">Afstand</p>
                <p class="font-semibold">{{ $wandeling->distance }} km</p>
            </div>

            <div class="bg-white rounded-xl shadow p-4">
                <p class="text-sm text-gray-500">Locatie</p>
                <p class="font-semibold">{{ $wandeling->location }}</p>
                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($wandeling->location) }}"
                    target="_blank" class="text-sm text-green-700 hover:underline">
                    Bekijk op kaart
                </a>
            </div>
        </div>

        <h2 class="font-display text-3xl font-semibold mb-6">Over deze wandeling</h2>
        <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ $wandeling->description }}</p>

    </div>
@endsection
