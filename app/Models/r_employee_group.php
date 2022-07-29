<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notification\Notifiable;

class r_employee_group extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'role',
        'created_user',
        'created_datetime',
        'modified_user',
        'modified_datetime',
        'del_f'
    ];

    

}
