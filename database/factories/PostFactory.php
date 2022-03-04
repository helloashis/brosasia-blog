<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory {
	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */

	public function definition() {

		$title = $this->faker->realText(30);
		$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $title)));
		return [
			'user_id' => 1,
			'cat_id' => rand(1, 10),
			'sub_cat_id' => rand(1, 15),
			'title' => $title,
			'slug' => str_replace('?', '_', $slug),
			'content' => $this->faker->paragraph(300),
			'thumbnail' => $this->faker->imageUrl($width = 640, $height = 480),

		];
	}
}
