@props(['title'])

<section class="py-6">
    <h2 class="font-display text-xl text-mos-600 mb-2">{{ $title }}</h2>
    <div class="leading-relaxed">
        {{ $slot }}
    </div>
</section>
