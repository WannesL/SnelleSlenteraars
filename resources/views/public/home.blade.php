<h1>Wandelingen</h1>

@foreach($hikes as $hike)
    <div>
        <h2>{{ $hike->title }}</h2>
        <p>Datum: {{ $hike->date_of_hike }}</p>
        <p>Afstand: {{ $hike->distance }} km</p>
        <p>Vertrek: {{ $hike->location }}</p>
    </div>
@endforeach
