<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Toastr;

class CategoryController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$categories = Category::latest()->get();
		return view('admin.category', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function saveCategory(Request $request) {
		$request->validate([
			'title' => 'required|min:3|max:50|unique:categories',
		]);

		$category = Category::create([
			'title' => $request->title,
			'slug' => str_replace(' ', '_', strtolower($request->title)),
			'created_at' => Carbon::now(),
		]);
		if ($category) {
			Toastr::success('New category added successfully', 'Success', ["positionClass" => "toast-top-right"]);
		} else {
			Toastr::warning('Something went wrong', 'Warning', ["positionClass" => "toast-top-right"]);
		}
		return redirect()->back();

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($slug) {

		$edit_info = Category::where('slug', $slug)->first();

		return view('admin.edit-category', compact('edit_info'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request) {
		$request->validate([
			'title' => 'required|min:3|max:50|unique:categories',
		]);

		$category = Category::where('id', $request->id)->update([
			'title' => $request->title,
			'slug' => str_replace(' ', '_', strtolower($request->title)),
			'updated_at' => Carbon::now(),
		]);
		if ($category) {
			Toastr::success('Category updated successfully', 'Success', ["positionClass" => "toast-top-right"]);
		} else {
			Toastr::warning('Something went wrong', 'Warning', ["positionClass" => "toast-top-right"]);
		}
		return redirect()->route('category');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($slug) {

		$delete = Category::where('slug', $slug)->delete();
		if ($delete) {
			Toastr::success('Category deleted successfully', 'Success', ["positionClass" => "toast-top-right"]);
		} else {
			Toastr::warning('Something went wrong', 'Warning', ["positionClass" => "toast-top-right"]);
		}
		return redirect()->back();
	}
}
