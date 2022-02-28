<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model {
	use HasFactory;
	protected $fillable = [
		'user_id',
		'cat_id',
		'sub_cat_id',
		'title',
		'title',
		'slug',
		'content',
		'thumbnail',
		'is_active',
	];

	public function User() {
		return $this->belongsTo(User::class, 'user_id');
	}
	public function Category() {
		return $this->belongsTo(Category::class, 'cat_id');
	}
	public function SubCategory() {
		return $this->belongsTo(Subcategory::class, 'sub_cat_id');
	}

}
