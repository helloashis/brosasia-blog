<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
		$title = $this->faker->company();
		$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $title)));
		return [

			'title' => $title,
			'slug' => str_replace('?', '_', $slug),

		];
	}
}
