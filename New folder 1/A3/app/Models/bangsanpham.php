<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class bangsanpham extends Model
{
	protected $table = 'don_hang';
    protected $fillable = ['id','tong_tien','ghi_chu','ngay_tao','ten_kh','sdt','dia_chi_giao_hang'];
}
