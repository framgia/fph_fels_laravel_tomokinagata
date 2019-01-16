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

//temporary dashoboard page rooting
Route::get('/dashboard', function () {
    return view('dashboard');
});

//temporary admin_add_category page rooting
Route::get('/admin_add_category', function () {
    return view('admin.addCategory');
});

//temporary rooting for admin to add category 
Route::post('/create_category', 'CategoryController@create');



