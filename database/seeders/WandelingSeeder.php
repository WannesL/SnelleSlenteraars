<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wandeling;

class WandelingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $wandelingen = [
            ['Rondje Minnewater', 'Rustige wandeling langs het Minnewater en de vesten van Brugge.', 8, 'Brugge', -10],
            ['Bossen van Beernem', 'Door het Bulskampveld, met koffiestop halverwege.', 12, 'Beernem', 5],
            ['Damse Vaart', 'Langs de vaart van Brugge naar Damme en terug.', 14.5, 'Damme', 12],
            ['Tillegembos', 'Gezinsvriendelijke lus door het Tillegembos.', 6, 'Sint-Michiels', 19],
            ['Polders van Lissewege', 'Weidse polderwandeling met zicht op het witte dorp.', 16, 'Lissewege', 26],
            ['Kustwandeling Wenduine', 'Over de duinen en terug over het strand.', 10, 'Wenduine', 33],
        ];

        foreach ($wandelingen as [$title, $description, $distance, $location, $days]) {
            Wandeling::create([
                'title' => $title,
                'description' => $description,
                'distance' => $distance,
                'location' => $location,
                'date_of_hike' => now()->addDays($days)->setTime(9, 30),
            ]);
        }

        Wandeling::create([
            'title' => 'Door de Makegemse bossen',
            'description' => 'De Snelle Slenteraars trekken deze keer naar de Makegemse bossen. Een mooie herfstwandeling door een prachtig en rustig bos ten zuiden van Gent. We beginnen in het dorpje Bottelare en trekken van de velden de bossen in. We volgen af en toe een plankenpad overheen de modder. We passeren een klein gehuchtje waar de tijd wat is blijven stilstaan. Terwijl de herfstzon (hopelijk) stilletjes daalt lussen we terug naar Bottelare.',
            'distance' => 12,
            'location' => 'De kerk van Bottelare',
            'meeting_info' => 'Daar kan je gemakkelijk parkeren en daar start én eindigt de wandeling.',
            'date_of_hike' => '2026-10-25 13:30:00',
            'end_of_hike' => '2026-10-25 17:00:00',
            'practical_info' => "Voorzie een snack en voldoende water.\nDoe goeie schoenen aan, de grond kan nat en slipperig zijn.\nEventueel kunnen we nog iets drinken onderweg, we passeren een cafeetje. We zien wel ter plaatse.",
            'image' => 'makegemse-bossen.jpg',
            'map_image' => 'makegemse-bossen-kaart.png',
        ]);
    }
}
