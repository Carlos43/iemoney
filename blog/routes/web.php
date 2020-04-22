<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', 'Controller@home')->name('home');

Route::post('/user/register', 'UserController@register')->name('register');
Route::post('/user/login', 'UserController@login')->name('login');
Route::get('/user/getCurrentInfo', 'UserController@getCurrentInfo')->name('getCurrentInfo');
Route::delete('/user/logout', 'UserController@logout')->name('logout');
Route::get('/user/getUserById', 'UserController@getUserById')->name('getUserById');
Route::get('/user/getUserList', 'UserController@getUserList')->name('getUserList');
Route::get('/user/loginForTestPage', 'UserController@loginForTestPage')->name('loginForTestPage');
Route::patch('/user/updateUser/{user}', 'UserController@updateUser')->name('updateUser');
Route::delete('/user/deleteUserById', 'UserController@deleteUserById')->name('deleteUserById');
Route::get('/user/getFollowers', 'UserController@getFollowers')->name('getFollowers');
Route::get('/user/getFollowings', 'UserController@getFollowings')->name('getFollowings');
Route::post('/user/follow', 'UserController@follow')->name('follow');
Route::delete('/user/unfollow', 'UserController@unfollow')->name('unfollow');

Route::get('/status/getStatusListByUserId', 'StatusController@getStatusListByUserId')->name('getStatusListByUserId');
Route::get('/status/getStatusById', 'StatusController@getStatusById')->name('getStatusById');
Route::post('/status/createStatus', 'StatusController@createStatus')->name('createStatus');
Route::delete('/status/deleteStatusById', 'StatusController@deleteStatusById')->name('deleteStatusById');