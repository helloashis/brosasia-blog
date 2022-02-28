<?php

namespace Database\Seeders;

use App\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$faker = Faker\Factory::create();
		foreach (range(1, 50) as $index) {

			$name = $faker->company;
			$slug = lcfirst($name);
			Post::create([
				'user_id' => 1,
				'cate_id' => rand(1, 20),
				'sub_cat_id' => rand(1, 20),
				'title' => $name,
				'slug' => str_replace(' ', '-', $slug),
				'content' => $faker->paragraph,
				'thumbnail' => $faker->imageUrl(),
			]);

		}
	}
}
