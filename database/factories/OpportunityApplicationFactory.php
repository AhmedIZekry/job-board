<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Opportunity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OpportunityApplication>
 */
class OpportunityApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'expected_salary' => $this->faker->numberBetween($min = 4000, $max = 250000),
        ];
    }
}
