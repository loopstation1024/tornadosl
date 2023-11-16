<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chapter>
 */
class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'book_id' => Book::factory(),
            'number_chapter' => $this->faker->numberBetween(0, 100),
            'title' => $this->faker->sentence(5),
            'resumen' => $this->faker->text(),
        ];
    }
}
