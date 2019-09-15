<?php

use Illuminate\Database\Seeder;
use App\Classes;

class ClassesSeeder extends Seeder
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
                "class_name" => "rpl",
                "class_leader" => "arya",
                "class_2nd_leader" => "lutpi",
                "class_treasurer" => "siska",
                "class_secretary" => "shanaz"
            ],
            [
                "class_name" => "tkj",
                "class_leader" => "hiya",
                "class_2nd_leader" => "entah",
                "class_treasurer" => "tak tau",
                "class_secretary" => "tak mau tau"
            ],
            [
                "class_name" => "mm",
                "class_leader" => "oo",
                "class_2nd_leader" => "uuu",
                "class_treasurer" => "gelo",
                "class_secretary" => "ahh masa"
            ]
        );

        foreach ($data as $key => $value) {
            Classes::create($value);
        }
    }
}
