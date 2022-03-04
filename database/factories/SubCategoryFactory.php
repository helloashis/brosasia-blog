<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
		$title = $this->faker->jobtitle();
		$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $title)));
		return [
			'cat_id' => rand(1, 10),
			'title' => $title,
			'slug' => str_replace('?', '_', $slug),

		];
	}
}
