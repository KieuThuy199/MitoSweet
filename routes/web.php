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

Route::group(['namespace' => 'Admin', 'as' => 'news.'],
    function () {
        Route::get('news', 'NewsController@data');
        // Route::get('news-data', ['as' => 'news.data', 'uses' => 'NewsController@data']);

        Route::match(['get', 'post'],'news/add', 'NewsController@add');
        Route::match(['get', 'post'],'news/edit/{id}', 'NewsController@edit');

        Route::get('news/delete/{id}', 'NewsController@delete');
        Route::get('news/deleteMul', 'NewsController@deleteMul');

        Route::post('news/search', 'NewsController@search');
});

Route::group(['namespace' => 'Admin', 'as' => 'freetutorials.'],
    function () {
        Route::get('freetutorials', 'FreeTutorialsController@data');

        Route::match(['get', 'post'],'freetutorials/add', 'FreeTutorialsController@add');
        Route::match(['get', 'post'],'freetutorials/edit/{id}', 'FreeTutorialsController@edit');

        Route::get('freetutorials/delete/{id}', 'FreeTutorialsController@delete');
        Route::get('freetutorials/deleteMul', 'FreeTutorialsController@deleteMul');

        Route::post('freetutorials/search', 'FreeTutorialsController@search');
});
// Route::get('news.add', function () {
//     return redirect('news')->with('status', 'Thêm tin tức thành công!');
// });
// Route::get('news.fail', function () {
//     return redirect('news')->with('fail', 'Không thêm được!');
// });

// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
