<?php

use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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




/*Route::post('comments/comment','commentController@store');
Route::get('comments/comment','commentController@index');
Route::post('commentdelete','commentController@delete');
Route::post('commentupdate','commentController@update');
Route::post('commentsubmit','commentController@submit');*/

//Route::resource('vols','VolController');

//Route::resource('entreprise','EntrepriseController');

Route::post('comments/comment','commentsController@store');
Route::get('comments/comment','commentsController@index');
Route::post('commentdelete','commentsController@destroy');
Route::post('commentupdate','commentsController@update');
Route::post('commentsubmit','commentsController@submit');
Route::post('commentshow','commentsController@show');

Route::resource('vols','VolController');
Route::get('/search','VolController@search')->name('vols.search');
Route::post('likes','likesController@store');
Route::post('dislikes','dislikesController@store');

Route::resource('entreprise','EntrepriseController');



Route::get('/', 'VolController@index')->name('home');


