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
use App\Http\Middleware\CheckProfileOrDashboard;


Auth::routes();

//Home for user
Route::get('/', function () {
    return view('home');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/dashboard/words_learned', 'HomeController@wordsLearned');
Route::get('/dashboard/followers', 'HomeController@followers');
Route::get('/dashboard/following', 'HomeController@following');
Route::get('/dashboard/edit', 'UserController@edit');
Route::post('/dashboard/edit', 'UserController@update');

//Profile functions for user
Route::get('/profile/user_list', 'ProfileController@index');
Route::get('/profile/{profile_user}', 'ProfileController@profile')->middleware(CheckProfileOrDashboard::class);
Route::get('/profile/{profile_user}/words_leaned', 'ProfileController@profileWordsLearned');
Route::get('/profile/{profile_user}/followers', 'ProfileController@profileFollowers');
Route::get('/profile/{profile_user}/following', 'ProfileController@profileFollowing');
Route::get('/profile/{profile_user}/{user}/follow', 'RelationshipController@follow')->name('follow');
Route::get('/profile/{profile_user}/{user}/unfollow', 'RelationshipController@unfollow')->name('unfollow');

//Lesson functions for user
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
