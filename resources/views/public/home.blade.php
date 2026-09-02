<div class="max-w-6xl mx-auto p-6">
    <h1 class="text-3xl font-bold mb-6">Onze wandelingen</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

        @forelse($hikes as $wandeling)
        <x-hikecard :wandeling="$wandeling" />
        @empty
        <p>Er zijn nog geen wandelingen beschikbaar.</p>
        @endforelse

    </div>
</div>
