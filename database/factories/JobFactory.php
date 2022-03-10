<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $randomIndex = random_int(0, 1);
        $jobs = ['Designer', 'Web Developer'];
        return [
            'name' => $jobs[$randomIndex],
        ];
    }
}
