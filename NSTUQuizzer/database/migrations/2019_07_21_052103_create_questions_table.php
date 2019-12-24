<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('topic_id')->unsigned();
            $table->bigInteger('qsn_type_id')->unsigned();
            $table->text('qsn_title');
            $table->integer('default_point');
            $table->boolean('settings')->default(0);
            $table->timestamps();

             $table->foreign('topic_id')
                ->references('id')->on('topics')
                ->onDelete('cascade');

             $table->foreign('qsn_type_id')
                ->references('id')->on('qsn_types')
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
        Schema::dropIfExists('questions');
    }
}
