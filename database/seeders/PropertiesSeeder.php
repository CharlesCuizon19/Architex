<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Properties;

class PropertiesSeeder extends Seeder
{
    public function run(): void
    {
        $properties = [
            [
                'name' => 'Apo Yama Residences',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...',
                'property_thumbnail' => null,
            ],
        ];

        foreach ($properties as $property) {
            Properties::create($property);
        }
    }
}
