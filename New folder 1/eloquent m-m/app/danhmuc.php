<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
 protected $filltabl=['id','danhmuc_sp']; 
 public function sanphams(){
    return $this->hasMany(sanpham::class,'danhmuc_id','id');
}
}
