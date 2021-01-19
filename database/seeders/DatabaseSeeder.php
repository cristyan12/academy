<?php

namespace Database\Seeders;

use App\Models\{Plan, User, UserProfile};
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
        $this->call(PlanSeeder::class);

        $user = User::factory()->create([
            'name' => 'Cristyan Valera',
            'email' => 'correo@example.com',
        ]);

        $user->profile()->save(UserProfile::factory()->make([
            'phone' => '+58 (412) 052 9549',
            'born_at' => '1981-12-21',
            'country' => 'Venezuela',
            'plan_id' => Plan::where('type', 'adultos')->first()->id,
        ]));

        User::factory()->times(20)->create()->each(
            fn (User $user) => $user->profile()->save(UserProfile::factory()->make())
        );

    }
}
