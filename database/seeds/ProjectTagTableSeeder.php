<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Project;

class ProjectTagTableSeeder extends Seeder
{
    public function run()
    {
        # First, create an array of all the upgrade types we want to associate tags with
        # The *key* will be the project upgrade type, and the *value* will be an array of tags.
        $projects = [
            'Full Panel' => ['island', 'isochronous', 'isochshare', 'agc'],
            'Migration' => ['island', 'blackstart', 'isochronous', 'agc'],
            'Panel Insert' => ['island', 'blackstart', 'isochronous', 'isochshare']
        ];

        # Now loop through the above array, creating a new pivot for each project to tag
        foreach ($projects as $upgrade_type => $tags) {

            # First get the project
            $project = Project::where('upgrade_type', 'like', $upgrade_type)->first();

            # Now loop through each tag for this project, adding the pivot
            foreach ($tags as $tagName) {
                $tag = Tag::where('name', 'LIKE', $tagName)->first();

                # Connect this tag to this book
                $project->tags()->save($tag);
            }
        }
    }

}
