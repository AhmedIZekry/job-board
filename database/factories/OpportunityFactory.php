<?php

namespace Database\Factories;

use App\Models\Opportunity;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Opportunity>
 */
class OpportunityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->text(),
            'location' => $this->faker->city(),
            'salary' => $this->faker->numberBetween(5_000, 150_000),
            'experience' => $this->faker->randomElement(Opportunity::$experience),
            'category'=>$this->faker->randomElement(Opportunity::$category),
        ];
    }
}
