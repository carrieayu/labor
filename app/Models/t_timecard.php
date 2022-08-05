<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_timecard extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'serial_no',
        'start_date',
        'end_date',
        'note',
        'start_time',
        'end_time',
        'created_user',
        'created_datetime',
        'modified_user',
        'modified_datetime',
        'del_f',
        'created_at',
        'updated_at',
    ];
}
