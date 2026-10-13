<?php

namespace Database\Seeders;

use App\Models\Enclosure;
use Illuminate\Database\Seeder;

class EnclosureSeeder extends Seeder
{
    public function run(): void
    {
        $enclosures = [
            ['name' => 'Savanna Zone', 'location' => 'Zone A', 'capacity' => 10, 'habitat_type' => 'Savanna'],
            ['name' => 'Tiger Forest', 'location' => 'Zone B', 'capacity' => 8, 'habitat_type' => 'Forest'],
            ['name' => 'Elephant Plains', 'location' => 'Zone C', 'capacity' => 12, 'habitat_type' => 'Grassland'],
            ['name' => 'Panda Habitat', 'location' => 'Zone D', 'capacity' => 6, 'habitat_type' => 'Bamboo forest'],
            ['name' => 'Reptile House', 'location' => 'Zone E', 'capacity' => 15, 'habitat_type' => 'Tropical'],
        ];

        foreach ($enclosures as $enclosure) {
            Enclosure::firstOrCreate(
                ['name' => $enclosure['name']],
                $enclosure
            );
        }
    }
}