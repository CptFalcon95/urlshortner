<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Url;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create a default user
        User::create([
            'name' => 'user',
            'email' => 'user@test.com',
            'password' => bcrypt('password')
        ]);

        User::factory(10)
            ->has(Url::factory()->count(5))
            ->create();
    }
}
