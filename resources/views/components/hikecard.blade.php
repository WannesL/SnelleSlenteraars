@props(['wandeling'])

<div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition">

    <img
        src="https://via.placeholder.com/400x200"
        alt="{{ $wandeling->title }}"
        class="w-full h-40 object-cover"
    >

    <div class="p-4">
        <h2 class="text-xl font-semibold mb-2">
            {{ $wandeling->title }}
        </h2>

        <p class="text-gray-600 text-sm mb-1">
            📅 {{ \Carbon\Carbon::parse($wandeling->date_of_hike)->format('d/m/Y') }}
        </p>

        <p class="text-gray-600 text-sm mb-1">
            📍 {{ $wandeling->location}}
        </p>

        <p class="text-gray-600 text-sm mb-3">
            🚶 {{ $wandeling->distance}} km
        </p>

        <a href="#" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition">
            Bekijk wandeling
        </a>
    </div>

</div>
