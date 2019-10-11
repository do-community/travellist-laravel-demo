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

Route::get('/', 'MainController@main')->name('Main');

Route::get('/upload', 'PhotoController@uploadForm')->name('Upload.form');

Route::post('/upload', 'PhotoController@uploadPhoto')->name('Upload');