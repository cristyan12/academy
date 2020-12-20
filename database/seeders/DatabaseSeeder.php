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
        Plan::factory()->count(10)->create();
    }
}
