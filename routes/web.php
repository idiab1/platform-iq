<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

// Route of home
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {

    // Route of categories
    Route::resource('categories', 'CategoryController')->except([
        'show'
    ])->parameters([
        'categories' => 'id'
    ])->names([
        'index'     => 'categories.index',
        'create'    => 'category.create',
        'store'     => 'category.store',
        'edit'      => 'category.edit',
        'update'    => 'category.update',
        'destroy'   => 'category.destroy',
    ]);

    // Route of posts
    Route::resource('posts', 'PostController')->parameters([
        'posts' => 'id'
    ])->names([
        'index'     => 'posts.index',
        'create'    => 'post.create',
        'store'     => 'post.store',
        'show'      => 'post.show',
        'edit'      => 'post.edit',
        'update'    => 'post.update',
        'destroy'   => 'post.archive',
    ]);
    // Route of posts trashed
    Route::get('/posts_trashed', "PostController@trashed")->name('posts.trashed');
    // Route of posts hard delete
    Route::delete('posts/hdeleted/{id}', "PostController@hdelete")->name('post.hdelete');
    // Route of posts restore
    Route::get('posts/restore/{id}', "PostController@restore")->name('post.restore');
});
