<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// global patterns
Route::pattern('id', '[0-9]+');


//
// HOME
//
Route::get('/', array('as' => 'home', 'uses' => 'PostController@index'));
Route::get('/archive', array('as' => 'archive', 'uses' => 'HomeController@archive'));
Route::get('/search', array('as' => 'search', 'uses' => 'HomeController@search'));


//
// POSTS
//
// show
Route::get('post/{id}', array('as' => 'post_show', 'uses' => 'PostController@show'));
// create
Route::get('post/create', 'PostController@create')->before('auth');
// edit
Route::get('post/{id}/edit', 'PostController@edit')->before('auth');
// store
Route::post('post/store', 'PostController@store')->before('auth|csrf');
// destroy
Route::post('post/{id}', 'PostController@destroy')->before('auth|csrf');


//
// TAGS
//
Route::get('tags/search/{name}', array('as' => 'search_tags', 'uses' => 'TagController@search'));
Route::get('tags/all', array('as' => 'all_tags', 'uses' => 'TagController@all'));

//
// USER
//
Route::get('user/signin', array(
    'as' => 'signin',
    'uses' => 'UserController@signin'
))->before('guest');

Route::post('user/auth', array(
    'as' => 'auth',
    'uses' => 'UserController@auth'
))->before('guest|csrf');

Route::get('user/logout', array(
    'as' => 'logout',
    'uses' => 'UserController@logout'
))->before('auth');