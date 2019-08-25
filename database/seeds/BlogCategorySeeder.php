<?php

use Illuminate\Database\Seeder;
use App\BlogCategory;

class BlogCategorySeeder extends Seeder
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
                "blog_category_name" => "Fiksi",
                "blog_category_description" => "Kategori fiksi adalah ...."
            ],
            [
                "blog_category_name" => "Pendidikan",
                "blog_category_description" => "Kategori pendidikan adalah ...."
            ]
        );

        foreach ($data as $key => $value) {
            BlogCategory::create($value);
        }
    }
}
