<?php

use Illuminate\Database\Seeder;
use App\Blog;

class BlogSeeder extends Seeder {
    public function run() {
        $data = array(
            [
                "title"         => "Suggestions",
                "content"       => "lorem ipsum dolor sit amet",
                "thumbnail_url" => "image.png"
            ],
            [
                "title"         => "Suggestions",
                "content"       => "lorem ipsum dolor sit amet",
                "thumbnail_url" => "image.png"
            ],
            [
                "title"         => "Suggestions",
                "content"       => "lorem ipsum dolor sit amet",
                "thumbnail_url" => "image.png"
            ]
        );

        foreach ($data as $key => $value) {
            Blog::create($value);
        }
    }
}
