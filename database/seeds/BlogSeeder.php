<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Blog;

class BlogSeeder extends Seeder {
    public function run() {
        $blog = [
            "title"         => "Ulang Tahun SMK Negeri 2 Balikpapan",
            "content"       => "Lorep ipsum dolor sit amet ...",
            "thumbnail_url" => "https://cdn1-production-images-kly.akamaized.net/YLd9k_f5VDsq8-SxXNB-N5bBEIA=/640x360/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/2032322/original/081083500_1522055055-039911000_1491810824-ilustrasikucing.jpg",
        ];

        Blog::create($blog);
    }
}
