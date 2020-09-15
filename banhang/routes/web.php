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

// mac dinh cua trang web http://abc.com/
Route::get('/','HomeController@index');
//ban hang
Route::get('sanpham/{id}', 'SanPhamController@ChiTiet');
Route::get('sanpham', 'SanPhamController@index');

//gio hang
Route::get('GioHang', 'GioHangController@Index');
Route::get('GioHang/Xoa/{id}', 'GioHangController@Xoa');
Route::post('GioHang/AddToCart/{id}', 'GioHangController@AddToCart');

//checkout
Route::get('Checkout','CheckoutController@Index');
Route::post('Checkout/Checkout','CheckoutController@Checkout');
Route::get('Checkout/ThankYou/{id_donhang}','CheckoutController@ThankYou');


//admin
Route::get('admin/sanpham','Admin\SanPhamController@index');
Route::get('admin/hocsinh','Admin\hocsinhController@indexhocsinh');

Route::get('admin/them_user', 'Admin\UserController@form_them');
Route::post('admin/XuLyThemUser', 'Admin\UserController@XuLyThemUser');

//tim kiem
Route::get('timkiem','SanPhamController@XuLy_timkiem');
