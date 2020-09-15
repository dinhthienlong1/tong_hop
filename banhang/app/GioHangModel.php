<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GioHangModel extends Model
{
    public $request;
    public $cart_key = 'cart';
    public function __construct($request)
    {
        $this->request = $request;
        //khoi tao gio hang
        if(!$this->request->session()->has($this->cart_key)){
            $cart = [
                'dssp'=>[],
                'tong_tien'=>0
            ];
            $this->LuuGioHang($cart);
        }
        
    }
    public function ThemVaoGioHang($id_sanpham, $soluong){
        $SanPhamModel = new SanPhamModel();
        $sanpham = $SanPhamModel->LayBangId($id_sanpham);

        //lay gia tri gio hang hien tai o session
        $cart_hientai = $this->LayGioHang();

        //sua cac gia tri trong gio hang
        if( empty($cart_hientai['dssp'][$id_sanpham]) ){
            $new_cart_item = [
                'id_san_pham'   =>  $sanpham->id,
                'ten_sp'        =>  $sanpham->ten_sp,
                'gia'           =>  $sanpham->gia,
                'hinh_anh'      =>  $sanpham->hinh_anh,
                'soluong'       =>  $soluong
            ];
            $cart_hientai['dssp'][$sanpham->id] = $new_cart_item; //push thang
        }else{
            $cart_hientai['dssp'][$id_sanpham]['soluong'] += $soluong;
            // <=> $cart_hientai['dssp'][$id_sanpham]['soluong'] =   $cart_hientai['dssp'][$id_sanpham]['soluong'] + $soluong;
        }

        $this->LuuGioHang($cart_hientai);
       
    }
    public function TinhTongTien(&$cart_hientai){
        $tong_tien_tam_thoi  = 0;
        foreach($cart_hientai['dssp'] as &$sp){
            $thanh_tien = $sp['soluong']*$sp['gia'];
            $sp['thanh_tien'] = $thanh_tien;
            $tong_tien_tam_thoi += $thanh_tien;
        }
         $cart_hientai['tong_tien'] = $tong_tien_tam_thoi;
         return  $cart_hientai;
    }

    public function LayGioHang(){
        $cart_hientai = $this->request->session()->get($this->cart_key);
        return $cart_hientai;
    }
    public function LuuGioHang($giohangtam){
        $this->TinhTongTien($giohangtam);
        //luu gia tri gio hang vao session
        $this->request->session()->put($this->cart_key,$giohangtam);
       
    }
    public function Xoa($idsp){
        $cart_hientai = $this->LayGioHang();
        if(isset($cart_hientai['dssp'][$idsp])){
            unset($cart_hientai['dssp'][intval($idsp)]);
        }
        $this->LuuGioHang($cart_hientai);
    }
}
