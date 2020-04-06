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
Route::get('book-detail/{id}', 'User\BookController@bookdetail')->name('book-detail');
Route::post('book-detail-vote/{id}', 'User\BookController@voteBook')->name('book-detail-vote');
Route::get('book-detail-vote/{id}', 'User\BookController@voteBook')->name('book-detail-vote');
Route::get('book-reading/{id}', 'User\UserController@bookreading')->name('book-reading');
Route::get('favorite-book/{id}', 'User\UserController@favoritebook')->name('favorite-book');
Route::get('book-read/{id}', 'User\UserController@bookread')->name('book-read');
Route::get('create-review/{id}', 'User\BookController@showcreatereview')->name('create-review');
Route::get('review-detail/{reviewid}', 'User\BookController@showReview')->name('review-detail');
Route::post('like', 'User\UserController@toggleLike')->name('likeIt');
