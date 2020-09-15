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
Route::get('sanpham','sanphamController@index');
Route::get('danhmuc','danhmucController@danhmuc');
Route::get('danhmuc_cat/{id}','danhmucController@danhmuc_id');

//upload
Route::get('upload','FileController@index');
Route::post('upload','FileController@upload');

//resize image
Route::get('resize','ResizeController@resize');