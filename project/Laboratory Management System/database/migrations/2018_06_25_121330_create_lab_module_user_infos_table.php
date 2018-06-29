<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabModuleUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_module_user_infos', function (Blueprint $table) {
            $table->increments('labModuleUserInfo_id');
            $table->integer('userInfo_id')->unsigned();
            $table->foreign('userInfo_id')->references('userInfo_id')->on('userInfos');

            $table->integer('lab_module_id')->unsigned();
            $table->foreign('lab_module_id')->references('lab_module_id')->on('labModules');
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
        Schema::dropIfExists('lab_module_user_infos');
    }
}
