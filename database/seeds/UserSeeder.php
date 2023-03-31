<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'nik' => '3276044606040002',
            'name' => 'Erlia Afriyanti',
            'email' => 'akunerlia@gmail.com',
            'password' => bcrypt('erlia123'),
            'role' => 'masyarakat'
        ]);

        DB::table('users')->insert([
            'nik' => '3276046205030004',
            'name' => 'Amelia Ulliya',
            'email' => 'ameliaulliya22@gmail.com',
            'password' => bcrypt('amel123'),
            'role' => 'masyarakat'
        ]);

        DB::table('users')->insert([
            'nik' => '3276046809050002',
            'name' => 'Arwanda Sabila',
            'email' => 'arwanda123@gmail.com',
            'password' => bcrypt('wanda123'),
            'role' => 'masyarakat'
        ]);

        DB::table('users')->insert([
            'nik' => '3276042009040002',
            'name' => 'Iqbal Hayatul Fajri',
            'email' => 'iqbalhayatul0202@gmail.com',
            'password' => bcrypt('iqbal123'),
            'role' => 'masyarakat'
        ]);

        DB::table('users')->insert([
            'nik' => '3276044608030001',
            'name' => 'Hafifah Anis Wijayanti',
            'email' => 'hafifah.anis@gmail.com',
            'password' => bcrypt('hafifah123'),
            'role' => 'masyarakat'
        ]);

        DB::table('users')->insert([
            'nik' => '3276042009040006',
            'name' => 'Ahmad Faqih Yusuf',
            'email' => 'ahmad.faqih@gmail.com',
            'password' => bcrypt('faqih123'),
            'role' => 'masyarakat'
        ]);

        DB::table('users')->insert([
            'nik' => '3305126604050001',
            'name' => 'Rahma Amanila',
            'email' => 'rahma.sekolah@gmail.com',
            'password' => bcrypt('rahma123'),
            'role' => 'masyarakat'
        ]);

        DB::table('users')->insert([
            'nik' => '3202986570070076',
            'name' => 'Masyarakat',
            'email' => 'masyarakat@gmail.com',
            'password' => bcrypt('11111111'),
            'role' => 'masyarakat'
        ]);
        
    }
}
