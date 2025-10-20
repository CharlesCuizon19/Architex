<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // check if already exists
            [
                'name' => 'Administrator',
                'email' => 'hello@rweb.solutions',
                'password' => Hash::make('*'), // default password
                'is_admin' => true,
            ]
        );
    }
}
