<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowingBook extends Model
{
    protected $guarded = [];

    static function getData($request) {
        $query = "SELECT * FROM borrowing_books";

        return \DB::select($query);
    }

    static function readData($id) {
        $query = "SELECT * FROM borrowing_books AS b WHERE b.transaction_code = $transaction_code";

        return \DB::select($query)[0];
    }
}
