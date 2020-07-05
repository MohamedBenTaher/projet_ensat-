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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/', function () {
    return view('test');
});*/
Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
Route::get('avis/avis', 'avisController@index');
Route::resource('vols','VolController');
Route::post('comments/comment','commentController@store');
Route::get('comments/comment','commentController@index');
Route::post('commentdelete','commentController@delete');
Route::post('commentupdate','commentController@update');
Route::post('commentsubmit','commentController@submit');
