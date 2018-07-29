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
            $table->string('email')->unique();
            $table->text('bio')->nullable();
            $table->string('subject')->nullable();
            $table->string('profile_picture');
            $table->string('password');
            $table->boolean('passed_out')->default(false);
            $table->rememberToken();
            $table->timestamps();

            $table->integer('guardian_id')->unsigned()->nullable();
            $table->integer('school_id')->unsigned()->nullable();
            $table->integer('standard_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            //
        });
    }
}
