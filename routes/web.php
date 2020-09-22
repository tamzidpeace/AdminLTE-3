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
    return view('welcome');
});

Auth::routes();

Route::post('/', 'HomeController@logout')->name('user.logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin-dashboard', 'HomeController@dashboard')->name('admin.dashboard');
Route::get('admin-data', 'HomeController@data')->name('admin.data');

Route::get('admin-login', 'Admin\Auth\LoginController@login')->name('admin.login');
Route::post('admin-login', 'Admin\Auth\LoginController@login')->name('admin.login');

// messages
Route::get('meassage-index', 'HomeController@messageIndex')->name('message.index');
Route::get('meassage-level1/{index}', 'HomeController@messageLevel1')->name('message.level1');
Route::get('meassage-level1/meassage-level2/{index}/{index2}', 'HomeController@messageLevel2')->name('message.level2');