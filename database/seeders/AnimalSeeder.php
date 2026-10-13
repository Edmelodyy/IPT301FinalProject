<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Species;
use App\Models\Enclosure;
use App\Models\Keeper;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        $species = Species::all();
        $enclosures = Enclosure::all();
        $keepers = Keeper::all();

        if (
            $species->isEmpty() ||
            $enclosures->isEmpty() ||
            $keepers->isEmpty()
        ) {
            $this->command->error(
                'Seed Species, Enclosures, and Keepers first.'
            );
            return;
        }

        $animals = [
            ['name' => 'Leo', 'birth_date' => '2021-03-15', 'gender' => 'Male'],
            ['name' => 'Simba', 'birth_date' => '2020-07-10', 'gender' => 'Male'],
            ['name' => 'Nala', 'birth_date' => '2022-01-20', 'gender' => 'Female'],
            ['name' => 'Rajah', 'birth_date' => '2019-05-12', 'gender' => 'Male'],
            ['name' => 'Shere Khan', 'birth_date' => '2021-09-01', 'gender' => 'Male'],
            ['name' => 'Melman', 'birth_date' => '2018-11-11', 'gender' => 'Male'],
            ['name' => 'Dumpling', 'birth_date' => '2022-04-04', 'gender' => 'Female'],
            ['name' => 'Ellie', 'birth_date' => '2020-02-14', 'gender' => 'Female'],
            ['name' => 'Bamboo', 'birth_date' => '2023-06-18', 'gender' => 'Male'],
            ['name' => 'Luna', 'birth_date' => '2021-12-25', 'gender' => 'Female'],
        ];

        foreach ($animals as $index => $animal) {
            Animal::firstOrCreate(
                ['name' => $animal['name']],
                array_merge($animal, [
                    'species_id' => $species[$index % $species->count()]->id,
                    'enclosure_id' => $enclosures[$index % $enclosures->count()]->id,
                    'keeper_id' => $keepers[$index % $keepers->count()]->id,
                ])
            );
        }
    }
}