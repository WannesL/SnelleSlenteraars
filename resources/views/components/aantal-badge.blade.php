@props(['aantal'])

<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-1 bg-zon-100 text-zon-600 font-semibold text-sm px-3 py-1 rounded-full']) }}>

    @if ($aantal === 0)
        Nog niemand ingeschreven
    @else
        {{ $aantal }} {{ $aantal === 1 ? 'wandelaar' : 'wandelaars' }} ingeschreven
    @endif
</span>
