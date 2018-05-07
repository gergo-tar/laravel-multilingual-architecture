<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Translatable;

    public $translatedAttributes = [
    	'title',
    	'slug',
    	'content'
    ];

    protected $fillable = [
    	'title',
    	'slug',
    	'content',
    	'post_thumbnail',
    ];
}
