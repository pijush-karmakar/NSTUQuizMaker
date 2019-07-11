<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('degrees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('department_id')->unsigned();
            $table->string('short_title');
            $table->string('full_title');
            $table->timestamps();

            $table->foreign('department_id')
                ->references('id')->on('departments')
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
        Schema::dropIfExists('degrees');
    }
}
