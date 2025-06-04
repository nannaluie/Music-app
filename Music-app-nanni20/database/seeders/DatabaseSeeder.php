<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create and save 10 users to the database
        \App\Models\User::factory()->count(10)->create();
    }
}
