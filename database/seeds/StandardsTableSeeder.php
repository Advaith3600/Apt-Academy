<?php

use App\Standard;
use Illuminate\Database\Seeder;

class StandardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $syllabus = ['CBSE', 'State'];
        $classes = [8, 9, 10, '11 Science', '11 Commerce', '12 Science', '12 Commerce'];
        $extras = [['B.com', null], ['English Special', 'Grammar']];

        foreach ($syllabus as $syl) {
            foreach ($classes as $class) {
                Standard::create([
                    'syllabus' => $syl,
                    'class' => $class
                ]);
            }
        }

        foreach ($extras as $extra) {
            Standard::create([
                'syllabus' => $extra[1],
                'class' => $extra[0]
            ]);
        }
    }
}
