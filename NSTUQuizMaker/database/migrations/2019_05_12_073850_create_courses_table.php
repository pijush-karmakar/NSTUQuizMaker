<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('batch_id')->unsigned();
            $table->Integer('teacher_id')->unsigned();
            $table->string('course_code');
            $table->string('title');
            $table->string('term');
            $table->double('credit');
            $table->double('credit_hours');
            $table->string('abstract');
            $table->text('description');

            $table->foreign('batch_id')
                ->references('id')->on('batches')
                ->onDelete('cascade');
            $table->foreign('teacher_id')
                ->references('id')->on('teachers')
                ->onDelete('cascade');

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
        Schema::dropIfExists('courses');
    }
}
