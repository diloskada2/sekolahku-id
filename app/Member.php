<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = [];

    static function getData($request)
    {
        $query = "SELECT * FROM members";

        return \DB::select($query);
    }

    static function readData($id)
    {
        $query = "SELECT * FROM members AS m WHERE m.id = $id";

        return \DB::select($query)[0];
    }
}
