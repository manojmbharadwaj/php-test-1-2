<?php

use Illuminate\Support\Str;
use Faker\Factory as Faker;
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
        $faker = Faker::create('App\User');
        for ($i = 1; $i <= 10; $i++) {
            $user = [
                'name' => $faker->name,
                'email' => $faker->safeEmail,
                'phone' => $faker->numberBetween($min = 7777777777, $max = 9999999999),
                'city' => $faker->city,
            ];
            DB::table('users')->insert($user);
        }
    }
}
