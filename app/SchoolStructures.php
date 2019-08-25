<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolStructures extends Model
{
    protected $guarded = [];

    static function getData($request) {
        $query = "SELECT * FROM school_structures";

        return \DB::select($query);
    }

    static function readData($id) {
        $query = "SELECT * FROM school_structures AS s WHERE s.id = $id";

        return \DB::select($query)[0];
    }
}
