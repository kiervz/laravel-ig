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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resource('post', 'PostController');

Route::get('/profile/{username}', 'ProfileController@index')->name('profile.index');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::put('/profile/{user}', 'ProfileController@update')->name('profile.update');

Route::post('comment/{post_id}', 'CommentController@store')->name('comment.store');

Route::post('/follow/{user}', 'FollowController@store')->name('follow.store');