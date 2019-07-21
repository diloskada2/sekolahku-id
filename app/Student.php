<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    static function getData($request)
    {
        $query = "SELECT * FROM students";

        return \DB::select($query);
    }

    static function readData($id)
    {
        $query = "SELECT * FROM students AS r WHERE r.id = $id";

        return \DB::select($query)[0];
    }
}
