<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_info_departments', function (Blueprint $table) {
            $table->increments('userInfoDepartment_id');
            $table->integer('userInfo_id')->unsigned();
            $table->foreign('userInfo_id')->references('userInfo_id')->on('userInfos');

            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('department_id')->on('departments');
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
        Schema::dropIfExists('user_info_departments');
    }
}
