<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $guarded = [];

    static function getData($request) {
        $query = "SELECT * FROM classes";

        return \DB::select($query);
    }

    static function readData($id) {
        $query = "SELECT * FROM classes AS c WHERE c.id = $id";

        return \DB::select($query)[0];
    }
}
