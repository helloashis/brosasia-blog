<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('posts', function (Blueprint $table) {
			$table->id();
			$table->integer('user_id')->nullable();
			$table->integer('cat_id')->nullable();
			$table->integer('sub_cat_id')->nullable();
			$table->string('title');
			$table->string('slug');
			$table->longText('content');
			$table->longText('thumbnail');
			$table->integer('is_active')->default('0');
			$table->timestamps();

			$table->index('user_id')->foreign('user_id')
				->references('id')->on('users')->onDelete('cascade');
			$table->index('cat_id')->foreign('cat_id')
				->references('id')->on('categories')
				->onDelete('cascade');
			$table->index('sub_cat_id')->foreign('sub_cat_id')
				->references('id')->on('subcategories')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('posts');
	}
}
