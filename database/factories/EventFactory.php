<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                           'event_title' => fake()->name(),
                           'event_start_date' => now(),
                           'event_end_date' => now(),
                           'organization_id' => 11,
       ];
    }
}
