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
Route::get('/sanpham','SanphamController@index');
Route::delete('sanpham/xoa/{id}', 'SanphamController@xoa');    
Route::post('/xulythem','SanphamController@XuLyThem');
Route::get('/edit','SanphamController@edit');
Route::get('sanpham/show/{id}','SanphamController@show');
Route::get('sanpham/edit/{id}','SanphamController@show');
