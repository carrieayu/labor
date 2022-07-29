<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTIcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_ics', function (Blueprint $table) {
            $table->id();
            $table->string('state');
            $table->BigInteger('employee_id');
            $table->timestamp('valid_until_for_ic');
            $table->timestamp('date_allocated');
            $table->timestamp('date_released');
            $table->string('serial_no');
            $table->string('terminal_no');
            $table->string('input_class');
            $table->string('other_class');
            $table->string('logic_address1');
            $table->string('logic_address2');
            $table->string('note');
            $table->string('created_user')->default('SYSTEM');
            $table->timestamp('created_datetime')->useCurrent();
            $table->string('modified_user')->default('SYSTEM');
            $table->timestamp('modified_datetime')->useCurrent();
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
        Schema::dropIfExists('t_ics');
    }
}
