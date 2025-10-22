<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LotsType;

class LotsTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = ['Bungalow', 'Townhouse', 'Single Detached', 'Duplex'];

        foreach ($types as $type) {
            LotsType::create([
                'type_name' => $type,
            ]);
        }

        $this->command->info('✅ Lot types seeded successfully.');
    }
}
