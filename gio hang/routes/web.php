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
Route::get('GioHang','GiohangController@GioHang');
Route::post('GioHang/addtocard/{id}', 'GiohangController@addtocard');
Route::post('GioHang/xoa/{id}', 'GiohangController@xoa');

Route::get('sanpham','sanphamController@index');
Route::get('sanpham/{id}', 'SanPhamController@chitiet');
