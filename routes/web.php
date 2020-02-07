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

Route::get('notification', ['as' => 'notification', 'uses' => 'NotificationController@send']);
Route::get('/', ['as' => 'get_notification', 'uses' => 'NotificationController@index']);
