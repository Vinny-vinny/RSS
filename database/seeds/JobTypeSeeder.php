<?php

use Illuminate\Database\Seeder;
use App\JobType;
class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JobType::create(['name' =>'FULL TIME']);
        JobType::create(['name' =>'INTERN']);
        JobType::create(['name' =>'PART TIME']);
    }
}
