<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        $tags = ['island', 'blackstart', 'isochronous', 'isochshare','agc'];

        foreach ($tags as $tagname) {

        $tag =new Tag();
        $tag ->name = $tagname;
        $tag ->save();

        }
    }
}
