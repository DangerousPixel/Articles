<?php

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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


//authentication
Auth::routes();

//home page
Route::get('/', 'PostController@index' )->name('home.timeline');

//articles
route::post('/article', 'PostController@store')->name('article.store');
route::get('/article/create', 'PostController@create')->name('article.create');
route::get('/article/{post}/edit', 'PostController@edit')->name('article.edit');
route::patch('/article/{post}', 'PostController@update')->name('article.update');
route::get('/article/{post}', 'PostController@show')->name('article.show');
route::delete('/article/{post}', 'PostController@destroy')->name('article.destroy');

//tags
Route::get('/tags/{tag}', 'TagController@index')->name('tags.show');


//comments
route::post('/article/{post}/comment' , 'CommentController@store')->name('comment.store');
route::get('/article/comments/{id}/edit', 'CommentController@edit')->name('comment.edit');
route::patch('/article/comments/{id}', 'CommentController@update')->name('comment.update');
route::delete('/article/comments/{id}' , 'CommentController@destroy')->name('comment.destroy');


//profile
//Route::get('/home', 'ProfileController@index')->name('home');
Route::get('/profile/{id}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

