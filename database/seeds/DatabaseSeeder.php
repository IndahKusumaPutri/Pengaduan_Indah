<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(PetugasSeeder::class);
        $this->call(UserSeeder::class);
        // php artisan db:seed --class=IndoRegionSeeder
    }
}
