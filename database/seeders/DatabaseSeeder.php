<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Role::create(['name' => 'student']);
        Role::create(['name' => 'teacher']);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role_id' => 1,
        ]);
    }
}
