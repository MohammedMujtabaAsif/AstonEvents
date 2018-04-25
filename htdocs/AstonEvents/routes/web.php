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

Route::get('/', 'PagesController@index');
Route::get('/event', 'PagesController@event');

Route::get('events/{id}/email', 'EmailsController@show');
Route::post('events/{id}/email', ['uses'=>'EmailsController@send']);

Route::get('/dash', 'DashController@index');

Route::resource('events', 'EventsController');

Auth::routes();

?>