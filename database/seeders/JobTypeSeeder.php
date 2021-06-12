<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_types')->insert([
            'id' => 1,
            'name' => 'Contract',
            'created_by' => 1,
            'created_at' => now(),
        ]);

        DB::table('job_types')->insert([
            'id' => 2,
            'name' => 'Freelance',
            'created_by' => 1,
            'created_at' => now(),
        ]);

        DB::table('job_types')->insert([
            'id' => 3,
            'name' => 'Full Time/Permanent',
            'created_by' => 1,
            'created_at' => now(),
        ]);

        DB::table('job_types')->insert([
            'id' => 4,
            'name' => 'Internship',
            'created_by' => 1,
            'created_at' => now(),
        ]);

        DB::table('job_types')->insert([
            'id' => 5,
            'name' => 'Part Time',
            'created_by' => 1,
            'created_at' => now(),
        ]);
    }
}
