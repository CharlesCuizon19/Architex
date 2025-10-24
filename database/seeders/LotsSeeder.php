<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lots;
use App\Models\Block;
use App\Models\LotsCategory;
use App\Models\LotsType;

class LotsSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Get related data IDs
        $blocks = Block::pluck('id')->toArray();
        $categories = LotsCategory::pluck('id')->toArray();
        $types = LotsType::pluck('id')->toArray();

        // ✅ Safety check
        if (empty($blocks) || empty($categories) || empty($types)) {
            $this->command->error('⚠️ Please seed Blocks, Categories, and Types before running LotsSeeder.');
            return;
        }

        // ✅ Create 160 lots
        foreach (range(1, 147) as $i) {
            Lots::create([
                'block_id'    => $blocks[array_rand($blocks)],
                'category_id' => $categories[array_rand($categories)],
                'type_id'     => $types[array_rand($types)],
                'lot_name'    => 'Lot ' . $i,
                'area'        => rand(80, 300),
                'price'       => rand(500000, 2000000),
                'status'      => ['available', 'sold', 'reserved'][array_rand(['available', 'sold', 'reserved'])],
                'description' => 'This is a sample description for Lot ' . $i,
            ]);
        }

        $this->command->info('✅ 160 lots seeded successfully (no x, y).');
    }
}
