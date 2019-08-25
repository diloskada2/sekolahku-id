<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    protected $guarded = [];

    protected $table = 'book_categories';

    static function getData($request) {
        $query = "SELECT * FROM book_categories";

        return \DB::select($query);
    }

    static function readData($id) {
        $query = "SELECT * FROM book_categories AS b WHERE b.id = $id";

        return \DB::select($query)[0];
    }
}
