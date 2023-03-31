<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nik' => '3276044407040005',
            'name' => 'Wulan Mandam Sari',
            'email' => 'wulanmandamsari00@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'petugas'
        ]);

        DB::table('users')->insert([
            'nik' => '3175026701050001',
            'name' => 'Nayla Zahra',
            'email' => 'naylazahra.tugas@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'petugas'
        ]);

        DB::table('users')->insert([
            'nik' => '3201135511040011',
            'name' => 'Silvi Fitriani',
            'email' => 'silviftrn@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'petugas'
        ]);

        DB::table('users')->insert([
            'nik' => '3254676874576387',
            'name' => 'Petugas',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'petugas'
        ]);

       
    }
}
