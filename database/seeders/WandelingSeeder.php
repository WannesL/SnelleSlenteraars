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
    }
}
