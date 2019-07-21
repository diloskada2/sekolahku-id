<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    protected $guarded = [];

    static function getData($request) {
        $query = "SELECT * FROM courses";

        return \DB::select($query);
    }

    static function readData($id) {
        $query = "SELECT * FROM courses AS c WHERE c.id = $id";

        return \DB::select($query)[0];
    }
}
