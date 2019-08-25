<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookRegistration extends Model
{
    protected $fillable = [
        'id_book',
        'shelf_code'
    ];
}
