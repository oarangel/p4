<?php

use Illuminate\Database\Seeder;
use App\Project;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = [
            ['Full Panel Replacement', '7FA', 'MKV', 'Dual', 'Base'],
            ['Migration', '51P', 'MKII', 'Liquid', 'Peak'],
            ['Full Panel Replacement', '61B', 'MKIV', 'Gas', 'Peak'],
            ['Full Panel Replacement', '7EA', 'MKV', 'Dual', 'Base'],
            ['Migration', '6FA', 'MKV', 'Gas', 'Base'],
            ['Migration', '7FA', 'MKVI', 'Gas', 'Base'],
        ];

        $count = count($projects);

        foreach ($projects as $key => $projectData) {

            # First, figure out the id of the frame size we want to associate with this project

            # Extract just the last name from the book data...
            # F. Scott Fitzgerald => ['F.', 'Scott', 'Fitzgerald'] => 'Fitzgerald'
            #$name = explode(' ', $projectData[1]);
            #$lastName = array_pop($name);

            # Find that frame size in the frame size table
            #$frame_size_id = Project::where('Frame_Size_id', '=', $projectData[1])->pluck('id')->first();

            $project = new Project();
            $project->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $project->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $project->Upgrade_Type = $projectData[0];
            $project->Frame_Size = $projectData[1]; # Remove the old way we stored the Frame Size
            #$project->Frame_Size_id = $frame_size_id; # Add the new way we store the author
            $project->Original_Control = $projectData[2];
            $project->Fuel_Type = $projectData[3];
            $project->Operation = $projectData[4];
            $project->save();
            $count--;
        }
    }
}
