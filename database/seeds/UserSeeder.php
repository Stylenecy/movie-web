<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i=0;$i<1000;$i++)
        {
            DB::table('user')->insert([
                'nik' => $faker->numberBetween(1000, 9999),
                'nama' => $faker->name,
                'username' => $faker->email,
                'password' => $faker->password,
            ]);
        }
    }
}
