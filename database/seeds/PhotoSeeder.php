<?php

use Illuminate\Database\Seeder;
use App\Photo;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Photo::create([
            'title' => 'Sample Photo 1',
            'description' => 'This is a beautiful sample photo.',
            'file_path' => 'photo/avengers.jpg',
        ]);

        Photo::create([
            'title' => 'Sample Photo 2',
            'description' => 'Another stunning sample photo.',
            'file_path' => 'photo/batman.jpg',
        ]);
    }
}
