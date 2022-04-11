<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'faizfajar',
            'email' => 'faiz@gmail.com',
            'nik' => '1920100289',
            'password' => bcrypt('password'),
        ]);
    }

}
