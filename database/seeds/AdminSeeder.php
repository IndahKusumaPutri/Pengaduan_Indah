<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nik' => '1234567812345678',
            'name' => 'Indah Kusuma Putri',
            'email' => 'indahputri@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('indah123')
        ]);
    }
}
