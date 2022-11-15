<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name(),
            'isbn' => $this->faker->numberBetween(10, 50),
            'publication_year' => $this->faker->year(),
            'book_status_id' => $this->faker->randomNumber(1, 5)
        ];
    }
}
