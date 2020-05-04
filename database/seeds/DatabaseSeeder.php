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
         $this->call(UsersSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(JobTypeSeeder::class);
         $this->call(LocationSeeder::class);
         $this->call(VacancySeeder::class);
    }
}
