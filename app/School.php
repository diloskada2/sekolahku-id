<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $guarded = [];

    static function getData($request) {
        $query = "SELECT * FROM schools";

        return \DB::select($query);
    }

    static function readData($id) {
        $query = "SELECT * FROM schools AS s WHERE s.id = $id";

        return \DB::select($query)[0];
    }
}
