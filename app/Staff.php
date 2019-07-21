<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $guarded = [];

    protected $table = 'staffs';

    static function getData($request) {
        $query = "SELECT * FROM staffs";

        return \DB::select($query);
    }

    static function readData($id) {
        $query = "SELECT * FROM staffs AS s WHERE s.id =$id";
    
        return \DB::select($query)[0];
    }
}
