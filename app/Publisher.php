<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{
    protected $guarded = [];

    protected $table = 'publishers';

    static function getData($request) {
        $query = "SELECT * FROM publishers";

        return \DB::select($query);
    }

    static function readData($id) {
        $query = "SELECT * FROM publishers AS p WHERE p.id = $id";

        return \DB::select($query)[0];
    }
}
