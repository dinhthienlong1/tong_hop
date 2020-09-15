<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'Contacts';
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'city',
        'country',
        'job_title'       
    ];
}
