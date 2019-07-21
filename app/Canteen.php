<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Canteen extends Model
{
    protected $fillable = [
        'name',
        'owner',
    ];
}
