<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class Positions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $positions = ['PHP developer', 'Javasvript developer', 'Ruby developer', 'C++ developer', 'C# developer', 'NodeJs developer', 'Arduino Tutor', 'Frontend Developer', 'Fullstack developer', 'Python developer', 'Go developer', 'Data Scientist'];

        foreach($positions as $position){
            DB::table('positons')->insert([
                'position' => $position
            ]);
        }
    }
}
