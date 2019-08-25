<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    protected $guarded = [];

    static function getData($request) {
        $query = "SELECT * FROM shelf";

        return \DB::select($query);
    }

    static function readData($id) {
        $query = "SELECT * FROM shelf AS s WHERE s.id = $id";

        return \DB::select($query)[0];
    }
}
