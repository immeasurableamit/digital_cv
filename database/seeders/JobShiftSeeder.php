<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table( 'job_shifts')->insert([
            'id' => 1,
            'name' => 'First Shift (Day)',
            'created_by' => 1,
            'created_at' => now(),
        ]);

        DB::table( 'job_shifts')->insert([
            'id' => 2,
            'name' => 'Second Shift (Afternoon)',
            'created_by' => 1,
            'created_at' => now(),
        ]);

        DB::table( 'job_shifts')->insert([
            'id' => 3,
            'name' => 'Third Shift (Night)',
            'created_by' => 1,
            'created_at' => now(),
        ]);

        DB::table( 'job_shifts')->insert([
            'id' => 4,
            'name' => 'Rotating',
            'created_by' => 1,
            'created_at' => now(),
        ]);
    }
}
