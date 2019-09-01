<?php

use Illuminate\Database\Seeder;
use App\StudentTrack;

class StudentTrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {        
        
        $data = array(
            [
                "track_name" => "IPA",                
            ],
            [
                "track_name" => "IPS",                
            ],
            [
                "track_name" => "BHS.INDONESIA",                
            ],
            [
                "track_name" => "BHS.INGGRIS",                
            ],
            [
                "track_name" => "AGAMA",                
            ],
            [
                "track_name" => "PENJAS",                
            ]            
        );

        foreach ($data as $key => $value) {
            StudentTrack::create($value);
        }
    }
}
