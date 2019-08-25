<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    protected $table = 'books';

    static function getData($request) {
        $query = "SELECT * FROM books";

        return \DB::select($query);
    }

    static function readData($id) {
        $query = "SELECT * FROM books AS b WHERE b.id = $id";

        return \DB::select($query)[0];
    }
}
