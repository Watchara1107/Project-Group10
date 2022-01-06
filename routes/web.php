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

Route::get('/', 'FrontendController@index');

Auth::routes();

//My Profile
Route::get('/home', 'HomeController@index')->name('home');

//Admin
Route::get('/admin/index', 'Admin\AdminController@index')->name('index.admin');

//Service
Route::get('/admin/service/index', 'Admin\ServiceController@index')->name('index.service');
Route::post('/admin/service/create', 'Admin\ServiceController@create')->name('create.service');
Route::get('/admin/service/edit/{id}', 'Admin\ServiceController@edit');
Route::post('/admin/service/update/{id}', 'Admin\ServiceController@update');
Route::get('/admin/service/delete/{id}', 'Admin\ServiceController@delete');

//Category
Route::get('/admin/category/index', 'Admin\CategoryController@index')->name('index.category');
Route::get('/admin/category/create', 'Admin\CategoryController@create')->name('insert.category');
Route::post('/admin/category/insert', 'Admin\CategoryController@insert')->name('create.category');
Route::get('/admin/category/edit/{id}', 'Admin\CategoryController@edit');
Route::post('/admin/category/update/{id}', 'Admin\CategoryController@update');
Route::get('/admin/category/delete/{id}', 'Admin\CategoryController@delete');

//User
Route::get('/admin/user/index', 'Admin\UserController@index')->name('index.user');
