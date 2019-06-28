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
            $table->integer('student_id');
            $table->bigInteger('batch_id')->unsigned();
            $table->bigInteger('degree_id')->unsigned();
            $table->string('roll');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('registration_code');
            $table->boolean('is_registered')->default(0);
            $table->boolean('is_active')->default(0);
            $table->rememberToken();

            $table->foreign('batch_id')
                ->references('id')->on('batches')
                ->onDelete('cascade');

            $table->foreign('degree_id')
                ->references('id')->on('degrees')
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
        Schema::dropIfExists('students');
    }
}
