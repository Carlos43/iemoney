<?php

use Illuminate\Support\Facades\Route;

Route::get('/home', 'Controller@home')->name('home');
Route::get('/login', 'UserController@login')->name('login');
Route::get('/logout', 'UserController@logout')->name('logout');
Route::get('/signup', 'UserController@signup')->name('signup');