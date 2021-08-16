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
    'index', 'edit', 'update'
])->parameters([
    'profile' => 'id'
])->names([
    'index'     => 'profile.index',
    'edit'      => 'profile.edit',
    'update'    => 'profile.update',
]);
