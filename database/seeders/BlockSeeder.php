<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Block;
use App\Models\Properties;

class BlockSeeder extends Seeder
{
    public function run(): void
    {
        $properties = Properties::all();

        // If no properties exist yet, create some defaults
        if ($properties->count() === 0) {
            $this->call(PropertiesSeeder::class);
            $properties = Properties::all();
        }

        foreach ($properties as $property) {
            // Create a few blocks for each property
            for ($i = 1; $i <= 10; $i++) {
                Block::create([
                    'property_id' => $property->id,
                    'block_number' => 'Block ' . $i . ' - ' . $property->name,
                ]);
            }
        }
    }
}
