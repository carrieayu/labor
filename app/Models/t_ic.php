<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_ic extends Model
{
    use HasFactory;

    protected $fillable = [
        'state',
        'employee_id',
        'valid_until_for_ic',
        'date_allocated',
        'date_released',
        'serial_no',
        'terminal_no',
        'input_class',
        'other_class',
        'logic_address1',
        'logic_address2',
        'note'
    ];
}
