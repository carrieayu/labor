<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateREmployeeGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('r_employee_groups', function (Blueprint $table) {
            $table->id();
            $table->string('group_id');
            $table->string('role');
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
        Schema::dropIfExists('r_employee_groups');
    }
}
