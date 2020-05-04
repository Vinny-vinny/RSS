<?php

use Illuminate\Database\Seeder;
use App\Location;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create(['name'=>'Nairobi']);
        Location::create(['name'=>'Mombasa']);
        Location::create(['name'=>'Kisumu']);
        Location::create(['name'=>'Busia']);
        Location::create(['name'=>'Migori']);
        Location::create(['name'=>'Kakamega']);
    }
}
