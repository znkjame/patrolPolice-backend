<?php

namespace Database\Factories;

use App\Models\Police;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PoliceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Police::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $police_rank = Police::$police_rank;
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'rank' => $this->faker->randomElement($police_rank),
            'phone' => $this->faker->phoneNumber(),
            'user_id' => User::factory(),
        ];
    }
}
