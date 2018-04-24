<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStandardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('syllabus');
            $table->integer('class');
            $table->timestamps();
        });

        $syllabus = ['CBSE', 'State'];
        $classes = [8, 9, 10, 11, 12];

        foreach ($syllabus as $syl) {
            foreach ($classes as $class) {
                DB::table('standards')->insert(
                    [
                        'syllabus' => $syl,
                        'class' => $class
                    ]
                );
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('standards');
    }
}
