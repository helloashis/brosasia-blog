<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SiteController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		return view('app');
	}
	public function activePost() {
		$posts = Post::with('category', 'subcategory', 'user')
			->orderby('id', 'DESC')
			->get();
		return response()->json($posts, 202);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function allPost() {
		$posts = Post::with('category', 'subcategory', 'user')->latest()->get();

		return response()->json($posts, 202);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function getCategory() {
		$categories = Category::latest()->get();

		return response()->json($categories, 202);
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function subCategory() {
		$subcategories = Subcategory::with('category')->get();

		return response()->json($subcategories, 202);
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($slug) {
		$post = Post::with('category', 'subcategory', 'user')->where('slug', $slug)->first();

		return response()->json($post, 202);
	}

	public function categoryWise($slug) {
		$category = Category::where('slug', $slug)->first();

		$posts = Post::with('category', 'subcategory', 'user')
			->orderBy('id', 'DESC')
			->where('cat_id', $category->id)
			->orderBy('id', "DESC")
			->get();

		return response()->json($posts, 200);
	}
	public function subcategoryWise($slug) {
		$subcategory = Subcategory::where('slug', $slug)->first();

		$posts = Post::with('category', 'subcategory', 'user')
			->orderBy('id', 'DESC')
			->where('sub_cat_id', $subcategory->id)
			->orderBy('id', "DESC")
			->get();

		return response()->json($posts, 200);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}
}
