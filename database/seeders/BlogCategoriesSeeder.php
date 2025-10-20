<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogCategories = [
            ['category_name' => 'Materials'],
            ['category_name' => 'Architect'],
            ['category_name' => 'Design'],
        ];

        BlogCategory::insert($blogCategories);
    }
}
