<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return tap(User::first(), fn($user) => $user->plans()->createMany([
            ['title' => 'Plan estudio niños', 'type' => 'niños', 'description' => 'Plan estudio para niños'],
            ['title' => 'Plan estudio adolescentes', 'type' => 'adolescentes', 'description' => 'Plan estudio para adolescentes'],
            ['title' => 'Plan estudio adultos', 'type' => 'adultos', 'description' => 'Plan estudio para adultos'],
            ['title' => 'Plan estudio avanzado', 'type' => 'avanzado', 'description' => 'Plan estudio para avanzado'],
        ]));
    }
}
