<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LotsCategory;

class LotsCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Residential', 'Commercial', 'Premium', 'Corner'];

        foreach ($categories as $category) {
            LotsCategory::create([
                'category_name' => $category,
            ]);
        }

        $this->command->info('✅ Lot categories seeded successfully.');
    }
}
