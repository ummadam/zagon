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

//Route::get('/sheep', 'SheepController@index');
//Route::put('/update', 'SheepController@update')->name('sheep.update');
//убийство овечек
Route::get('/sheep', 'SheepController@index')->name('sheep.index');
Route::put('/isdead', 'SheepController@isdead')->name('sheep.isdead');
Route::put('/sheep', 'SheepController@update')->name('sheep.update');
Route::post('/save', 'SheepController@save')->name('sheep.save');
