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
//book
Route::get('book-detail/{id}', 'User\BookDetailController@index')->name('book-detail');
Route::get('book/', 'User\BookController@index')->name('book');
Route::get('bookofPublisher/{id}', 'User\BookController@bookOfPublisher')->name('bookofPublisher');
Route::get('bookofcategory/{id}', 'User\BookController@bookOfCategory')->name('bookofcategory');
Route::get('search', 'User\BookController@search')->name('searchbook');
Route::get('book-detail/{id}', 'User\BookController@bookdetail')->name('book-detail');
Route::post('book-detail-vote/{id}', 'User\BookController@voteBook')->name('book-detail-vote');
Route::get('favorite-book/{id}', 'User\UserController@favoritebook')->name('favorite-book');
Route::get('book-read/{id}', 'User\UserController@bookread')->name('book-read');
Route::get('book-reading/{id}', 'User\UserController@bookreading')->name('book-reading');
Route::post('like', 'User\UserController@toggleLike')->name('likeIt');
//member
Route::get('member', 'User\UserController@member')->name('member');
Route::get('mypage', 'User\UserController@mypage')->name('mypage');
Route::get('personal/{id}', 'User\UserController@personal')->name('person');
Route::get('maganereview', 'User\UserController@maganereview')->name('maganereview');
Route::get('followers/{id}', 'User\UserController@followers')->name('followers');
Route::get('manage_follow', 'User\UserController@managefollow')->name('managefollow');
Route::get('unfollow/{id}', 'User\UserController@unfollow')->name('unfollow');
Route::get('showreview/{id}', 'User\UserController@showreview')->name('showreview');
Route::get('follow/{id}', 'User\UserController@follow')->name('follow');
//review
Route::get('create-review/{id}', 'User\BookController@createReview')->name('create-review');
Route::post('create-review/{id}', 'User\BookController@storeReview')->name('store-review');
Route::get('editreview/{id}', 'User\BookController@editReview')->name('editReview');
Route::post('editreview/{id}', 'User\BookController@updateReview');
Route::post('reviewdelete/{id}', 'User\BookController@destroyReview');
Route::get('show-review/{reviewid}', 'User\BookController@showReview')->name('show-review');
//comment của review
Route::post('createcomment', 'User\BookController@createcomment')->name('create-comment');
Route::get('createcomment', 'User\BookController@createcomment')->name('create-comment');
Route::post('comment_review/{reviewid}', 'User\BookController@showComment')->name('comment_review');
Route::get('recommend-book', 'User\UserController@recommend')->name('recommend-book');
Route::post('recommend-book', 'User\UserController@sentrecommend')->name('postrecommend-book');

