<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('test_id')->unsigned();
            $table->bigInteger('batch_id')->unsigned();
            $table->boolean('is_available');
            $table->dateTime('available_from');
            $table->dateTime('available_till');
            $table->integer('duration');
            $table->string('settings');
            $table->timestamps();

            $table->foreign('test_id')
                ->references('id')->on('tests')
                ->onDelete('cascade');

            $table->foreign('batch_id')
                ->references('id')->on('batches')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('test_assignments');
    }
}
