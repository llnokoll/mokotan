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
Route::get('/weight/84937593/input', 'WeightInputController@weightinput1');
Route::get('/weight/7583750503/input', 'WeightInputController@weightinput2');
Route::get('/weight/73820575/input', 'WeightInputController@weightinput3');
Route::post('/weight/output1', 'WeightInputController@weightoutput1');
Route::post('/weight/output2', 'WeightInputController@weightoutput2');
Route::post('/weight/output3', 'WeightInputController@weightoutput3');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
