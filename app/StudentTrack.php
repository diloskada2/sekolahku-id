<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentTrack extends Model
{
    protected $guarded = [];

    static function getData($request)
    {
        $query = "SELECT * FROM student_tracks";

        return \DB::select($query);
    }

    static function readData($id)
    {
        $query = "SELECT * FROM student_tracks AS r WHERE r.id = $id";

        return \DB::select($query)[0];
    }
}
