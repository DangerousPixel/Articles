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

Route::get('/', function () {
    return view('welcome');
});
//authentication
Auth::routes();
//comments
route::post('/article/{post}' , 'CommentController@store')->name('comment.store');
route::get('/article/{post}/edit', 'CommentController@edit')->name('comment.edit');
route::patch('/article/{post}', 'CommentController@update')->name('comment.update');
route::get('/article/{post}', 'CommentController@show')->name('comment.show');
route::DELETE('/article/{post}', 'PostController@destroy')->name('article.destroy');

//articles
route::post('/article', 'PostController@store')->name('article.store');
route::get('/article/create', 'PostController@create')->name('article.create');
route::get('/article/{post}/edit', 'PostController@edit')->name('article.edit');
route::patch('/article/{post}', 'PostController@update')->name('article.update');
route::get('/article/{post}', 'PostController@show')->name('article.show');
Route::DELETE('/article/{post}', 'PostController@destroy')->name('article.destroy');
//profile
Route::get('/home', 'ProfileController@index')->name('home');
Route::get('/profile/{id}', 'ProfileController@index')->name('profile.show');
Route::get('/profile/{user}/edit', 'ProfileController@edit')->name('profile.edit');
Route::patch('/profile/{user}', 'ProfileController@update')->name('profile.update');

