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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/friends', 'FriendsController@index')->middleware('auth')->name('friends.index');

Route::get('/chat', 'ChatController@index')->middleware('auth')->name('chat.index');

Route::get('/chat/{id}', 'ChatController@show')->middleware('auth')->name('chat.show');

Route::post('/chat/getChat/{id}', 'ChatController@getChat')->middleware('auth');
Route::post('/chat/sendChat', 'ChatController@sendChat')->middleware('auth');

// gọi ra trang view demo-pusher.blade.php
 Route::get('demo-pusher','FrontEndController@getPusher');
// Truyển message lên server Pusher
 Route::get('fire-event','FrontEndController@fireEvent');
//
