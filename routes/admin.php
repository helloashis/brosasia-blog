<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {

	Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

	/**********Category Routes*********/

	Route::get('/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category');
	Route::post('/category', [App\Http\Controllers\CategoryController::class, 'saveCategory'])->name('save.category');
	Route::get('/category/delete/{slug}', [App\Http\Controllers\CategoryController::class, 'destroy'])->name('delete.category');
	Route::get('/category/edit/{slug}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('edit.category');
	Route::post('/category/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('update.category');

	/**********Sub Category Routes*********/

	Route::get('/subcategory', [App\Http\Controllers\SubCategoryController::class, 'index'])->name('subcategory');
	Route::post('/subcategory', [App\Http\Controllers\SubCategoryController::class, 'saveSubCategory'])->name('save.subcategory');
	Route::get('/subcategory/delete/{slug}', [App\Http\Controllers\SubCategoryController::class, 'destroy'])->name('delete.subcategory');
	Route::get('/subcategory/edit/{slug}', [App\Http\Controllers\SubCategoryController::class, 'edit'])->name('edit.subcategory');
	Route::post('/subcategory/update', [App\Http\Controllers\SubCategoryController::class, 'update'])->name('update.subcategory');

	/**********Posts Routes*********/

	Route::get('/posts/manage', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
	Route::get('/posts/new', [App\Http\Controllers\PostController::class, 'create'])->name('new.post');
	Route::post('/post/new', [App\Http\Controllers\PostController::class, 'store'])->name('save.post');
	Route::get('/post/delete/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('delete.post');

	Route::get('/post/edit/{slug}', [App\Http\Controllers\PostController::class, 'edit'])->name('edit.post');
	Route::post('/post/update', [App\Http\Controllers\PostController::class, 'update'])->name('update.post');

	Route::get('/searchYourCategory/{getStId}', [App\Http\Controllers\PostController::class, 'get_subcategory']);

});