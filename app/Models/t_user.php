<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_user extends Model
{
    use HasFactory;

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'mail',
        'password',
        'employee_id',
        'valid_until_for_pw',
        'note',
        'role',
        'created_datetime',
        'modified_user',
        'modified_datetime',
        'del_f'
    ];

    protected $dates = [
        'created_datetime',
        'modified_datetime'
    ];

    protected $rules = [
        'name'          => 'nullable',
        'mail'          => 'nullable',
        'employee_id'   => 'nullable',
        'valid_until_for_pw'    => 'nullable',
        'note'          => 'nullable',
        'role'          => 'nullable',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
