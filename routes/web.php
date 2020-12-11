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

        // Course
            // Route::prefix('course')->group(function () {
            // Cấp độ
            Route::get('levels', 'CourseLevelsController@data');
            Route::match(['get', 'post'],'levels/add', 'CourseLevelsController@add');
            Route::match(['get', 'post'],'levels/edit/{id}', 'CourseLevelsController@edit');
            Route::get('levels/delete/{id}', 'CourseLevelsController@delete');
            Route::get('levels/deleteMul', 'CourseLevelsController@deleteMul');
            // Route::get('levels/select', 'CourseLevelsController@select');

            Route::get('online', 'OnlineCoursesController@data');

            // Offline
            Route::get('offline', 'OfflineCoursesController@data');
            Route::match(['get', 'post'],'offline/add', 'OfflineCoursesController@add');
            Route::match(['get', 'post'],'offline/edit/{id}', 'OfflineCoursesController@edit');
            Route::get('offline/delete/{id}', 'OfflineCoursesController@delete');
            Route::get('offline/deleteMul', 'OfflineCoursesController@deleteMul');

            // Coupons
            Route::get('coupons', 'CouponsController@data');
            Route::match(['get', 'post'],'coupons/add', 'CouponsController@add');
            Route::match(['get', 'post'],'coupons/edit/{id}', 'CouponsController@edit');
            Route::get('coupons/delete/{id}', 'CouponsController@delete');
            Route::get('coupons/deleteMul', 'CouponsController@deleteMul');

        // Lịch học
            Route::get('schedules', 'SchedulesController@data');
            Route::match(['get', 'post'],'schedules/add', 'SchedulesController@add');
            Route::match(['get', 'post'],'schedules/edit/{id}', 'SchedulesController@edit');
            Route::get('schedules/delete/{id}', 'SchedulesController@delete');
            Route::get('schedules/deleteMul', 'SchedulesController@deleteMul');
        // Bánh
            Route::get('cakes', 'CakesController@data');
            Route::match(['get', 'post'],'cakes/add', 'CakesController@add');
            Route::match(['get', 'post'],'cakes/edit/{id}', 'CakesController@edit');
            Route::get('cakes/delete/{id}', 'CakesController@delete');
            Route::get('cakes/deleteMul', 'CakesController@deleteMul');

            // Hình dáng
            Route::get('cake-shapes', 'CakeShapesController@data');
            Route::match(['get', 'post'],'cake-shapes/add', 'CakeShapesController@add');
            Route::match(['get', 'post'],'cake-shapes/edit/{id}', 'CakeShapesController@edit');
            Route::get('cake-shapes/delete/{id}', 'CakeShapesController@delete');
            Route::get('cake-shapes/deleteMul', 'CakeShapesController@deleteMul');

            // Loại bánh
            Route::get('cake-types', 'CakeTypesController@data');
            Route::match(['get', 'post'],'cake-types/add', 'CakeTypesController@add');
            Route::match(['get', 'post'],'cake-types/edit/{id}', 'CakeTypesController@edit');
            Route::get('cake-types/delete/{id}', 'CakeTypesController@delete');
            Route::get('cake-types/deleteMul', 'CakeTypesController@deleteMul');
            // Route::get('cake-types/select', 'CakeTypesController@select');

            // Kích thước bánh
            Route::get('cake-sizes', 'CakeSizesController@data');
            Route::match(['get', 'post'],'cake-sizes/add', 'CakeSizesController@add');
            Route::match(['get', 'post'],'cake-sizes/edit/{id}', 'CakeSizesController@edit');
            Route::get('cake-sizes/delete/{id}', 'CakeSizesController@delete');
            Route::get('cake-sizes/deleteMul', 'CakeSizesController@deleteMul');
        // });

        // Giao diện
            Route::get('pages', 'InterfacesController@data');
            Route::match(['get', 'post'],'pages/edit/{id}', 'InterfacesController@edit');

});


// Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//     \UniSharp\LaravelFilemanager\Lfm::routes();
// });
Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/user', function () {
    return view('user.index');
});
Route::get('user/schedules', function () {
    return view('user.classdetail');
});
