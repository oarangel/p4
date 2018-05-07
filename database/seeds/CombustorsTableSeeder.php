<?php

use Illuminate\Database\Seeder;
use App\Combustor;

class CombustorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $combustors = [
            ['7EA','DLN1.0', 'Water', '60HZ'],
            ['7FA','DLN2.6', 'Steam', '60HZ'],
            ['9EA','MNQC', 'None', '50HZ'],
            ['6FA','DLN2.0', 'Water', '50HZ', 'Droop'],
            ['Standard', 'Water', '60HZ', 'Black Start'],
        ];
        $count = count($combustors);

        foreach ($combustors as $key => $combustorData) {

            # First, figure out the id of the author we want to associate with this book

            # Extract just the last name from the book data...
            # F. Scott Fitzgerald => ['F.', 'Scott', 'Fitzgerald'] => 'Fitzgerald'
            #$name = explode(' ', $projectData[1]);
            #$lastName = array_pop($name);

            # Find that author in the authors table
            #$author_id = Author::where('last_name', '=', $lastName)->pluck('id')->first();

            $combustor = new Combustor();
            $combustor->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $combustor->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $combustor->Combustor_Type = $combustorData[0];
            $combustor->Nox_Injection = $combustorData[1]; # Remove the old way we stored the author
            #$project->author_id = $author_id; # Add the new way we store the author
            $combustor->Frequency = $combustorData[2];
            $combustor->Generator_Mode = $combustorData[3];
            $combustor->save();
            $count--;
        }

    }
}
