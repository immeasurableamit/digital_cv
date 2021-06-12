<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DegreeLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table( 'degree_levels')->insert([
            'id' => 1,
            'name' => 'Diploma',
            'created_by' => 1,
            'created_at' => now(),
        ]);

        DB::table( 'degree_levels')->insert([
            'id' => 2,
            'name' => 'B.Tech',
            'created_by' => 1,
            'created_at' => now(),
        ]);

        DB::table( 'degree_levels')->insert([
            'id' => 3,
            'name' => 'M.Tech',
            'created_by' => 1,
            'created_at' => now(),
        ]);
    }
}
