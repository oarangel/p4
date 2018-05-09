<?php

use Illuminate\Database\Seeder;
use App\Framesize;

class FramesizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $framesizes = [
            ['7EA','DLN1.0', 'Water', '60HZ'],
            ['7FA','DLN2.6', 'Steam', '60HZ'],
            ['9FA','DLN2.6', 'Steam', '50HZ'],
            ['61B','MNQC', 'None', '50HZ'],
            ['6FA','DLN2.0', 'Water', '50HZ'],
            ['71B', 'Standard', 'Water', '60HZ'],
            ['51P', 'Standard', 'Water', '60HZ'],
        ];

        $count = count($framesizes);

        foreach ($framesizes as $key => $framesizeData) {

            # First, figure out the id of the author we want to associate with this book



            # Find that author in the authors table
            #$author_id = Author::where('last_name', '=', $lastName)->pluck('id')->first();

            $framesize = new Framesize();
            $framesize->created_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $framesize->updated_at = Carbon\Carbon::now()->subDays($count)->toDateTimeString();
            $framesize->size = $framesizeData[0];
            $framesize->combustor_type = $framesizeData[1];
            $framesize->nox_injection = $framesizeData[2];
            $framesize->Frequency = $framesizeData[3];
            $framesize->save();
            $count--;
        }
    }
}
