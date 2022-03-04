<?php

namespace Database\Seeders;
use App\Models\Subcategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {

		\App\Models\Subcategory::factory(15)->create();
	}
}
