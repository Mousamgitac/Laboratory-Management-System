<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('lab_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('date');
            $table->string('sex');
            $table->string('address');
            $table->string('province');
            $table->string('district');
            $table->string('mun');
            $table->string('contactNo');
            $table->string('mobNo');
            $table->string('email');
            $table->string('image')->nullable();
            $table->string('patientHistory');
            $table->string('diagnosis');
            $table->string('previousTest');
            $table->string('previousHospital');
            $table->string('doctor');
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
        Schema::dropIfExists('registrations');
    }
}
