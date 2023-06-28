<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_prefix' => 'bk',
            'author' => $this->faker->lastName() . ', ' . $this->faker->firstName(),
            'title' => $this->faker->sentence(6),
            'genre_id' => Genre::get()->random()->id,
            'price' => random_int(1, 20000),
            'publish_date' => $this->faker->date(),
            'description' => $this->faker->text(),
        ];
    }
}
