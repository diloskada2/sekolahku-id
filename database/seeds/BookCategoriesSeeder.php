<?php

use Illuminate\Database\Seeder;
use App\BookCategory;


class BookCategories extends Seeder
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
                "book_category_name" => "Anak-Anak",
                "book_category_desc" => "Anak-Anak adalah ...."
            ],
            [
                "book_category_name" => "Wirausaha",
                "book_category_desc" => "Wirausah adalah ...."
            ],
            [
                "book_category_name" => "Keluarga",
                "book_category_desc" => "Keluarga adalah ...."
            ]
        );

        foreach ($data as $key => $value) {
            BookCategory::create($value);
        }
    }
}