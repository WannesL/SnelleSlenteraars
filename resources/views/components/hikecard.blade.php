@props(['wandeling'])

<a href="{{ route('wandeling', $wandeling) }}"
   class="group flex flex-col bg-white rounded-3xl shadow-md overflow-hidden transition hover:shadow-xl hover:-translate-y-1">

    {{-- Foto --}}
    <div class="overflow-hidden">
        <img src="{{ $wandeling->imageUrl() }}" alt="{{ $wandeling->title }}"
             class="w-full h-56 object-cover transition duration-500 group-hover:scale-105">
    </div>

    <div class="flex flex-col flex-1 p-6">

        {{-- Titel --}}
        <h3 class="font-display text-2xl font-semibold pb-3 mb-4 border-mos-100">
            {{ $wandeling->title }}
        </h3>

        {{-- Gegevens --}}
        <dl class="text-sm border-t border-mos-100 divide-y divide-mos-100">
            <div class="flex justify-between gap-4 py-2">
                <dt class="text-mos-600">Wanneer?</dt>
                <dd class="font-bold text-right">{{ ucfirst($wandeling->date_of_hike->translatedFormat('l j F Y')) }}</dd>
            </div>
            <div class="flex justify-between gap-4 py-2">
                <dt class="text-mos-600">Vertrek</dt>
                <dd class="font-bold">{{ $wandeling->date_of_hike->format('G\ui') }}</dd>
            </div>
            <div class="flex justify-between gap-4 py-2">
                <dt class="text-mos-600">Afstand</dt>
                <dd class="font-bold">{{ number_format($wandeling->distance, 1, ',', '.') }} km</dd>
            </div>
            <div class="flex justify-between gap-4 py-2">
                <dt class="text-mos-600">Afspraakplaats</dt>
                <dd class="font-bold text-right">{{ $wandeling->location }}</dd>
            </div>
        </dl>

        {{-- Onderaan: teller + link --}}
        <div class="mt-auto pt-5 flex items-center justify-between gap-2">
            <x-aantal-badge :aantal="(int) $wandeling->inschrijvingen_sum_people" />

        </div>

    </div>
</a>
