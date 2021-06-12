<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_skills')->insert([
            'id' => 1,
            'name' => 'Adobe Illustrator',
            'created_by' => 1,
            'created_at' => now(),
        ]);

        DB::table('job_skills')->insert([
            'id' => 2,
            'name' => 'Adobe Photoshop',
            'created_by' => 1,
            'created_at' => now(),
        ]);

        DB::table('job_skills')->insert([
            'id' => 3,
            'name' => 'PHP',
            'created_by' => 1,
            'created_at' => now(),
        ]);

        DB::table('job_skills')->insert([
            'id' => 4,
            'name' => 'Laravel',
            'created_by' => 1,
            'created_at' => now(),
        ]);

        DB::table('job_skills')->insert([
            'id' => 5,
            'name' => 'Python',
            'created_by' => 1,
            'created_at' => now(),
        ]);
    }
}
