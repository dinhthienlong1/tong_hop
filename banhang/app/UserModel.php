<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserModel extends Model
{
    //
    public function LayHet(){
        $users = DB::table('users')->paginate(3);
        return $users;
    }

    public function Xoa($user_id){

    }
    public function CapNhat($user = []){

    }
    public function Them($user = []){
        $rs = DB::table('users')->insert($user);
        //var_dump($rs);
        //exit;
    }
}
