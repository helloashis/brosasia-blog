<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', 'App\Http\Controllers\SiteController@index')->name('index');

Route::get('/posts', 'App\Http\Controllers\SiteController@allPost');
Route::get('/post/details/{slug}', 'App\Http\Controllers\SiteController@show');
Route::get('/get-active-posts', 'App\Http\Controllers\SiteController@activePost');
Route::get('/category-wise-post/{slug}', 'App\Http\Controllers\SiteController@categoryWise');
Route::get('/subcategory-wise/{slug}', 'App\Http\Controllers\SiteController@subcategoryWise');

Route::get('/get-category', 'App\Http\Controllers\SiteController@getCategory');
Route::get('/sub-category', 'App\Http\Controllers\SiteController@subCategory');

Route::get('/{anypath}', 'App\Http\Controllers\SiteController@index')->where('path', '.*');
Auth::routes();
Route::prefix('admin')->group(base_path('routes/admin.php'));
