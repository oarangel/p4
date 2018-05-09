<?php

use Illuminate\Database\Seeder;
use App\Project;
use App\Framesize;

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
            ['Full Panel', '7FA', 'MKV', 'Dual', 'Base'],
            ['Full Panel', '61B', 'MKIV', 'Gas', 'Peak'],
            ['Panel Insert', '7EA', 'MKV', 'Dual', 'Base'],
            ['Migration', '6FA', 'MKV', 'Gas', 'Base'],
            ['Migration', '7FA', 'MKVI', 'Gas', 'Base'],
            ['Migration', '51P', 'MKVI', 'Gas', 'Base'],
        ];

        $count = count($projects);

        foreach ($projects as $key => $projectData) {

            # First, figure out the id of the frame size we want to associate with this project

            # Extract just the last name from the book data...
            # F. Scott Fitzgerald => ['F.', 'Scott', 'Fitzgerald'] => 'Fitzgerald'
            $name = explode(' ', $projectData[1]);
            $frameName = array_pop($name);

            # Find that frame size in the frame size table
            $framesize_id = Framesize::where('size', '=', $frameName)->pluck('id')->first();


            $project = new Project();
            $project->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $project->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $project->upgrade_type = $projectData[0];
            #$project->frame_size = $projectData[1]; # Remove the old way we stored the Frame Size
            $project->framesize_id = $framesize_id; # Add the new way we store the author
            $project->original_control = $projectData[2];
            $project->fuel_type = $projectData[3];
            $project->operation = $projectData[4];
            $project->save();
            $count--;
        }
    }
}
