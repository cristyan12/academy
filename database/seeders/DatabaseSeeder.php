<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserProfile;
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

        User::factory()->times(100)->create()->each(
            fn (User $user) => $user->profile()->save(UserProfile::factory()->make())
        );

        $this->call(PlanSeeder::class);
    }
}
