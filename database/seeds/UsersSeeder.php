<?php

use App\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'code_no' => $faker->numberBetween(1,1000),
            'title' => 'System Admin',
            'join_date' => now(),
            'email_verified_at' => now(),
            'password' => bcrypt('Qwerty123!'), // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'name' => 'VinnyVinny',
            'email' => 'kituyiv@gmail.com',
            'code_no' => $faker->numberBetween(1,1000),
            'title' => 'Super Admin',
            'join_date' => now(),
            'email_verified_at' => now(),
            'password' => bcrypt('Qwerty123!'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
