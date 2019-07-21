<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nisn');
            $table->string('nis');
            $table->string('birth_date');
            $table->string('blood_type');
            $table->text('address');
            $table->integer('class_id')->nullable();
            $table->integer('student_track_id')->nullable();
            $table->integer('extracurricular1_id')->nullable();
            $table->integer('extracurricular2_id')->nullable();
            $table->integer('extracurricular3_id')->nullable();
            $table->integer('extracurricular4_id')->nullable();
            $table->integer('religion_id')->unsigned();
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
        Schema::dropIfExists('students');
    }
}
