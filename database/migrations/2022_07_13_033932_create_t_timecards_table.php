<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTTimecardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_timecards', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('employee_id');
            $table->string('serial_no');
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time');
            $table->time('end_time');
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
        Schema::dropIfExists('t_timecards');
    }
}
