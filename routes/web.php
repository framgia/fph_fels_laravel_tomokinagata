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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/admin/category/add', function () {
    return view('admin.addCategory');
});
Route::get('/admin/category', 'CategoryController@index');
Route::post('/admin/category/create', 'CategoryController@create');
Route::get('/admin/category/edit/{category}', 'CategoryController@edit');
Route::post('/admin/category/update/{category}', 'CategoryController@update');
Route::get('/admin/category/delete/{category}', 'CategoryController@delete');



