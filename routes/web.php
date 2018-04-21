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
    return view('welcome');
});
Route::get('/hello', 'HelloController@hello');
//84937593
//7583750503
//73820575
Route::get('/weight/{uid}/input', 'WeightInputController@weightinput');
Route::post('/weight/output', 'WeightInputController@weightoutput');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
