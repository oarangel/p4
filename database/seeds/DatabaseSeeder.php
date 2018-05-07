<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        $this->call(FramesizesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
    }
}
