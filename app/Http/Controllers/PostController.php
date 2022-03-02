<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use App\Models\Subcategory;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Toastr;

class PostController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$posts = Post::latest()->paginate(9);

		return view('admin.posts', compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$categories = Category::latest()->get();
		return view('admin.new-post', compact('categories'));
	}
	public function get_subcategory($getStId) {
		$subcategory = Subcategory::where('cat_id', $getStId)->get();
		return json_encode($subcategory);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {

		$request->validate([
			'category' => 'required',
			'subcategory' => 'required',
			'title' => 'required|min:5|max:50',
			'content' => 'required|min:10',
			'image' => 'required',
		]);
		$img = $request->file('image');
		$fileName_gen1 = 'thumbnail_' . hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
		$img = Image::make($img)->resize(314, 150)->save('uploads/blog_posts/' . $fileName_gen1);
		$image_file = 'uploads/blog_posts/' . $fileName_gen1;

		$post = Post::create([
			'user_id' => Auth::user()->id,
			'cat_id' => $request->category,
			'sub_cat_id' => $request->subcategory,
			'title' => $request->title,
			'slug' => str_replace(' ', '_', strtolower($request->title)),
			'content' => $request->content,
			'thumbnail' => $image_file,
			'is_active' => $request->status,
			'created_at' => Carbon::now(),
		]);
		if ($post) {
			Toastr::success('New post added successfully', 'Success', ["positionClass" => "toast-top-right"]);
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
		$categories = Category::latest()->get();
		$edit_info = Post::where('slug', $slug)->first();
		return view('admin.edit-post', compact('edit_info', 'categories'));
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
			'subcategory' => 'required',
			'title' => 'required|min:5|max:50',
			'content' => 'required|min:10',
		]);

		$img = $request->file('image');

		if (empty($img)) {
			$image_file = $request->old_img;
		} else {
			$request->validate(['image']);

			//$fileName_gen1 = 'thumbnail_' . hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
			$img = Image::make($img)->resize(314, 150)->save($request->old_img);
			$image_file = $request->old_img;

		}

		$post = Post::where('id', $request->id)->update([

			'cat_id' => $request->category,
			'sub_cat_id' => $request->subcategory,
			'title' => $request->title,
			'slug' => str_replace(' ', '_', strtolower($request->title)),
			'content' => $request->content,
			'thumbnail' => $image_file,
			'is_active' => $request->status,
			'updated_at' => Carbon::now(),
		]);

		if ($post) {
			Toastr::success('Post updated successfully', 'Success', ["positionClass" => "toast-top-right"]);
		} else {
			Toastr::warning('Something went wrong', 'Warning', ["positionClass" => "toast-top-right"]);
		}
		return redirect()->route('posts');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {

		$photo = Post::where('id', $id)->first();
		unlink($photo->thumbnail);
		$photo->delete();

		if ($photo) {
			Toastr::success('post deleted successfully', 'Success', ["positionClass" => "toast-top-right"]);
		} else {
			Toastr::warning('Something went wrong', 'Warning', ["positionClass" => "toast-top-right"]);
		}
		return redirect()->back();
	}
}
