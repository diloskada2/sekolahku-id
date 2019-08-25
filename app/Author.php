<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $guarded = [];

    static function getData($request) {
        $query = "SELECT * FROM authors";

        return \DB::select($query);
    }

    static function readData($id) {
        $query = "SELECT * FROM authors AS au WHERE au.id = $id";

        return \DB::select($query)[0];
    }

}
