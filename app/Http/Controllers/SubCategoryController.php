<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Toastr;

class SubCategoryController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$categories = Category::latest()->get();
		$subcategories = Subcategory::latest()->get();
		return view('admin.subcategory', compact('categories', 'subcategories'));
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
	public function saveSubCategory(Request $request) {

		$request->validate([
			'category' => 'required',
			'title' => 'required|min:1|max:20|unique:subcategories',
		]);

		$subcategory = Subcategory::create([
			'cat_id' => $request->category,
			'title' => $request->title,
			'slug' => str_replace(' ', '_', strtolower($request->title)),
			'created_at' => Carbon::now(),
		]);

		if ($subcategory) {
			Toastr::success('New Subcategory added successfully', 'Success', ["positionClass" => "toast-top-right"]);
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

		$edit_info = Subcategory::with('Category')->where('slug', $slug)->first();
		$categories = Category::latest()->get();
		return view('admin.edit-subcategory', compact('edit_info', 'categories'));
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
			'category' => 'required',
			'title' => 'required|min:1|max:20|unique:subcategories',
		]);

		$subcategory = Subcategory::where('id', $request->id)->update([
			'cat_id' => $request->category,
			'title' => $request->title,
			'slug' => str_replace(' ', '_', strtolower($request->title)),
			'updated_at' => Carbon::now(),
		]);
		if ($subcategory) {
			Toastr::success('SubCategory updated successfully', 'Success', ["positionClass" => "toast-top-right"]);
		} else {
			Toastr::warning('Something went wrong', 'Warning', ["positionClass" => "toast-top-right"]);
		}
		return redirect()->route('subcategory');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($slug) {

		$delete = Subcategory::where('slug', $slug)->delete();
		if ($delete) {
			Toastr::success('SubCategory deleted successfully', 'Success', ["positionClass" => "toast-top-right"]);
		} else {
			Toastr::warning('Something went wrong', 'Warning', ["positionClass" => "toast-top-right"]);
		}
		return redirect()->back();
	}
}
