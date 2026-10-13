<?php

namespace Database\Seeders;

use App\Models\Species;
use Illuminate\Database\Seeder;

class SpeciesSeeder extends Seeder
{
    public function run(): void
    {
        Species::firstOrCreate(
            ['scientific_name' => 'Panthera leo'],
            ['name' => 'Lion', 'habitat' => 'Savanna', 'diet_type' => 'Carnivore']
        );

        Species::firstOrCreate(
            ['scientific_name' => 'Panthera tigris'],
            ['name' => 'Tiger', 'habitat' => 'Forest', 'diet_type' => 'Carnivore']
        );

        Species::firstOrCreate(
            ['scientific_name' => 'Giraffa camelopardalis'],
            ['name' => 'Giraffe', 'habitat' => 'Savanna', 'diet_type' => 'Herbivore']
        );

        Species::firstOrCreate(
            ['scientific_name' => 'Elephas maximus'],
            ['name' => 'Elephant', 'habitat' => 'Grassland', 'diet_type' => 'Herbivore']
        );

        Species::firstOrCreate(
            ['scientific_name' => 'Ailuropoda melanoleuca'],
            ['name' => 'Giant Panda', 'habitat' => 'Bamboo forest', 'diet_type' => 'Herbivore']
        );
    }
}