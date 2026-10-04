@props(['wandeling'])

<div
    class="bg-white rounded-3xl shadow-md overflow-hidden transition hover:shadow-xl hover:-rotate-1 hover:-translate-y-1">
    <img src="https://placehold.co/400x200?text={{ urlencode($wandeling->location) }}" alt="{{ $wandeling->title }}"
        class="w-full h-40 object-cover">

    <div class="p-4">
        <h2 class="text-xl font-semibold mb-2">
            {{ $wandeling->title }}
        </h2>

        <p class="text-gray-600 text-sm mb-1">
            📅 {{ $wandeling->date_of_hike->format('d/m/Y') }}
        </p>

        <p class="text-gray-600 text-sm mb-1">
            📍 {{ $wandeling->location }}
        </p>

        <p class="text-gray-600 text-sm mb-3">
            🚶 {{ $wandeling->distance }} km
        </p>

        <a href="{{ route('wandeling', $wandeling) }}"
            class="inline-block bg-zon-500 text-white font-semibold px-5 py-2 rounded-full hover:bg-zon-600 transition">
            Bekijk wandeling →
        </a>
    </div>

</div>
