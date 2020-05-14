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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/chat', 'MessageController@index');
Route::post('/chat/messages', 'MessageController@sendMessage');
Route::get('/chat/messages/{room}', 'MessageController@getMessages');

Route::get('/home', 'RoomController@index')->name('rooms.index');
Route::get('/rooms/create', 'RoomController@create')->name('rooms.create');
Route::post('/rooms', 'RoomController@store')->name('rooms.store');
Route::get('/chat/{room}', 'RoomController@show')->name('rooms.show');
