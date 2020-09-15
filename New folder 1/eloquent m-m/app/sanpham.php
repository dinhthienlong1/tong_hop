<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    protected $guarded = []; 
    public function cat(){
        return $this->hasMany(danhmuc::class,'id','danhmuc_id');
    }
}
