<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::factory()->create([
             'name' => 'User 1',
             'email' => 'user1@example.com',
         ]);

        \App\Models\User::factory()->create([
            'name' => 'User 2',
            'email' => 'user2@example.com',
        ]);
    }
}
