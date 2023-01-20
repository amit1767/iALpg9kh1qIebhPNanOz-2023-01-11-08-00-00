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


// Administration ( Admin Panel )

Route::group(['namespace' => 'Auth'], function () {
    Route::get('/','AuthController@index')->name('login');
    Route::Post('/login','AuthController@login');
    Route::post('/forgot-password','AuthController@forgotPassword')->name('forgot.password');
    Route::post('/reset-password','AuthController@resetPassword')->name('recover.password');
});

Route::group(['namespace' => 'Dashboard', 'middleware' => 'admin.auth'], function () {
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
    Route::get('/logout','DashboardController@logout')->name('logout');
    Route::get('/profile','DashboardController@profile')->name('profile');
    Route::get('/support','DashboardController@support')->name('support');
});

Route::group(['namespace' => 'Admin', 'middleware' => 'admin.auth'], function () {
    Route::get('/users','UsersController@index')->name('users');
    Route::get('/user/{id}','UsersController@user')->name('user');
});

Route::group(['namespace' => 'Admin', 'middleware' => 'admin.auth'], function () {
    Route::get('/articles','ArticlesController@getArticles')->name('articles');
    Route::get('/article/create','ArticlesController@createArticle')->name('article.create');
    Route::post('/article/store','ArticlesController@storeArticle')->name('article.store');
    Route::get('/article/edit/{id}','ArticlesController@editArticle')->name('article.edit');
    Route::patch('/article/update/{id}', 'ArticlesController@updateArticle')->name('article.update');
    Route::delete('/article/delete/{id}','ArticlesController@delete')->name('article.delete');
});