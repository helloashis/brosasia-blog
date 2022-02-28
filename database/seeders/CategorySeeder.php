<?php

namespace Database\Seeders;

use App\Category;
use App\Subcategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$faker = Faker\Factory::create();
		foreach (range(1, 20) as $index) {

			$name = $faker->company;
			$slug = lcfirst($name);
			Category::create([
				'title' => $name,
				'slug' => str_replace(' ', '-', $slug),
			]);

		}

		foreach (range(1, 20) as $index) {

			$name = $faker->company;
			$slug = lcfirst($name);
			Subcategory::create([
				'cat_id' => rand(1, 20),
				'title' => $name,
				'slug' => str_replace(' ', '-', $slug),
			]);

		}
	}
}
