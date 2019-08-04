<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCouncils extends Model
{
    protected $guarded = [];

    static function getData($request)
    {
        $query = "SELECT * FROM student_councils";

        return \DB::select($query);
    }

    static function readData($id)
    {
        $query = "SELECT * FROM student_councils AS s WHERE s.id = $id";

        return \DB::select($query)[0];
    }
}
