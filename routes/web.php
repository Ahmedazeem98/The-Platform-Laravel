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

Route::get('/', 'HomeController@index');


Route::namespace('BackEnd')->prefix('admin')->middleware('admin')->group(function(){

    Route::get('/home', 'HomeController@index')->name('admin.home');
   
    Route::resource('users','UsersController')->except(['show']);
    Route::resource('categories','CategoriesController')->except(['show']);
    Route::resource('skills','SkillsControllerll')->except(['show']);
    Route::resource('tags','TagsControllerll')->except(['show']);
    Route::resource('pages','pagesControllerll')->except(['show']);
    Route::resource('videos','VideosController')->except(['show']);
    Route::resource('messages','MessagesContorller')->only(['index','destroy','edit']);
    Route::post('messages/replay/{id}', 'MessagesContorller@replay')->name('messages.replay');

    Route::post('comments','VideosController@commentStore')->name('comment.store');
    Route::get('comments/{id}','VideosController@commentDelete')->name('comment.destroy');
    Route::get('comments/{id}/edit','VideosController@commentEdit')->name('comment.edit');
    Route::post('comments/{id}','VideosController@commentUpdate')->name('comment.update');

});

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/categories/{id}', 'HomeController@categories')->name('front.category');
Route::get('/skills/{id}', 'HomeController@skills')->name('front.skill');
Route::get('/video/{id}', 'HomeController@video')->name('front.video');

Route::get('/contactus', 'HomeController@contactus')->name('front.contactus');
Route::post('/contactus', 'HomeController@storeMessages')->name('contact.store');

Route::get('/pages/{id}/{slug?}', 'HomeController@page')->name('front.page');
Route::get('/users/profile/{id}', 'HomeController@profile')->name('front.profile');
Route::get('/users/profile/edit/{id}', 'HomeController@editprofile')->name('front.editProfile');
Route::post('/users/profile/{id}', 'HomeController@updateprofile')->name('front.updateProfile');
Route::get('/videos', 'HomeController@profile')->name('front.userVideos');

Route::middleware('auth')->group(function(){
    Route::post('/comments/{id}', 'HomeController@updateComment')->name('front.commentUpdate');
    Route::post('/comments', 'HomeController@storeComment')->name('front.commentStore');
});
Auth::routes();

