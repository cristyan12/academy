<?php

namespace Database\Factories;

use App\Models\{Plan, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Plan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'type' => $this->faker->randomElement(['niños', 'adolescentes', 'adultos', 'avanzado']),
            'description' => $this->faker->paragraph,
            'user_id' => User::factory(),
        ];
    }
}
