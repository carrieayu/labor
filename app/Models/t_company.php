<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_company extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'service_person',
        'phone_no1',
        'phone_no2',
        'postal_code',
        'address',
        'note',
        'created_user',
        'created_datetime',
        'modified_user',
        'modified_datetime',
        'del_f',
        'created_at',
        'updated_at'
    ];
}
