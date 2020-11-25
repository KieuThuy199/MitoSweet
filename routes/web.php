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

Route::get('/', function () {
    return view('admin.index');
});

Route::group(['namespace' => 'Admin'],
    function () {
        // News
        Route::get('news', 'NewsController@data');
        Route::match(['get', 'post'],'news/add', 'NewsController@add');
        Route::match(['get', 'post'],'news/edit/{id}', 'NewsController@edit');
        Route::get('news/delete/{id}', 'NewsController@delete');
        Route::get('news/deleteMul', 'NewsController@deleteMul');
        // Route::post('news/search', 'NewsController@search');

        // Freetutorials
        Route::get('freetutorials', 'FreeTutorialsController@data');
        Route::match(['get', 'post'],'freetutorials/add', 'FreeTutorialsController@add');
        Route::match(['get', 'post'],'freetutorials/edit/{id}', 'FreeTutorialsController@edit');
        Route::get('freetutorials/delete/{id}', 'FreeTutorialsController@delete');
        Route::get('freetutorials/deleteMul', 'FreeTutorialsController@deleteMul');
        // Route::post('freetutorials/search', 'FreeTutorialsController@search');

        // Course
        // Route::prefix('course')->group(function () {
            Route::get('levels', 'CourseLevelsController@data');
            Route::match(['get', 'post'],'levels/add', 'CourseLevelsController@add');
            Route::match(['get', 'post'],'levels/edit/{id}', 'CourseLevelsController@edit');
            Route::get('levels/delete/{id}', 'CourseLevelsController@delete');
            Route::get('levels/deleteMul', 'CourseLevelsController@deleteMul');
            Route::get('levels/select', 'CourseLevelsController@select');

            Route::get('online', 'OnlineCoursesController@data');

            Route::get('offline', 'OfflineCoursesController@data');
            Route::match(['get', 'post'],'offline/add', 'OfflineCoursesController@add');
            Route::match(['get', 'post'],'offline/edit/{id}', 'OfflineCoursesController@edit');
            Route::get('offline/delete/{id}', 'OfflineCoursesController@delete');
            Route::get('offline/deleteMul', 'OfflineCoursesController@deleteMul');
            // Route::match(['get', 'post'],'levels/add', 'CourseLevelsController@add');
            // Route::match(['get', 'post'],'levels/edit/{id}', 'CourseLevelsController@edit');
            // Route::get('levels/delete/{id}', 'CourseLevelsController@delete');
            // Route::get('levels/deleteMul', 'CourseLevelsController@deleteMul');
            // Route::post('levels/search', 'CourseLevelsController@search');
        // });

});


// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
