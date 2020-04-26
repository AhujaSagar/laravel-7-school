<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('courses_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('professor');
            $table->integer('duration');
            $table->decimal('fees',5,0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses_infos');
    }
}
