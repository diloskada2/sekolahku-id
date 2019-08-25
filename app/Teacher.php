<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        'teacher_name',
        'religion_id',
        'user_id',
        'course_id'
    ];

    // public function author() {
    //     return $this->hasOne('App\User', 'id', 'author_id');
    // }

    // public function categories() {
    //     return $this->belongsTo('App\blog_categories', 'category_id', 'id');
    // }
}
