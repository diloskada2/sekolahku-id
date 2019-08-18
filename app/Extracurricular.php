<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    protected $guarded = [];

    static function getData($request) {
        $query = "SELECT * FROM extracurriculars";

        return \DB::select($query);
    }

    static function readData($id) {
        $query = "SELECT * FROM extracurriculars AS e WHERE e.id = $id";

        return \DB::select($query) [0];
    }
}
