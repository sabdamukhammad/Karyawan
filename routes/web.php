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


Auth::routes();

Route::resource('/blog', 'BlogController');

Route::get('/', 'Dashboard@index')->name('dashboard');
Route::get('/user', 'UsersController@index')->name('user');
Route::get('/user/create', 'UsersController@create')->name('user.create');
Route::post('/user/create', 'UsersController@store')->name('user.store');
Route::get('/user/edit/{id}', 'UsersController@edit')->name('user.edit');
Route::patch('/user/edit/{id}', 'UsersController@update')->name('user.update');
Route::get('/user/destroy/{id}', 'UsersController@destroy')->name('user.destroy');

Route::get('/karyawan', 'KaryawanController@index')->name('karyawan');
Route::get('/karyawan/create', 'KaryawanController@create')->name('karyawan.create');
Route::post('/karyawan/create', 'KaryawanController@store')->name('karyawan.store');
Route::get('/karyawan/edit/{id}', 'KaryawanController@edit')->name('karyawan.edit');
Route::patch('/karyawan/edit/{id}', 'KaryawanController@update')->name('karyawan.update');
Route::get('/karyawan/destroy/{id}', 'KaryawanController@destroy')->name('karyawan.destroy');
