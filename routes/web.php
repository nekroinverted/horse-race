<?php

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

/* Route::get('/', function () {
    return view('ResultController@index');
}); */

Route::get('/', 'ResultController@index');
Route::get('/results', 'ResultController@index');
Route::post('/results', 'ResultController@store');
Route::put('/results/{result}', 'ResultController@update')->name('articles.update');
Route::delete('/results/{result}', 'ResultController@destroy')->name('articles.delete');

Auth::routes();


Route::get('/home', 'ResultController@index')->name('home');
