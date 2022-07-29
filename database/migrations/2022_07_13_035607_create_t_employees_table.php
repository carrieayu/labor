<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('kana');
            $table->string('birthday');
            $table->string('phone_no1');
            $table->string('phone_no2');
            $table->string('mail');
            $table->string('postal_code');
            $table->string('address');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_no');
            $table->timestamp('hire_date');
            $table->timestamp('retirement_date');
            $table->string('guarantor_name');
            $table->string('guarantor_phone_no1');
            $table->string('guarantor_phone_no2');
            $table->string('guarantor_postal_code');
            $table->string('guarantor_address');
            $table->string('guarantor_relationship');
            $table->string('insurance_card_no');
            $table->string('employee_key');
            $table->string('official_position');
            $table->string('contract_code');
            $table->string('contract_type');
            $table->string('salary_type');
            $table->string('working_hours_per_day');
            $table->string('note');
            $table->string('reason_for_retirement');
            $table->string('created_user')->default('SYSTEM');
            $table->timestamp('created_datetime')->useCurrent();
            $table->string('modified_user');
            $table->timestamp('modified_datetime');
            $table->integer('del_f')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_employees');
    }
}
