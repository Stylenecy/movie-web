<?php

use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('movie')->insert([
                'ImDB' => '111333',
                'title' => 'Avengers',
                'year' => '2013',
                'genre' => 'Action',
                'poster' => 'avengers.jpg',
            ]);
    }
}
