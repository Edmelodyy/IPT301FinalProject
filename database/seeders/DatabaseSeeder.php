<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SpeciesSeeder::class,
            EnclosureSeeder::class,
            KeeperSeeder::class,
            AnimalSeeder::class,
            FeedingRecordSeeder::class,
        ]);
    }
}