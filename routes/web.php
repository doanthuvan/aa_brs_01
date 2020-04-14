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
Route::get('logout',function(){
   return view('user.Auth.login');
})->name('logout');
Route::get('news','User\UserController@news')->name('news');
Route::get('news-detail/{id}','User\UserController@newsdetail')->name('newsdetail');
Route::get('edit-infor', 'User\UserController@edit')->name('edit-infor');
Route::post('edit-infor', 'User\UserController@updateinfor')->name('update-infor');
Route::get('forgotpassword','Auth\ResetPasswordController@forgotpassword')->name('forgotpassword');
Route::get('/resetPassword/{token}', 'Auth\ResetPasswordController@resetPassword');
Route::post('/resetPassword', 'Auth\ResetPasswordController@newPass')->name('newPass');
Route::post('forgotpassword','Auth\ResetPasswordController@getForgotPassword');
Route::get('changepassword','Auth\ResetPasswordController@changepassword')->name('changepassword');
Route::post('changepassword','Auth\ResetPasswordController@changepass');
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
Route::get('myAcount', 'User\UserController@showInfor')->name('myAcount');
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
Route::get('listrecommend-book', 'User\UserController@listrecommend')->name('listrecommend-book');
Route::group(['prefix' => 'admin'], function () {
    Route::get('/','Admin\AdminController@index')->name('index');
    Route::get('/books','Admin\AdminController@showbooks')->name('showbooks');
    Route::get('/createbook','Admin\AdminController@createbook');
    Route::post('/createbook','Admin\AdminController@storebook');
    Route::get('/editbook/{id}','Admin\AdminController@editbook');
    Route::post('/editbook/{id}','Admin\AdminController@updatebook');
    Route::post('/destroybook/{id}','Admin\AdminController@destroybook');
    Route::get('/requestnewbooks','Admin\AdminController@showrequestnewbook')->name('requestnewbooks');
    Route::get('/requestnewbooks/{id}','Admin\AdminController@approved')->name('approveds');
    Route::get('/user','Admin\AdminController@showusers')->name('showusers');
    Route::get('/edituser/{id}','Admin\AdminController@edituser');
    Route::post('/edituser/{id}','Admin\AdminController@updateuser');
    Route::post('/destroyuser/{id}','Admin\AdminController@destroyuser');
    // Route::get('/destroyrequest/{id}','Admin\AdminController@destroyrequest');
    Route::post('/destroyrequest/{id}','Admin\AdminController@destroyrequest');
    Route::get('/createcategory','Admin\AdminController@createcategory');
    Route::post('/createcategory','Admin\AdminController@storecategory');
    Route::get('/categories','Admin\AdminController@showcategories')->name('showcategories');
    Route::get('/editcategory/{id}','Admin\AdminController@editcategory');
    Route::post('/editcategory/{id}','Admin\AdminController@updatecategory');
    Route::post('/destroycategory/{id}','Admin\AdminController@destroycategory');
    //nhà xuất bản
    Route::get('/publishers','Admin\AdminController@showpublishers')->name('publishers');
    Route::get('/createpublisher','Admin\AdminController@createpublisher');
    Route::post('/createpublisher','Admin\AdminController@storepublisher');
    Route::get('/editpublisher/{id}','Admin\AdminController@editpublisher');
    Route::post('/editpublisher/{id}','Admin\AdminController@updatepublisher');
    Route::post('/destroypublisher/{id}','Admin\AdminController@destroypublisher');
    //author
    Route::get('/authors','Admin\AdminController@showauthors')->name('authors');
    Route::get('/createauthor','Admin\AdminController@createauthor');
    Route::post('/createauthor','Admin\AdminController@storeauthor');
    Route::get('/editauthor/{id}','Admin\AdminController@editauthor');
    Route::post('/editauthor/{id}','Admin\AdminController@updateauthor');
    Route::post('/destroyauthor/{id}','Admin\AdminController@destroyauthor');
    Route::get('/shownew','Admin\AdminController@shownews')->name('new');
    Route::get('/createnew','Admin\AdminController@createnew');
    Route::post('/createnew','Admin\AdminController@storenew');
    Route::get('/notifications', 'Admin\AdminController@notifications');
    Route::get('/markAsRead',function(){
        auth()->user()->unreadNotifications->markAsRead();
    })->name('adminnotification');
});
