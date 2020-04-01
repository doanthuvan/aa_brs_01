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

Route::get('/', 'User\HomeController@index')->name('home');
//login
Route::get('users/login', 'Auth\LoginController@getLogin')->name('getlogin');
Route::post('users/login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin'])->name('postlogin');
//đăng kí
Route::get('users/register', 'Auth\RegisterController@showRegistrationForm')->name('getRegister');
Route::post('users/register', 'Auth\RegisterController@register')->name('postRegister');
// Đăng xuất
Route::get('logout','Auth\LogoutController@getLogout')->name('logout');

Route::get('book-detail/{id}', 'User\BookDetailController@index')->name('book-detail');
Route::get('book/', 'User\BookController@index')->name('book');
Route::get('bookofPublisher/{id}', 'User\BookController@bookOfPublisher')->name('bookofPublisher');
Route::get('bookofcategory/{id}', 'User\BookController@bookOfCategory')->name('bookofcategory');
Route::get('search', 'User\BookController@search')->name('searchbook');
