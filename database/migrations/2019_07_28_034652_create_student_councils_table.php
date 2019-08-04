<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentCouncilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_councils', function (Blueprint $table) {
            $table->increments('id');
            $table->string('leader');
            $table->string('2nd_leader');
            $table->string('secretary');
            $table->string('treasurer');
            $table->string('coach');
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
        Schema::dropIfExists('student_councils');
    }
}
