<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use MadWeb\Seoable\Contracts\Seoable;
use MadWeb\Seoable\Traits\SeoableTrait;

class PostTranslation extends Model implements Seoable
{
    use Sluggable, SeoableTrait;

    public $timestamps = false;

    protected $fillable = [
    	'title',
    	'slug',
    	'content',
    	'post_translation_thumbnail'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function seoable()
    {
        $this->seo()
            ->setTitle('title')
            ->setDescription('description')
            ->setKeywords('keywords')
            ->twitter()
                ->setTitle('title')
                ->setDescription('description')
                ->setImages('image')
            ->opengraph()
                ->setTitle('title')
                ->setDescription('description')
                ->setImages('image');
    }
}
