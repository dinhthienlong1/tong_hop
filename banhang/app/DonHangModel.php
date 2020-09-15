<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DonHangModel extends Model
{
    //
    public function __construct()
    {
        
    }
    public function LayDonHang($id_donhang){
        $donhang = [
            'ten'=>'abc',
            'gia'=>'100000',
            'ct_donhang'=> [
                0=>['']
             ]

        ];
        $donhang = (array)DB::table('don_hang')
            ->where('id','=',$id_donhang)
            ->select('*')
            ->first();
        $ct_donhang = DB::table('ct_don_hang')
            ->leftJoin('san_pham','ct_don_hang.id_sp','=','san_pham.id')
            ->where('ct_don_hang.id_don_hang','=',$id_donhang)
            ->select('ct_don_hang.*','san_pham.ten_sp', 'san_pham.ma_sp', 'san_pham.hinh_anh')
            ->get()->toArray();
        $donhang['ct_donhang'] = $ct_donhang;
        return  $donhang;
    }
}
