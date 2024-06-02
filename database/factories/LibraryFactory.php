<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Library;

class LibraryFactory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Library::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'title' => $this->faker->sentence($nbWords = 4, $variableNbWords = true),
			'author' => $this->faker->name(),
			'genre' => $this->faker->word,
			'publication_year' => $this->faker->date('Y-m-d'),
			'publisher' => $this->faker->company,
			'page_count' => $this->faker->numberBetween(100, 1000),
			'synopsis' => $this->faker->paragraph,
		];
	}
}