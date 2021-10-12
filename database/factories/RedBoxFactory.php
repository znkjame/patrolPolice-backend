<?php

namespace Database\Factories;

use App\Models\RedBox;
use Illuminate\Database\Eloquent\Factories\Factory;

class RedBoxFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RedBox::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->streetName(),
            'latitude' => $this->faker->randomFloat(8,13.6,14.2),
            'longitude' => $this->faker->randomFloat(8,100,101)
        ];
    }
}
