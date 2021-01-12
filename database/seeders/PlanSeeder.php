<?php

namespace Database\Seeders;

use App\Models\Plan;
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
        Plan::create(['title' => 'Plan estudio niños', 'type' => 'niños', 'description' => 'Plan estudio para niños']);
        Plan::create(['title' => 'Plan estudio adolescentes', 'type' => 'adolescentes', 'description' => 'Plan estudio para adolescentes']);
        Plan::create(['title' => 'Plan estudio adultos', 'type' => 'adultos', 'description' => 'Plan estudio para adultos']);
        Plan::create(['title' => 'Plan estudio avanzado', 'type' => 'avanzado', 'description' => 'Plan estudio para avanzado']);
    }
}
