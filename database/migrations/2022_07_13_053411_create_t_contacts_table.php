<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_contacts', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_user');
            $table->timestamp('application_datetime');
            $table->string('target_user');
            $table->string('target_group');
            $table->timestamp('target_date');
            $table->string('application_type');
            $table->string('application_reason');
            $table->timestamp('start_time');
            $table->timestamp('schedule_start_time');
            $table->timestamp('end_time');
            $table->timestamp('schedule_end_time');
            $table->timestamp('rest_time');
            $table->string('approve_user');
            $table->timestamp('approve_datetime');
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
        Schema::dropIfExists('t_contacts');
    }
}
