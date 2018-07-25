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
            $table->string('syllabus')->nullable();
            $table->string('class');
            $table->timestamps();
        });

        $syllabus = ['CBSE', 'State'];
        $classes = [8, 9, 10, 11, 12];
        $extras = [['B.com', null], ['English Special', 'Grammar']];

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

        foreach ($extras as $extra) {
            DB::table('standards')->insert(
                [
                    'syllabus' => $extra[1],
                    'class' => $extra[0]
                ]
            );
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
