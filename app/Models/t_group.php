<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color_code',
        'note',
        'created_user',
        'note',
        'created_user',
        'created_datetime',
        'modified_user',
        'modified_datetime',
        'del_f',
        'created_at',
        'updated_at',
    ];
}
