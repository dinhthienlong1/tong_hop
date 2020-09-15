<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class sanphamModel extends Model
{
    public function layhet($limit=3)
    {
       
        $data =  DB::table('san_pham')
        ->leftJoin('danh_muc', 'san_pham.id_dm', '=', 'danh_muc.id')
        ->select('san_pham.*','danh_muc.ten as ten_danh_muc')
        ->limit($limit)
        ->get();
        return $data;
       
    }
    public function layid($idsp){
        $data = DB::table('san_pham')->where('id','=',$idsp)->first();
        return $data;
    }
}
