<?php

namespace Database\Factories;

use App\Models\Plan;
use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'plan_id' => Plan::factory(),
            'date_of_birth' => $this->faker->date,
            'phone' => $this->faker->phoneNumber,
            'last_access' => $this->faker->date,
            'country' => $this->faker->country,
        ];
    }
}
