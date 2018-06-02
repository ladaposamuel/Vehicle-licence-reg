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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/profile', 'Users\UsersController@profile')->name('users.profile');
Route::post('/profile', 'Users\UsersController@update')->name('users.profile.update');


Route::post('/vaps/save', 'Users\VapsController@save')->name('users.application.save');

Route::group(['prefix' => 'mang'], function () {

    Route::get('/', 'Auth\MangLoginController@showLoginForm');
    Route::get('/login', 'Auth\MangLoginController@showLoginForm')->name('mang.login');
    Route::post('/login', 'Auth\MangLoginController@login')->name('mang.login.submit');
    Route::get('logout/', 'Auth\MangLoginController@logout')->name('mang.logout');
    Route::get('/app', 'Mang\MangController@index')->name('mang.dashboard');
    Route::post('/reports/spool', 'Mang\ReportsController@spool')->name('mang.reports.show');

    Route::post('/app/status/update', 'Mang\ReportsController@update')->name('mang.update.app.status');


    Route::get('/view/app/{id}', 'Mang\ReportsController@view')->name('mang.view.app');

});