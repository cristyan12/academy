<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = User::factory()->create([
            'name' => 'Cristyan Valera',
            'email' => 'correo@example.com',
        ]);

        $this->call(PlanSeeder::class);
    }
}
