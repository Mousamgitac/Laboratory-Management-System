<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessLevelUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('access_level_user_infos', function (Blueprint $table) {
           $table->increments('accesslevelUserInfo_id');
            $table->integer('userInfo_id')->unsigned();
            $table->foreign('userInfo_id')->references('userInfo_id')->on('userInfos');

            $table->integer('access_level_id')->unsigned();
            $table->foreign('access_level_id')->references('access_level_id')->on('access_levels');
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
        Schema::dropIfExists('access_level_user_infos');
    }
}
