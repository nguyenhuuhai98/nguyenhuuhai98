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
Route::group(['namespace' => 'User', 'middleware' => 'checkRole'], function ()
{
    Route::prefix('/home')->group(function ()
    {
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('/logout', 'HomeController@getLogout')->name('get.logout');
    });

    Route::prefix('/profile')->group(function ()
    {
        Route::get('/{id}', 'ProfileController@index')->name('get.profile');
        Route::get('/edit/{id}', 'ProfileController@getEditProfile')->name('get.edit.profile');
        Route::post('/edit/{id}', 'ProfileController@postEditProfile')->name('post.edit.profile');
        Route::post('/follow/{id}', 'ProfileController@getFollow')->name('get.follow.user');
    });

    Route::prefix('/course')->group(function ()
    {
        Route::get('/{slug}-{id}', 'CourseController@index')->name('get.course');
        Route::get('/lessions/{id}-{slug}', 'LessionController@index')->name('get.all.lession');
        Route::get('/lession/{id}-{slug}', 'LessionController@getLession')->name('get.detail.lession');
        Route::post('/quiz/{lession_id}-{test_id}', 'LessionController@getAnswers')->name('answer.question');
    });

    Route::get('/search', 'HomeController@search')->name('search');
    Route::post('/memorised/{id}', 'LessionController@memorised')->name('memorised');
    Route::post('/mark/{id}', 'HomeController@mark')->name('mark');
});

Route::group(['namespace' => 'Admin'], function ()
{
    Route::prefix('admin')->group(function ()
    {
        Route::get('/', 'AdminController@index')->name('dashboard');
        Route::get('/logout', 'AdminController@getLogout')->name('admin.get.logout');
        Route::post('/search', 'AdminController@search')->name('admin.search');
        Route::get('/userChart', 'AdminController@userByMonth')->name('admin.user.chart');
        Route::get('/testChart', 'AdminController@testByMonth')->name('admin.test.chart');

        Route::prefix('/category')->group(function ()
        {
            Route::get('/', 'AdminCategoryController@index')->name('get.all.categories');
            Route::get('/store', 'AdminCategoryController@getStore')->name('get.add.category');
            Route::post('/store', 'AdminCategoryController@store')->name('post.add.category');
            Route::get('/update/{id}', 'AdminCategoryController@getUpdate')->name('get.update.category');
            Route::post('/update/{id}', 'AdminCategoryController@postUpdate')->name('post.update.category');
            Route::get('/delete/{id}', 'AdminCategoryController@getDelete')->name('delete.category');
        });

        Route::prefix('/course')->group(function ()
        {
            Route::get('/', 'AdminCourseController@index')->name('get.all.courses');
            Route::get('/store', 'AdminCourseController@getStore')->name('get.add.course');
            Route::post('/store', 'AdminCourseController@store')->name('post.add.course');
            Route::get('/update/{id}', 'AdminCourseController@getUpdate')->name('get.update.course');
            Route::post('/update/{id}', 'AdminCourseController@postUpdate')->name('post.update.course');
            Route::get('/delete/{id}', 'AdminCourseController@getDelete')->name('delete.course');
        });

        Route::prefix('/lession')->group(function ()
        {
            Route::get('/', 'AdminLessionController@index')->name('get.all.lessions');
            Route::get('/store', 'AdminLessionController@getStore')->name('get.add.lession');
            Route::post('/store', 'AdminLessionController@store')->name('post.add.lession');
            Route::get('/update/{id}', 'AdminLessionController@getUpdate')->name('get.update.lession');
            Route::post('/update/{id}', 'AdminLessionController@postUpdate')->name('post.update.lession');
            Route::get('/delete/{id}', 'AdminLessionController@getDelete')->name('delete.lession');
        });

        Route::prefix('/question')->group(function ()
        {
            Route::get('/', 'AdminQuestionController@index')->name('get.all.questions');
            Route::get('/store', 'AdminQuestionController@getStore')->name('get.add.question');
            Route::post('/store', 'AdminQuestionController@store')->name('post.add.question');
            Route::get('/update/{id}', 'AdminQuestionController@getUpdate')->name('get.update.question');
            Route::post('/update/{id}', 'AdminQuestionController@postUpdate')->name('post.update.question');
            Route::get('/delete/{id}', 'AdminQuestionController@getDelete')->name('delete.question');
        });

        Route::prefix('/test')->group(function ()
        {
            Route::get('/', 'AdminTestController@index')->name('get.all.tests');
            Route::get('/store', 'AdminTestController@getStore')->name('get.add.test');
            Route::post('/store', 'AdminTestController@store')->name('post.add.test');
            Route::get('/update/{id}', 'AdminTestController@getUpdate')->name('get.update.test');
            Route::post('/update/{id}', 'AdminTestController@postUpdate')->name('post.update.test');
            Route::get('/delete/{id}', 'AdminTestController@getDelete')->name('delete.test');
        });
    });
});

Auth::routes();



