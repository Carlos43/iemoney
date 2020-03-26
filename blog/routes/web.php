<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', 'Controller@home')->name('home');

Route::get('/session/login', 'SessionController@gotoLogin')->name('session.login');
Route::post('/session/login', 'SessionController@login')->name('session.login');
Route::delete('/session/logout', 'SessionController@logout')->name('session.logout');

Route::get('/user/signup', 'UserController@gotoSignUp')->name('user.signup');
Route::post('/user/create', 'UserController@create')->name('user.create');
Route::get('/user/info/{user}', 'UserController@getUser')->name('user.info');
//Route::resource('user', 'UserController');