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

Route::get('users/login', 'Auth\LoginController@getLogin')->name('getlogin');
Route::post('users/login', [ 'as' => 'login', 'uses' => 'Auth\LoginController@postLogin'])->name('postlogin');
Route::get('/', 'User\HomeController@index')->name('home');
// Đăng xuất
Route::get('logout','Auth\LogoutController@getLogout')->name('logout');
//thông tin người dùng
Route::get('myAcount', 'User\UserController@showInfor')->name('myAcount');