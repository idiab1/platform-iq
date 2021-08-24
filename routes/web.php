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

// Route of Profiles
Route::resource('profile', 'ProfileController')->only([
    'index', 'update'
])->parameters([
    'profile' => 'id'
])->names([
    'index'     => 'profile.index',
    'update'    => 'profile.update',
]);
Route::get('profile/setting', 'ProfileController@setting')->name('profile.setting');
Route::get('dashboard', 'ProfileController@dashboard')->name('user.dashboard');

// Route of Posts
Route::resource('posts', 'PostController')->except([
    'index'
])->parameters([
    'posts' => 'id'
])->names([
    'create'    => 'user.post.create',
    'store'     => 'user.post.store',
    'show'      => 'user.post.show',
    'edit'      => 'user.post.edit',
    'update'    => 'user.post.update',
    'destroy'   => 'user.post.archive',
]);
Route::get('/posts_trashed', 'PostController@trashed')->name('user.posts.trashed');
Route::delete('/posts/hdelete/{id}', 'PostController@hdelete')->name('user.posts.hdelete');
Route::get('/posts/restore/{id}', 'PostController@restore')->name('user.posts.restore');

// Tags Route
Route::get('/tags', 'TagController@index')->name('user.tags.home');
