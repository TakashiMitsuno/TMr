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


Route::group(['middleware' => ['auth']], function(){
Route::get('/','PostController@index');
Route::get('/posts/create', 'PostController@creat');
Route::get('/posts/{post}/edit', 'PostController@edit');
Route::put('/posts/{post}', 'PostController@update');
Route::delete('/posts/{post}', 'PostController@delete');
Route::get('/posts/{post}', 'PostController@show');
Route::post('/posts', 'PostController@store');
Route::get('/categories/{category}', 'CategoryController@index');
Route::get('/users', 'UserController@index');
Route::get('/users/{user}', 'UserController@index2');
Route::get('/teratail','PostController@teratail');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


