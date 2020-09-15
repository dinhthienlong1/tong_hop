<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GiohangModel extends Model
{
    public $request;
    public $card_key = 'card';
    public function __construct($request)
    {

        $this->request = $request;
        if (!$this->request->session()->has($this->card_key)) {
            $card = [
                'dssp' => [],
                'tong_tien' => 0
            ];
            $this->luugiohang($card);
        }
    }
    public function themgiohang($id_sanpham, $so_luong)
    {
        $sanphamModel = new sanphamModel();
        $sanpham = $sanphamModel->layid($id_sanpham);
        $card_hientai = $this->laygiohang();
        if (empty($card_hientai['dssp'][$id_sanpham])) {
            $new_card_item = [
                'id_sanpham' => $sanpham->id,
                'ten' => $sanpham->ten_sp,
                'gia' => $sanpham->gia,
                'hinh_anh' => $sanpham->hinh_anh,
                'so_luong' => $so_luong
            ];
            $card_hientai['dssp'][$sanpham->id] = $new_card_item;
        } else {
            $card_hientai['dssp'][$id_sanpham] += $so_luong;
        }
        $this->luugiohang($card_hientai);
        
    }
    public function tinhtongtien(&$card_hientai)
    {
        $tong_tien_tam_thoi = 0;
        foreach ($card_hientai['dssp'] as &$sp) {
            $thanh_tien = $sp['so_luong'] * $sp['gia'];
            $sp['thanh_tien'] = $thanh_tien;
            $tong_tien_tam_thoi = $thanh_tien;
        }
        $card_hientai['tong_tien'] = $tong_tien_tam_thoi;

        return $card_hientai;
    }
    public function laygiohang()
    {
        $card_hientai = $this->request->session()->get($this->card_key);
        return $card_hientai;
    }
    public function luugiohang($giohangtam)
    {
        $this->tinhtongtien($giohangtam);
        $this->request->session()->put($this->card_key, $giohangtam);
    }
    public function xoa($id_sanpham){
        $card_hientai=$this->laygiohang();
        if(isset($card_hientai['dssp'][$id_sanpham])){
            unset($card_hientai['dssp'][intval($id_sanpham)]);
        }
        $this->luugiohang($card_hientai);
    }
}
