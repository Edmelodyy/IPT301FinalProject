<?php

namespace Database\Seeders;

use App\Models\Animal;
use App\Models\Keeper;
use App\Models\FeedingRecord;
use Illuminate\Database\Seeder;

class FeedingRecordSeeder extends Seeder
{
    public function run(): void
    {
        $animals = Animal::all();
        $keepers = Keeper::all();

        if ($animals->isEmpty() || $keepers->isEmpty()) {
            $this->command->error(
                'Seed Animals and Keepers first.'
            );
            return;
        }

        foreach ($animals as $animal) {
            foreach (range(1, 2) as $number) {
                FeedingRecord::firstOrCreate(
                    [
                        'animal_id' => $animal->id,
                        'food_type' => 'Food ' . $number,
                    ],
                    [
                        'keeper_id' => $keepers[
                            ($animal->id + $number - 1) % $keepers->count()
                        ]->id,
                        'quantity' => 2.5,
                        'fed_at' => now()->subDays($number),
                    ]
                );
            }
        }
    }
}