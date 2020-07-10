<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/*Route::get('/', function () {
    return view('test');
});*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*  Route::get('avis/avis', 'avisController@index');*/

<<<<<<< HEAD
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('vols','VolController');
/*Route::post('comments/comment','commentController@store');
Route::get('comments/comment','commentController@index');
Route::post('commentdelete','commentController@delete');
Route::post('commentupdate','commentController@update');
Route::post('commentsubmit','commentController@submit');*/
Route::resource('/entreprise','EntrepriseController');
Route::resource('/comments','commentsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
=======
Route::resource('vols','VolController');

/*
Route::post('comments/comment','commentController@store');
Route::get('comments/comment','commentController@index');
Route::post('commentdelete','commentController@delete');
Route::post('commentupdate','commentController@update');
Route::post('commentsubmit','commentController@submit');
*/

Route::resource('/entreprise','EntrepriseController');
>>>>>>> c9be6f8f8bd883fdfd20de6d2cc3698c65cff826
