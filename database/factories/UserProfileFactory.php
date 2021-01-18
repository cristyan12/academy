<?php

namespace Database\Factories;

use App\Models\{Plan, User, UserProfile};
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    protected $model = UserProfile::class;

    public function definition()
    {
        return [
            'phone' => $this->faker->phoneNumber(),
            'born_at' => $this->faker->dateTimeBetween('-65 years'),
            'country' => $this->faker->unique()->country(),
            'plan_id' => rand(1, 4),
        ];
    }
}
