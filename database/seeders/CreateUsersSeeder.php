<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => '',
            'email' => 'admin@digitalcv.com',
            'password' => Hash::make('123456'),
            'is_admin' => 1,
            'email_verified_at' => '2021-06-09 06:29:35',
            'phone' => '+918840616092',
            'phone_verified_at' => '2021-06-09 14:58:25',
            'created_at' => now(),

        ]);

        DB::table('users')->insert([
            'first_name' => 'Amit',
            'last_name' => 'Verma',
            'email' => 'admin1@digitalcv.com',
            'password' => Hash::make('123456'),
            'is_admin' => 0,
            'email_verified_at' => '2021-06-09 06:29:35',
            'company_name' => 'Curunk Technologies',
            'phone' => '+917388272822',
            'phone_verified_at' => '2021-06-09 14:58:25',
            'designation' => 'HR',
            'created_at' => now(),


        ]);
    }
}
