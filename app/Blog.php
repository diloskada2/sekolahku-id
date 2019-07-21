<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'thumbnail_url'
    ];

    // public function author() {
    //     return $this->hasOne('App\User', 'id', 'author_id');
    // }

    // public function categories() {
    //     return $this->belongsTo('App\blog_categories', 'category_id', 'id');
    // }
}
