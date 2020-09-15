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
Route::get('index','LoginController@Getlogin');
Route::post('index','LoginController@Postlogin');
Route::get('home','HomeController@home');

Route::get('dangky','DangkyController@form_them');
Route::post('xuly_dangky/{id}','DangkyController@XuLyThemUser');

Route::get('demo','DangkyController@demo');