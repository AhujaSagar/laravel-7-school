<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesOfferedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('courses_offered', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->integer('school_id')->unsigned();
        });
       
        Schema::table('courses_offered', function($table) {
            $table->foreign('course_id')->references('id')->on('courses_infos');
            $table->foreign('school_id')->references('id')->on('school_infos');
            });
      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_offered');
    }
}
