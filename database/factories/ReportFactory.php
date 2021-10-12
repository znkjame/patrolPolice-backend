<?php

namespace Database\Factories;

use App\Models\Assignment;
use App\Models\RedBox;
use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Report::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'note' => $this->faker->realText(30),
            'assignment_id' => Assignment::factory(),
            'red_box_id' => RedBox::factory()
        ];
    }
}
