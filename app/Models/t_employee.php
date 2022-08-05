<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class t_employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kana',
        'birthday',
        'phone_no1',
        'phone_no2',
        'mail',
        'postal_code',
        'address',
        'emergency_contact_name',
        'emergency_contact_no',
        'hire_date',
        'retirement_date',
        'guarantor_name',
        'guarantor_phone_no1',
        'guarantor_phone_no2',
        'guarantor_postal_code',
        'guarantor_address',
        'guarantor_relationship',
        'insurance_card_no',
        'employee_key',
        'official_position',
        'contract_code',
        'contract_type',
        'salary_type',
        'working_hours_per_day',
        'note',
        'reason_for_retirement',
        'created_user',
        'created_datetime',
        'modified_user',
        'modified_datetime',
        'del_f',
        'created_at',
        'updated_at',
    ];
}
