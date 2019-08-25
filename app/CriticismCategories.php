<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CriticismCategories extends Model
{
    protected $fillable = [
        'type',
        'description'
    ];
}
