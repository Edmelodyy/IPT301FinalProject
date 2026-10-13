<?php

namespace Database\Seeders;

use App\Models\Keeper;
use Illuminate\Database\Seeder;

class KeeperSeeder extends Seeder
{
    public function run(): void
    {
        $keepers = [
            ['name' => 'Alex Santos', 'email' => 'alex@example.com', 'phone' => '09171234567', 'role' => 'Senior Keeper'],
            ['name' => 'Maria Reyes', 'email' => 'maria@example.com', 'phone' => '09181234567', 'role' => 'Animal Keeper'],
            ['name' => 'John Cruz', 'email' => 'john@example.com', 'phone' => '09191234567', 'role' => 'Veterinary Assistant'],
            ['name' => 'Ana Garcia', 'email' => 'ana@example.com', 'phone' => '09201234567', 'role' => 'Animal Keeper'],
            ['name' => 'Mark Dela Cruz', 'email' => 'mark@example.com', 'phone' => '09211234567', 'role' => 'Feeding Supervisor'],
        ];

        foreach ($keepers as $keeper) {
            Keeper::firstOrCreate(
                ['email' => $keeper['email']],
                $keeper
            );
        }
    }
}