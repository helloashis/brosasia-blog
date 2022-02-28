<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model {
	use HasFactory;
	protected $fillable = [
		'cat_id',
		'title',
		'slug',
	];

	public function Category() {
		return $this->belongsTo(Category::class, 'cat_id');
	}

}
