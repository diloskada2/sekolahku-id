<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    protected $guarded = [];

    static function getData($request) {
        $query = "SELECT * FROM blog_categories";

        return \DB::select($query);
    }

    static function readData($id) {
        $query = "SELECT * FROM blog_categories AS bc WHERE bc.id = $id";

        return \DB::select($query)[0];
    }
}
