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
Auth::routes();
Route::get('/sample', function() {
  return 1;
});
//for User
Route::get('/', function () {
    return view('home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', function () {
    return view('dashboard');
});
Route::get('/category', 'LessonController@lessonIndex');
Route::get('/category/lesson/{category}/{page_number}/{correct}', 'LessonController@lessonAnswer')->name('lessonAnswer');
Route::get('/category/lesson/{category}/{page_number}/{correct}/result', 'LessonController@lessonResult')->name('lessonResult');

//Category CRUD functions for Admin
Route::get('/admin/category', 'CategoryController@index');
Route::get('/admin/category/add', 'CategoryController@add');
Route::post('/admin/category/create', 'CategoryController@create');
Route::get('/admin/category/edit/{category}', 'CategoryController@edit');
Route::post('/admin/category/update/{category}', 'CategoryController@update');
Route::delete('/admin/category/delete/{category}', 'CategoryController@delete');

//Word CRUD functions for Admin
Route::get('/admin/word/{category}', 'WordController@index');
Route::get('/admin/word/add/{category}', 'WordController@add');
Route::post('/admin/word/create', 'WordController@create');
Route::get('/admin/word/edit/{word}', 'WordController@edit');
Route::post('/admin/word/update', 'WordController@update');
Route::delete('/admin/word/delete/{word}', 'WordController@delete');

//User RD functions for Admin
Route::get('/admin/user', 'UserController@index');
Route::delete('/admin/user/delete/{user}', 'UserController@delete');
