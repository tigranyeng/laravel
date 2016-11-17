<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/about','HomeController@about');

Route::get('/home', 'IndexController@index');

Route::get('/posts', 'PostController@index');

Route::get('/add_post', 'PostController@add');

Route::post('/create_post', 'PostController@create')->name('postStore');

Route::get('/posts/{id}', 'PostController@show');

Route::get('/my_posts/{id}', 'PostController@my_posts');

Route::get('/edit_form/{id}', 'PostController@edit_form');

Route::post('/edit_post/{id}', 'PostController@edit_post');

Route::delete('/delete/{id}', 'PostController@delete');

Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');