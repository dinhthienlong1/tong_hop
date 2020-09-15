<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SanPhamModel extends Model
{
    //
    public function TimKiem($tu_khoa = '', $limit = 8){
        $data =  DB::table('san_pham')
        ->leftJoin('danh_muc', 'san_pham.id_dm', '=', 'danh_muc.id')
        ->select('san_pham.*','danh_muc.ten as ten_danh_muc')
        ->where('ten_sp','like','%'.$tu_khoa.'%')
        ->orWhere('ma_sp','=',$tu_khoa)
        ->limit($limit)
        ->get();
        return $data;
    }
    public function LayDanhSachOTrangChu($limit = 8){
        $data =  DB::table('san_pham')
        ->leftJoin('danh_muc', 'san_pham.id_dm', '=', 'danh_muc.id')
        ->select('san_pham.*','danh_muc.ten as ten_danh_muc')
        ->limit($limit)
        ->get();
        return $data;
    }
    public function LayBangId($idsp){
  
        $data =  DB::table('san_pham')->where('id','=',$idsp)->first();
        //
        return $data;
    }
}
