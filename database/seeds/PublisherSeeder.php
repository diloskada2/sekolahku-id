<?php

use Illuminate\Database\Seeder;
use App\Publisher;
class PublisherSeeder extends Seeder
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
                "publisher_name" => "Iqshan",
                "addres"         => "Jalan Mayjend sutoyo ....",
                "phone_number"   => "085346265410 ...."
            ],
            [
                "publisher_name" => "Pramudya",
                "addres"         => "Balikpapan ....",
                "phone_number"   => "081234567893 ...."
            ],
            [
                "publisher_name" => "Hasmar",
                "addres"         => "Gunung Malang ....",
                "phone_number"   => "082398918212 ...."
            ]
        );

        foreach ($data as $key => $value) {
            Publisher::create($value);
        }
    }
}
