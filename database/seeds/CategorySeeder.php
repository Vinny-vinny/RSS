<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' =>'Accounting']);
        Category::create(['name' =>'Development']);
        Category::create(['name' =>'Technology']);
        Category::create(['name' =>'Media & News']);
        Category::create(['name' =>'Medical']);
        Category::create(['name' =>'Government']);
    }
}
