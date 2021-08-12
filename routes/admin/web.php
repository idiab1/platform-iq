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

// Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function () {

    // Route of home
    Route::get('/home', 'HomeAdminController@adminHome')->name('admin.home');

    // Route for users
    Route::resource('users', 'UserController')->except([
        'show'
    ])->parameters([
        'users' => 'id'
    ])->names([
        'index'     => 'users.index',
        'create'    => 'user.create',
        'store'     => 'user.store',
        'edit'      => 'user.edit',
        'update'    => 'user.update',
        'destroy'   => 'user.destroy',
    ]);

    // -> Route for setting
    Route::resource('setting', "SettingController")->only([
        'edit', 'update',
    ])->parameters([
        'setting' => 'id'
    ])->names([
        'edit'      => 'setting.edit',
        'update'    => 'setting.update',
    ]);

    // Route of categories
    // Route::resource('categories', 'CategoryController')->except([
    //     'show'
    // ])->parameters([
    //     'categories' => 'id'
    // ])->names([
    //     'index'     => 'categories.index',
    //     'create'    => 'category.create',
    //     'store'     => 'category.store',
    //     'edit'      => 'category.edit',
    //     'update'    => 'category.update',
    //     'destroy'   => 'category.destroy',
    // ]);

    // // Route of posts
    // Route::resource('posts', 'PostController')->parameters([
    //     'posts' => 'id'
    // ])->names([
    //     'index'     => 'posts.index',
    //     'create'    => 'post.create',
    //     'store'     => 'post.store',
    //     'show'      => 'post.show',
    //     'edit'      => 'post.edit',
    //     'update'    => 'post.update',
    //     'destroy'   => 'post.archive',
    // ]);
    // // Route of posts trashed
    // Route::get('/posts_trashed', "PostController@trashed")->name('posts.trashed');
    // // Route of posts hard delete
    // Route::delete('posts/hdeleted/{id}', "PostController@hdelete")->name('post.hdelete');
    // // Route of posts restore
    // Route::get('posts/restore/{id}', "PostController@restore")->name('post.restore');

    // // Route of tags
    // Route::resource('tags', 'TagController')->except([
    //     'show'
    // ])->parameters([
    //     'tags' => 'id'
    // ])->names([
    //     'tags'      => 'tags.index',
    //     'create'    => 'tag.create',
    //     'store'     => 'tag.store',
    //     'edit'      => 'tag.edit',
    //     'update'    => 'tag.update',
    //     'destroy'   => 'tag.destroy',
    // ]);
});
