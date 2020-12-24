<?php

namespace Database\Seeders;

use App\Models\{Plan, User};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->has(Plan::factory()->count(100))
            ->create([
                'name' => 'Cristyan Valera',
                'email' => 'correo@example.com',
            ]);
    }
}
