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
            $table->string('student_id')->unique();

            $table->bigInteger('batch_id')->unsigned();
            $table->bigInteger('degree_id')->unsigned();

            $table->integer('roll');
            $table->string('email')->unique();
            $table->string('reg_code')->unique();
            $table->boolean('is_registered')->default(0);;
            $table->boolean('is_active')->default(0);;
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

             $table->foreign('batch_id')
                ->references('id')->on('batches')
                ->onDelete('cascade');

            $table->foreign('degree_id')
                ->references('id')->on('degrees')
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
        Schema::dropIfExists('students');
    }
}
