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

Route::get('/posts', 'App\Http\Controllers\SiteController@allPost')->name('all.posts');
Route::get('/post/details/{slug}', 'App\Http\Controllers\SiteController@show')->name('details.posts');

Route::get('/{anypath}', 'App\Http\Controllers\SiteController@index')->where('path', '.*');
Auth::routes();

Route::prefix('admin')->group(base_path('routes/admin.php'));
