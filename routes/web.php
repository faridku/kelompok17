<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'QuestionController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile/{user_id}/edit', 'HomeController@edit');
Route::get('/profile/{user_id}/sertif', 'HomeController@sertif');
Route::put('/profile/{user_id}', 'HomeController@update');
Route::resource('question', 'QuestionController');


// Tidak pakai resource, karena harus mengambil id dari Question
Route::get('answer/create/{question_id}', 'AnswerController@create'); // to form isi ans
Route::post('/answer/{question_id}', 'AnswerController@store'); // sv ans, redirect to list ques
Route::get('/answer/{answer_id}/edit', 'AnswerController@edit'); // sv ans, redirect to list ques
Route::put('/answer/{question_id}', 'AnswerController@update');
Route::delete('/answer/{answer_id}', 'AnswerController@destroy');
Route::get('/answer/{answer_id}/verify', 'AnswerController@verify');

// Comment
Route::post('/comment/{question_id}', 'CommentController@store');
Route::post('/comment/answer/{answer_id}', 'CommentController@storeAnsComment');
Route::delete('/comment/{comment_id}', 'CommentController@destroy');
route::delete('/comment/answer/{comment_id}', 'CommentController@destroyAnsComment');

// Tag
Route::get('tag/{tag_id}', 'TagController@show');
Route::get('tag', 'TagController@index');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});