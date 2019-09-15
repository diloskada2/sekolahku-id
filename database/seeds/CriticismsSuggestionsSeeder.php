<?php

use Illuminate\Database\Seeder;
use App\CriticismCategories;

class CriticismsSuggestionsSeeder extends Seeder {
    public function run() {
        $data = array(
            [
                "type"          => "Suggestions",
                "description"   => "lorem ipsum dolor sit amet"
            ],
            [
                "type"          => "Criticisms",
                "description"   => "lorem ipsum dolor sit amet"
            ],
            [
                "type"          => "Suggestions",
                "description"   => "lorem ipsum dolor sit amet"
            ]
        );

        foreach ($data as $key => $value) {
            CriticismCategories::create($value);
        }
    }
}
