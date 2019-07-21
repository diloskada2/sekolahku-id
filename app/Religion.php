<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
    protected $guarded = [];

    static function getData($request) {
        $query = "SELECT * FROM religions";

        return \DB::select($query);
    }

    static function readData($id) {
        $query = "SELECT * FROM religions AS r WHERE r.id = $id";

        return \DB::select($query)[0];
    }
}
